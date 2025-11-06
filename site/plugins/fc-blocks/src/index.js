import BlockText from "./components/BlockText.vue";
import BlockImage from "./components/BlockImage.vue";
import BlockLink from "./components/BlockLink.vue";
import BlockFile from "./components/BlockFile.vue";
import BlockNewsletter from "./components/BlockNewsletter.vue";

panel.plugin('maxesnee/fc-blocks', {
   blocks: {
      text: BlockText,
      image: BlockImage,
      link: BlockLink,
      file: BlockFile,
      newsletter: BlockNewsletter
   }
});