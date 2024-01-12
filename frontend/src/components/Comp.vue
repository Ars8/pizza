<template>
  <div class="mt-8 grid grid-cols-4 gap-5">
    <Card
      v-for="item in items"
      :key="item.id"
      :id="item.id"
      :title="item.title"
      :imageUrl="item.imageUrl"
      :price="item.price"
      :sizes="item.sizes"
      :types="item.types"
    />
  </div>
</template>

<script setup>
import Card from "./Card.vue";
defineProps({
  items: Array,
});
</script>
