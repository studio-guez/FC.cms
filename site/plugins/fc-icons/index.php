<?php

@include_once __DIR__ . '/vendor/autoload.php';

use Kirby\Cms\App as Kirby;
use Kirby\Query\Query;
use Kirby\Cms\File;
use MathiasReker\PhpSvgOptimizer\Service\Facade\SvgOptimizerFacade;

Kirby::plugin('maxesnee/fc-icons', [
	'hooks' => [
		// Optimize svg icons
		'file.create:after' => function(File $file) {
			if ($file->template() !== 'icon') return $file;

			$svg = $file->read();
			$tag = str_replace(".svg", "", $file->filename());

			// Optimize
			$svg = SvgOptimizerFacade::fromString($svg)
			->withRules(
				convertColorsToHex: true,
				convertCssClassesToAttributes: true,
				convertEmptyTagsToSelfClosing: true,
				convertInlineStylesToAttributes: true,
				flattenGroups: true,
				minifySvgCoordinates: true,
				minifyTransformations: true,
				removeComments: true,
				removeDefaultAttributes: true,
				removeDeprecatedAttributes: true,
				removeDoctype: true,
				removeEmptyAttributes: true,
				removeEnableBackgroundAttribute: true,
				removeInkscapeFootprints: true,
				removeInvisibleCharacters: true,
				removeMetadata: true,
				removeTitleAndDesc: true,
				removeUnnecessaryWhitespace: true,
				removeUnsafeElements: false,
				removeUnusedMasks: true,
				removeUnusedNamespaces: true,
				removeWidthHeightAttributes: false,
				sortAttributes: true
			)->optimize()->getContent();

			// Remove ids
			$svg = preg_replace('/\s+id\s*=\s*(?:"[^"]*"|\'[^\']*\')/i', '', $svg);
			
			// Remove fills
			$svg = preg_replace('/\s+fill\s*=\s*(?:"[^"]*"|\'[^\']*\')/i', '', $svg);

			// Add global currentColor fill
			$svg = preg_replace('/<svg\b([^>]*)>/i', '<svg$1 fill="currentColor">', $svg);

			// Add class
			$svg = preg_replace('/<svg\b([^>]*)>/i', '<svg$1 class="icon icon-' . $tag . '">', $svg);

			// Add width and height from the viewBox when missing.
			$svg = preg_replace_callback('/<svg\b[^>]*>/i', function ($matches) {
				$svgTag = $matches[0];

				$hasWidth = preg_match('/\swidth\s*=\s*(?:"[^"]*"|\'[^\']*\')/i', $svgTag) === 1;
				$hasHeight = preg_match('/\sheight\s*=\s*(?:"[^"]*"|\'[^\']*\')/i', $svgTag) === 1;

				if ($hasWidth && $hasHeight) {
					return $svgTag;
				}

				if (preg_match('/\sviewBox\s*=\s*(["\'])([^"\']+)\1/i', $svgTag, $viewBoxMatch) !== 1) {
					return $svgTag;
				}

				$viewBox = preg_split('/[\s,]+/', trim($viewBoxMatch[2]));
				if ($viewBox === false || count($viewBox) < 4) {
					return $svgTag;
				}

				$dimensions = '';
				if ($hasWidth === false) {
					$dimensions .= ' width="' . $viewBox[2] . '"';
				}

				if ($hasHeight === false) {
					$dimensions .= ' height="' . $viewBox[3] . '"';
				}

				return rtrim($svgTag, '>') . $dimensions . '>';
			}, $svg, 1) ?? $svg;

			$file->write($svg);

			// Add tag field
			$file = $file->update([
				'tag' => '(icon: ' . $tag . ')'
			]);

			return $file;
		},
		'file.changeName:after' => function(File $newFile, File $oldFile) {
			// Update tag field
			$newFile = $newFile->update([
				'tag' => '(icon: ' . str_replace(".svg", "", $newFile->filename()) . ')'
			]);

			return $newFile;
		}
	],
    // Add kirby-tags to insert icons in text fields
    'tags' => [
        'icon' => [
            'html' => function($tag) {
					$file_name = $tag->value . '.svg';
					$icon_file = kirby()->page('icons')->file($file_name);

					if ($icon_file !== null) {
						return $icon_file->read();
					}
            }
        ]
    ],
    // Add custom icons for the panel (the icons are defined in index.js)
    'icons' => []
]);
