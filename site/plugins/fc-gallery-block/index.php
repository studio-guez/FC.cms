<?php

use Kirby\Cms\App as Kirby;

Kirby::plugin('maxesnee/fc-gallery-block', [
    'blueprints' => [
        'blocks/gallery' => __DIR__ . '/blueprints/blocks/gallery.yml',
        'files/gallery-image' => __DIR__ . '/blueprints/files/gallery-image.yml',
    ],
    'snippets' => [
        'blocks/gallery' => __DIR__ . '/snippets/blocks/gallery.php',
    ],
    'panel' => [
        'js' => 'index.js',
        'css' => 'index.css',
    ],
]);
