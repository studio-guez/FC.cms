<?php

use Kirby\Cms\App as Kirby;
use Kirby\Query\Query;

require __DIR__ . '/src/models/icons.php';

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
                $icon_url = getIconUrl($tag->value);
                if ($icon_url !== null) {
                    return file_get_contents(getIconUrl($tag->value));
                }
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
        'pages/icons' => __DIR__ . '/src/blueprints/pages/icons.yml',
    ],
    'sections' => [
		'icons' => [
			'props' => [
				'label' => function ($label = 'Table') {
					return $label;
				},
				'info' => function ($info = '') {
					return $info;
				},
				'query' => function ($query = 'page.children') {
					return $query;
				},
				'image' => function ($image = []) {
					return $image;
				}
			],
			'computed' => [
				'items' => function() {
					$query = new Query($this->query);
					$result = $query->resolve(['page' => page($this->model()->id())])->toArray();
					$output = [];
					foreach ($result as $page) {
						$item = [
							'text' => $page['content']['tag'],
							'info' => $this->info,
							'image' => [
								'back' => $this->image['back'],
								'cover' => $this->image['cover'],
								'src' => $page['url']
							],
							'buttons' => [
								[
									'icon' => 'copy'
								]
							]
						];

						$output[] = $item;
					}
					return $output;
				}
			]
		]
	]
]);