<?php

/** @var Kirby\Cms\Block $block */

$title = $block->title()->value();
$images = $block->images()->toFiles();

if ($images->isEmpty()) {
    return;
}
?>
<figure class="fc-gallery-block">
  <?php if ($title): ?>
    <figcaption class="fc-gallery-block__title"><?= esc($title) ?></figcaption>
  <?php endif ?>
  <div class="fc-gallery-block__items">
    <?php foreach ($images as $image): ?>
      <img
        src="<?= esc($image->url()) ?>"
        alt="<?= esc($image->alt()->or($image->title())->value()) ?>"
        loading="lazy"
      >
    <?php endforeach ?>
  </div>
</figure>
