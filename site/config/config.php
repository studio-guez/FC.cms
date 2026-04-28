<?php

use Kirby\Toolkit\A;
use Kirby\Toolkit\Str;

header("Access-Control-Allow-Origin: *");

return [
    'api' => [
        'basicAuth' => true,
        'allowInsecure' => true,
    ],
    'debug' => true,
    'kql' => [
        'auth' => true
    ],
    'panel' => [
        'menu' => [
            'site' => [
                'current' => function(string $current): bool {
                    $links = ['pages/journal', 'pages/icons', 'pages/images'];
                    $path  = Kirby\Cms\App::instance()->path();

                    return $current === 'site' && A::every($links, fn($link) => Str::contains($path, $link) === false);
                }
            ],
            'journal' => [
                'icon' => 'draft',
                'label' => 'Journal',
                'link' => 'pages/journal',
                'current' => function(string $current): bool {
                    $path = Kirby\CMS\App::instance()->path();
                    return Str::contains($path, 'pages/journal');
                }
            ],
            'icons' => [
                'icon' => 'star',
                'label' => 'Icônes',
                'link' => 'pages/icons',
                'current' => function(string $current): bool {
                    $path = Kirby\CMS\App::instance()->path();
                    return Str::contains($path, 'pages/icons');
                }
            ],
            'images' => [
                'icon' => 'image',
                'label' => 'Images',
                'link' => 'pages/images',
                'current' => function(string $current): bool {
                    $path = Kirby\CMS\App::instance()->path();
                    return Str::contains($path, 'pages/images');
                }
            ],
            '-',
            'users',
            'system'
        ]
    ]
];
