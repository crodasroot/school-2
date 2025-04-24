<template>
    <div class="border rounded p-2 bg-white">
      <div class="flex justify-between items-center">
        <span>{{ item.label }}</span>
      </div>
  
      <!-- Si tiene hijos, los mostramos de forma anidada -->
      <draggable v-if="item.children && item.children.length" v-model="item.children" group="menu" item-key="id" class="ml-4 mt-2 space-y-2">
        <template #item="{ element }">
          <MenuItem :item="element" />
        </template>
      </draggable>
    </div>
  </template>
  
  <script>
  import draggable from 'vuedraggable'
  
  export default {
    components: { draggable },
    props: {
      item: Object,
    },
  }
  </script>
  