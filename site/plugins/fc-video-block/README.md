# FC Video Block

Standalone Kirby CMS block plugin that adds a video block with a title and a
single MP4 upload. When a video is uploaded, a poster image is generated from
its first frame (same filename, `jpg` extension) and used as the panel cover.

## Requirements
- Kirby 5
- `php-ffmpeg/php-ffmpeg`
- `ffmpeg` + `ffprobe` binaries bundled in `bin/`

## Installation
Place the plugin in `site/plugins/fc-video-block`.

## Usage
1. Add the `video` block to your blocks fieldsets.
2. Use the `Video` block in the panel (title + MP4 file).
