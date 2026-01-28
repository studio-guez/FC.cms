<?php

/** @var Kirby\Cms\Block $block */

$video = $block->video()->toFile();

if ($video === null) {
    return;
}

$title = $block->title()->value();
?>
<figure class="fc-video-block">
  <?php if ($title): ?>
    <figcaption class="fc-video-block__title"><?= esc($title) ?></figcaption>
  <?php endif ?>
  <video
    class="fc-video-block__player"
    controls
    preload="metadata"
    playsinline
  >
    <source src="<?= esc($video->url()) ?>" type="<?= esc($video->mime()) ?>">
  </video>
</figure>
