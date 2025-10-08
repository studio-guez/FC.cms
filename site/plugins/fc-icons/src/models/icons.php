<?php

use Kirby\Cms\Page;
use Kirby\Cms\Pages;

class IconsPage extends Page {

   public function icons(): Pages {
      $icons = [];
      $icons_dir = kirby()->root('assets') . '/icons';
      $icons_url = kirby()->url('assets') . '/icons';
      $icon_files = scandir($icons_dir);
      foreach ($icon_files as $file) {
         if (str_contains($file, ".svg")) {
               $name = str_replace(".svg", "", $file);
               $name = str_replace("icon-", "", $name);

               $icons[] =  [
                  'slug' => $file,
                  'url' => $icons_url . '/' . $file,
                  'template' => 'icon',
                  'content' => [
                     'tag' => "(icon: $name)"
                  ]
               ];
         }
      }

      return Pages::factory($icons, $this);
   }
}