<template>
   <div class="k-block k-block-type-text">
      <k-writer-input
         ref="textbox"
         class="k-block-type-text-input"
         :value="content.text"
         :marks="textField.marks"
         @input="update({ text: $event })"
         />
      <div class="fc-blocks-controls" @click="open">
         <k-color-frame :color="content.color" ratio="1/1"/>
      </div>
   </div>
</template>

<script>
export default {
   computed: {
      textField() {
         return this.field("text");
      }
   }
}
</script>

<style scoped lang="css">
   .fc-blocks-controls {
      position: absolute;
      top: 1rem;
      right: 0.75rem;
      cursor: pointer;
   }

   .k-color-frame {
      width: 1.65rem;
      height: 1.65rem;
   }
</style>