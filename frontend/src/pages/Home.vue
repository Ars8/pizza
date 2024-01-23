<script setup>
import { ref, onMounted, provide } from "vue";
import axios from "axios";
import { inject } from "vue";
import CardList from "../components/CardList.vue";

const { cart, addToCart, removeFromCart } = inject("cart");

const items = ref([]);

const onClickAddPlus = (item) => {
  if (!item.isAdded) {
    addToCart(item);
  } else {
    removeFromCart(item);
  }
};

const fetchItems = async () => {
  try {
    const { data } = await axios.get(`http://127.0.0.1:8000/api/pizza`);

    items.value = data.map((obj) => ({
      ...obj,
      isAdded: false,
      favoriteId: null,
      isAdded: false,
    }));
    console.log(items.value);
  } catch (err) {
    console.log(err);
  }
};

onMounted(async () => {
  await fetchItems();
});
</script>

<template>
  <div class="mt-10">
    <CardList :items="items" @add-to-cart="onClickAddPlus" />
  </div>
</template>
