<template>
  <k-block-figure
  :is-empty="!video"
  empty-icon="video"
  empty-text="Select a video"
  @open="open"
  >
  <div v-if="title" class="fc-video-block-panel__title">{{ title }}</div>
  <div class="fc-video-block-panel" @click="open">
    <div
    class="fc-video-block-panel__media"
    :style="posterUrl ? { backgroundImage: 'url(' + posterUrl + ')' } : null"
    >
    <div class="fc-video-block-panel__play">
      <k-icon type="video" />
    </div>
  </div>
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
    posterUrl() {
      return this.video && this.video.image ? this.video.image.url : null;
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

.fc-video-block-panel__media {
  position: relative;
  width: 100%;
  padding-top: 56.25%;
  background-color: var(--color-gray-200);
  background-size: cover;
  background-position: center;
  border-radius: 0.5rem;
  overflow: hidden;
  margin-bottom: var(--spacing-3)
}

.fc-video-block-panel__play {
  position: absolute;
  left: var(--spacing-3);
  bottom: var(--spacing-3);
  z-index: 1;
  display: grid;
  place-items: center;
  width: 2.5rem;
  height: 2.5rem;
  border-radius: 999px;
  background: rgba(0, 0, 0, 0.65);
  color: #fff;
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