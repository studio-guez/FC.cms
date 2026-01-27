panel.plugin("maxesnee/fc-video-block", {
  blocks: {
    video: {
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
      template: `
        <k-block-figure
          :is-empty="!video"
          empty-icon="video"
          empty-text="Select a video"
          @open="open"
        >
          <div class="fc-video-block-panel" @click="open">
            <div v-if="title" class="fc-video-block-panel__title">{{ title }}</div>
            <div
              class="fc-video-block-panel__media"
              :style="posterUrl ? { backgroundImage: 'url(' + posterUrl + ')' } : null"
            >
              <div class="fc-video-block-panel__play">
                <k-icon type="video" />
              </div>
            </div>
            <div v-if="video" class="fc-video-block-panel__meta">{{ video.filename }}</div>
          </div>
        </k-block-figure>
      `,
    },
  },
});
