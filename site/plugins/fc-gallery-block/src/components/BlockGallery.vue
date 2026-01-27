<template>
  <k-block-figure
  :is-empty="images.length === 0"
  empty-icon="images"
  empty-text="Select images"
  @open="open"
  >
  <div class="fc-gallery-block-panel" @click="open">
    <div v-if="title" class="fc-gallery-block-panel__title">{{ title }}</div>
    <div class="fc-gallery-block-panel__strip" v-if="images.length">
      <div
      v-for="image in images"
      :key="image.id"
      class="fc-gallery-block-panel__item"
      >
      <img :src="imageUrl(image)" alt="" loading="lazy">
    </div>
  </div>
  <div v-if="images.length" class="fc-gallery-block-panel__meta">{{ countLabel }}</div>
  <div class="fc-blocks-controls" @click="open">
    <k-button v-if="content.mobile" icon="mobile" />
    <k-color-frame :color="content.color" ratio="1/1" />
  </div>
</div>
</k-block-figure>
</template>

<script>
export default {
  computed: {
    images() {
      return this.content.images || [];
    },
    title() {
      return this.content.title || "";
    },
    countLabel() {
      const count = this.images.length;
      return count === 1 ? "1 image" : `${count} images`;
    },
  },
  methods: {
    imageUrl(image) {
      return image && image.image && image.image.url ? image.image.url : image.url;
    },
  },
};
</script>

<style scoped lang="css">

.fc-gallery-block-panel {
  display: grid;
  padding: var(--spacing-3);
}

.fc-gallery-block-panel__title {
  font-size: var(--text-h3);
  font-weight: normal;
  margin-bottom: var(--spacing-3)
}

.fc-gallery-block-panel__strip {
  display: flex;
  gap: var(--spacing-3);
  overflow-x: auto;
  padding-bottom: var(--spacing-3);
  scroll-snap-type: x proximity;
}

.fc-gallery-block-panel__item {
  flex: 0 0 auto;
  height: 9rem;
  border-radius: var(--spacing-2);
  background: var(--color-gray-200);
  overflow: hidden;
  display: flex;
  align-items: center;
  scroll-snap-align: start;
}

.fc-gallery-block-panel__item img {
  height: 100%;
  width: auto;
  object-fit: contain;
}

.fc-gallery-block-panel__meta {
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
