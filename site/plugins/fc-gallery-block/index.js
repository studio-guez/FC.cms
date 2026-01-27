panel.plugin("maxesnee/fc-gallery-block", {
  blocks: {
    gallery: {
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
      template: `
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
          </div>
        </k-block-figure>
      `,
    },
  },
});
