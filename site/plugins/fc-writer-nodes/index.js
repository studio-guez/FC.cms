window.panel.plugin("maxesnee/fc-writer-nodes", {
  writerNodes: {
    small: {
      get button() {
        return {
          icon: "text",
          label: "Petit texte",
        };
      },
      commands({ type, utils }) {
        // This toggles the specific node type
        return () => utils.toggleBlockType(type);
      },
      get name() {
        return "small";
      },
      get schema() {
        return {
          content: "inline*",
          group: "block",
          parseDOM: [
            {
              tag: "p.small",
              // Priority ensures this is checked before the standard 'p' tag
              priority: 60 
            }
          ],
          toDOM: () => ["p", { class: "small" }, 0]
        };
      }
    }
  }
});