<template>
   <div class="k-block k-block-type-link k-block-type-default" @click="open" @update="update">
      <k-block-title :fieldset="{ icon: 'download', name: this.content.label, label: this.content.label == '' ? 'Lien' : ''}"/>
      <div class="fc-blocks-controls" @click="open">
         <k-color-frame :color="content.color" ratio="1/1"/>
      </div>
   </div>
</template>

<style scoped lang="css">
   .fc-blocks-controls {
      position: absolute;
      top: 0.5rem;
      right: 0.75rem;
      cursor: pointer;
   }

   .k-color-frame {
      width: 1.65rem;
      height: 1.65rem;
   }
</style>