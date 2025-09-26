<?php

header("Access-Control-Allow-Origin: *");


return [
    'api' => [
        'basicAuth' => true,
        'allowInsecure' => true,
    ],
    'debug' => true,
    'kql' => [
        'auth' => true
    ]
];
