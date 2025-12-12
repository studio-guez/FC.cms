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
        'absoluteToRelativeUrls' => function($field) {
            $rootUrl = kirby()->url('index');
            $field->value = str_replace($rootUrl, '', (string)$field->value);

            return $field;
        }
    ]
]);