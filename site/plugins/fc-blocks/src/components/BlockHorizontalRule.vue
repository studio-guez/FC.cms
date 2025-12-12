<template>
   <div class="k-block k-block-type-hr k-block-type-default" @click="open" @update="update">
      <hr />
      <div class="fc-blocks-controls" @click="open">
         <k-button v-if="content.mobile" icon="mobile" />
         <k-color-frame :color="content.color" ratio="1/1"/>
      </div>
   </div>
</template>

<style scoped lang="css">
   hr {
      height: 0.1em;
      background-color: var(--color-text);
      margin: 0.55rem 3rem 0.55rem 0;
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