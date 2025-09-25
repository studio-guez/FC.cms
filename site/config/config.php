<?php

header("Access-Control-Allow-Origin: *");


return [
    'url' => '/',
    'api' => [
        'basicAuth' => true,
        'allowInsecure' => true,
    ],
    'debug' => true,
    'kql' => [
        'auth' => true
    ]
];
