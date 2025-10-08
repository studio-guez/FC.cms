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
                    $links = ['pages/icons'];
                    $path  = Kirby\Cms\App::instance()->path();

                    return $current === 'site' && A::every($links, fn($link) => Str::contains($path, $link) === false);
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
            '-',
            'users',
            'system'
        ]
    ]
];
