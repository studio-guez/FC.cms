<?php

use Kirby\Cms\App as Kirby;

require __DIR__ . '/models/icons.php';

function getIconUrl($name) {
   $icons_dir = kirby()->root('assets') . '/icons';
   $icons = scandir($icons_dir);
   foreach ($icons as $file) {
      if ($file === "icon-$name.svg") {
         return $icons_dir . '/' . $file;
      }
   }
}

Kirby::plugin('maxesnee/fc-icons', [
    // Add kirby-tags to insert icons in text fields
    'tags' => [
        'icon' => [
            'html' => function($tag) {
                return file_get_contents(getIconUrl($tag->value));
            }
        ]
    ],
    // Add custom icons for the panel (the icons are defined in index.js)
    'icons' => [],
    // Page model for the Icons page in the panel
    'pageModels' => [
        'icons' => 'IconsPage',
    ],
    // Blueprint for the Icons page in the panel
    'blueprints' => [
        'pages/icons' => __DIR__ . '/blueprints/pages/icons.yml',
    ],
    'components' => [
        'file::version' => include __DIR__ . '/components/file-version.php'
    ]
]);