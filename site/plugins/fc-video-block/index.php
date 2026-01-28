<?php

use Kirby\Cms\App as Kirby;
Kirby::plugin('maxesnee/fc-video-block', [
    'blueprints' => [
        'blocks/video' => __DIR__ . '/blueprints/blocks/video.yml',
        'files/video' => __DIR__ . '/blueprints/files/video.yml',
    ],
    'snippets' => [
        'blocks/video' => __DIR__ . '/snippets/blocks/video.php',
    ],
    'panel' => [
        'js' => 'index.js',
        'css' => 'index.css',
    ],
]);
