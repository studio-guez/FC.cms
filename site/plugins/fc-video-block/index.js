(function () {
  "use strict";

  const BlockVideo = {
    _scopeId: "data-v-eb178d63",
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
    render(h) {
      const children = [];

      if (this.title) {
        children.push(
          h("div", { staticClass: "fc-video-block-panel__title" }, [this.title])
        );
      }

      const panelChildren = [];

      if (this.video) {
        const sourceAttrs = { src: this.video.url };
        if (this.video.mime) {
          sourceAttrs.type = this.video.mime;
        }

        panelChildren.push(
          h(
            "video",
            {
              staticClass: "fc-video-block-panel__player",
              attrs: {
                controls: true,
                preload: "metadata",
                playsinline: true,
              },
              on: {
                click(event) {
                  event.stopPropagation();
                },
              },
            },
            [h("source", { attrs: sourceAttrs })]
          )
        );
      }

      panelChildren.push(
        h(
          "div",
          {
            staticClass: "fc-blocks-controls",
            on: { click: this.open },
          },
          [
            this.content.mobile
              ? h("k-button", { attrs: { icon: "mobile" } })
              : null,
            h("k-color-frame", {
              attrs: { color: this.content.color, ratio: "1/1" },
            }),
          ].filter(Boolean)
        )
      );

      children.push(
        h(
          "div",
          {
            staticClass: "fc-video-block-panel",
            on: { click: this.open },
          },
          panelChildren
        )
      );

      if (this.video) {
        children.push(
          h("div", { staticClass: "fc-video-block-panel__meta" }, [
            this.video.filename,
          ])
        );
      }

      return h(
        "k-block-figure",
        {
          attrs: {
            "is-empty": !this.video,
            "empty-icon": "video",
            "empty-text": "Select a video",
          },
          on: { open: this.open },
        },
        children
      );
    },
  };

  panel.plugin("maxesnee/fc-video-block", { blocks: { video: BlockVideo } });
})();
