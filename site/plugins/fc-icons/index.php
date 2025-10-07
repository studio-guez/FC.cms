<?php

function getIcon($name) {
   $icons_dir = kirby()->root('assets') . '/icons';
   $icons = scandir($icons_dir);
   foreach ($icons as $file) {
      if ($file === "icon-$name.svg") {
         return $icons_dir . '/' . $file;
      }
   }
}

Kirby::plugin('maxesnee/fc-icons', [
    // Add kirby-tags for adding icons in text fields
    'tags' => [
        'icon' => [
            'html' => function($tag) {
                return file_get_contents(getIcon($tag->value));
            }
        ]
    ],
    // Add custom icons for the panel
    'icons' => []
]);