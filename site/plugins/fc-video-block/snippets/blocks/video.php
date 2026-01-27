<?php

/** @var Kirby\Cms\Block $block */

$video = $block->video()->toFile();

if ($video === null) {
    return;
}

$title = $block->title()->value();
$poster = $video->poster();
$posterUrl = $poster?->url();
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
    <?php if ($posterUrl): ?>poster="<?= esc($posterUrl) ?>"<?php endif ?>
  >
    <source src="<?= esc($video->url()) ?>" type="<?= esc($video->mime()) ?>">
  </video>
</figure>
