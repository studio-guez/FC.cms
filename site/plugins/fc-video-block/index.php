<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\File;
use Kirby\Toolkit\Str;
use Throwable;

const FC_VIDEO_POSTER_EXTENSION = 'jpg';

@include_once __DIR__ . '/vendor/autoload.php';

function fcVideoBlockGeneratePoster(File $file): void {
    if (Str::lower($file->extension()) !== 'mp4') {
        return;
    }

    $posterFilename = $file->name() . '.' . FC_VIDEO_POSTER_EXTENSION;
    $poster = $file->parent()->image($posterFilename);

    if ($poster) {
        try {
            $poster->delete();
        } catch (Throwable) {
            return;
        }
    }

    $ffmpeg = __DIR__ . '/bin/ffmpeg';
    $ffprobe = __DIR__ . '/bin/ffprobe';

    if (is_file($ffmpeg) === false || is_file($ffprobe) === false) {
        return;
    }

    $temp = tempnam(sys_get_temp_dir(), 'fc-video-poster-');

    if ($temp === false) {
        return;
    }

    $tempFile = $temp . '.' . FC_VIDEO_POSTER_EXTENSION;
    if (rename($temp, $tempFile) === false) {
        @unlink($temp);
        return;
    }

    if (class_exists(\FFMpeg\FFMpeg::class) === false) {
        @unlink($tempFile);
        return;
    }

    try {
        $ffmpegInstance = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries' => $ffmpeg,
            'ffprobe.binaries' => $ffprobe,
        ]);

        $video = $ffmpegInstance->open($file->root());
        $frame = $video->frame(\FFMpeg\Coordinate\TimeCode::fromString('00:00:00.000'));
        $frame->save($tempFile);
    } catch (Throwable) {
        @unlink($tempFile);
        return;
    }

    if (is_file($tempFile) === false) {
        @unlink($tempFile);
        return;
    }

    $file->parent()->createFile([
        'source' => $tempFile,
        'filename' => $posterFilename,
        'template' => 'video-poster',
        'content' => [
            'title' => Str::ucfirst($file->name()) . ' poster',
        ],
    ]);

    @unlink($tempFile);
}

Kirby::plugin('maxesnee/fc-video-block', [
    'blueprints' => [
        'blocks/video' => __DIR__ . '/blueprints/blocks/video.yml',
        'files/video' => __DIR__ . '/blueprints/files/video.yml',
        'files/video-poster' => __DIR__ . '/blueprints/files/video-poster.yml',
    ],
    'fileMethods' => [
        'poster' => function () {
            return $this->parent()->image($this->name() . '.' . FC_VIDEO_POSTER_EXTENSION);
        },
    ],
    'hooks' => [
        'file.create:after' => function (File $file) {
            fcVideoBlockGeneratePoster($file);
        },
        'file.replace:after' => function (File $newFile, File $oldFile) {
            fcVideoBlockGeneratePoster($newFile);
        },
        'file.changeName:after' => function (File $newFile, File $oldFile) {
            if (Str::lower($newFile->extension()) !== 'mp4') {
                return;
            }

            $poster = $oldFile->parent()->image($oldFile->name() . '.' . FC_VIDEO_POSTER_EXTENSION);

            if ($poster === null) {
                return;
            }

            $poster->changeName($newFile->name(), true, FC_VIDEO_POSTER_EXTENSION);
        },
    ],
    'snippets' => [
        'blocks/video' => __DIR__ . '/snippets/blocks/video.php',
    ],
    'panel' => [
        'js' => 'index.js',
        'css' => 'index.css',
    ],
]);
