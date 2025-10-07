<?php

use Kirby\Cms\App as Kirby;
use Kirby\Cms\File as File;

return function(Kirby $kirby, File $file, array $options = []) {
   static $original;

   if ($file->template() === 'virtual-icon') {
      return $file;
   }

   if ($original === null) {
      $original = $kirby->nativeComponent('file::version');
   }

   return $original($kirby, $file, $options);
};