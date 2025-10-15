<template>
   <k-block-figure
      :is-empty="!image?.url"
      empty-icon="image"
      empty-text=" Pas encore d'image sélectionnée "
      @open="open"
      @update="update"
   >
      <div :class="['k-block', 'k-block-type-image', 'fc-image', `image-corner-${content.cornerradius}`]" @click="open" :style="{color: content.color || 'black'}">
         <img :src="image?.url" :alt="image?.alt">
      </div>
</k-block-figure>
</template>

<script>
export default {
   computed: {
      image() {
         return this.content.image[0]?.image;
      }
   }
}
</script>

<style lang="css">
   .fc-blocks-controls {
      position: absolute;
      top: 1rem;
      right: 1rem;
      cursor: pointer;
   }

   .fc-image {
      position: relative;
      border: 0.1rem solid;
      overflow: hidden;
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