<template>
   <k-block-figure
      :is-empty="!image?.url"
      empty-icon="image"
      empty-text=" Pas encore d'image sélectionnée "
      @open="open"
      @update="update"
   >
      <div :class="['k-block', 'k-block-type-image', 'fc-image']" @click="open" :style="{color: content.color || 'black', borderRadius: `${content.cornerradius*5}px`}">
         <img :src="image?.url" :alt="image?.alt">
      </div>

      <div class="fc-blocks-controls" @click="open">
         <k-button v-if="content.mobile" icon="mobile" />
      </div>
   </k-block-figure>
</template>

<script>
export default {
   computed: {
      image() {
         console.log(this.content.image[0]?.image);
         return this.content.image[0]?.image;
      }
   }
}
</script>

<style lang="css">
   .fc-blocks-controls {
      position: absolute;
      top: 0.5rem;
      right: 0.25rem;
      cursor: pointer;
   }

   .fc-image {
      position: relative;
      border: 0.1rem solid;
      overflow: hidden;
   }

   .fc-image img {
      width: 100%;
   }

   .fc-image::after {
      content: '';
      position: absolute;
      display: block;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: currentColor;
      mix-blend-mode: screen;
   }

   .image-corner-10 {
      border-radius: 10px;
   }

   .image-corner-20 {
      border-radius: 20px;
   }

   .image-corner-40 {
      border-radius: 40px;
   }

   .image-corner-60 {
      border-radius: 60px;
   }

   .image-corner-80 {
      border-radius: 80px;
   }

   .image-corner-100 {
      border-radius: 100px;
   }
</style>