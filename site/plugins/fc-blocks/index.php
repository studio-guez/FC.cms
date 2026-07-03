<?php

use Kirby\Cms\App as Kirby;
use Kirby\Text\KirbyTags;
use Kirby\Toolkit\Str;

Kirby::plugin('maxesnee/fc-blocks', [
   'fieldMethods' => [
        'formatText' => function($field) {
            $field->value = KirbyTags::parse($field->value);
            $field->value = smartypants($field->value);
            return $field;
        },
        'toFrontendUrl' => function($field) {
            if (($url = $field->toUrl()) === null) {
                return null;
            }

            $backendUrl = rtrim(kirby()->url('index'), '/');
            $frontendUrl = rtrim(kirby()->option('frontendUrl', $backendUrl), '/');

            $url = str_replace($backendUrl, $frontendUrl, $url);

            return $url;
        },
        'absoluteToRelativeUrls' => function($field) {
            if ($field->isEmpty() === true) {
                return $field;
            }

            $backendUrl = rtrim(kirby()->url('index'), '/');

            $field->value = str_replace($backendUrl, '', (string)$field->value);

            return $field;
        }
    ]
]);
