<template>
  <k-block-figure
  :is-empty="!video"
  empty-icon="video"
  empty-text="Select a video"
  @open="open"
  >
  <div v-if="title" class="fc-video-block-panel__title">{{ title }}</div>
  <div class="fc-video-block-panel" @click="open">
    <video
      v-if="video"
      class="fc-video-block-panel__player"
      controls
      preload="metadata"
      playsinline
      @click.stop
    >
      <source :src="video.url" :type="video.mime || ''" />
    </video>
    <div class="fc-blocks-controls" @click="open">
      <k-button v-if="content.mobile" icon="mobile" />
      <k-color-frame :color="content.color" ratio="1/1" />
    </div>
  </div>
<div v-if="video" class="fc-video-block-panel__meta">{{ video.filename }}</div>
</k-block-figure>
</template>

<script>
export default {
  computed: {
    video() {
      return this.content.video && this.content.video.length
      ? this.content.video[0]
      : null;
    },
    title() {
      return this.content.title || "";
    },
  },
};
</script>

<style scoped lang="css">

.fc-video-block-panel {
  display: grid;
  grid-template-columns: repeat(auto-fill,minmax(18rem,1fr));
  gap: 0.35rem;
}

.fc-video-block-panel__player {
  display: block;
  width: 100%;
  aspect-ratio: 16 / 9;
  background-color: var(--color-gray-200);
  border-radius: 0.5rem;
  margin-bottom: var(--spacing-3);
  overflow: hidden;
}

.fc-video-block-panel__title {
  font-size: var(--text-h3);
  font-weight: normal;
  margin-bottom: var(--spacing-2)
}

.fc-video-block-panel__meta {
  font-size: 0.8rem;
  color: var(--color-gray-600);
}

.fc-blocks-controls {
  position: absolute;
  display: flex;
  align-items: center;
  top: 0.5rem;
  right: 0.75rem;
  cursor: pointer;
}

.k-color-frame {
  width: 1.65rem;
  height: 1.65rem;
}

</style>
