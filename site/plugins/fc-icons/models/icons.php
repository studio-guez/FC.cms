<?php

use Kirby\Cms\Page;
use Kirby\Cms\Files;

class IconsPage extends Page {
   public function files(): Files {
      if ($this->files !== null) {
         return $this->files;
      }

      $icons = [];
      $icons_dir = kirby()->root('assets') . '/icons';
      $icons_url = kirby()->url('assets') . '/icons';
      $icon_files = scandir($icons_dir);
      foreach ($icon_files as $file) {
         if (str_contains($file, ".svg")) {
               $name = str_replace(".svg", "", $file);
               $name = str_replace("icon-", "", $name);
               $icons[] =  [
                  'filename' => $file,
                  'root' => $icons_dir . '/' . $file,
                  'url' => $icons_url . '/' . $file,
                  'template' => 'virtual-icon',
                  'content' => [
                     'tag' => "(icon: $name)"
                  ]
               ];
         }
      }

      return $this->files = Files::factory($icons, $this);
   }
}