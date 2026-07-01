<?php

use Kirby\Content\VersionId;
use Kirby\Kql\Kql;

return [
	'routes' => function ($kirby) {
		return [
			[
				'pattern' => 'query',
				'method'  => 'POST|GET',
				'auth'    => $kirby->option('kql.auth') === false ? false : true,
				'action'  => function () use ($kirby) {
					$input = $kirby->request()->get();
					$version = $input['_version'] ?? null;

					unset($input['_version']);

					$result = $version === 'changes'
						? VersionId::render('changes', fn () => Kql::run($input))
						: Kql::run($input);

					return [
						'code'   => 200,
						'result' => $result,
						'status' => 'ok',
					];
				}
			]
		];
	}
];
