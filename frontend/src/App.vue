<script setup>
import { ref, provide } from "vue";
import Home from "@/pages/Home.vue";
import Header from "@/components/Header.vue";

const cart = ref([]);

const addToCart = (item) => {
  cart.value.push(item);
  item.isAdded = true;
  console.log(cart.value);
};
const removeFromCart = (item) => {
  cart.value.splice(cart.value.indexOf(item), 1);
  item.isAdded = false;
};
provide("cart", {
  addToCart,
  removeFromCart,
});
</script>

<template>
  <Drawer v-if="drawerOpen" :total-price="totalPrice" :vat-price="vatPrice" />
  <div class="p-10 bg-white w-4/5 m-auto rounded-xl shadow-xl mt-14">
    <Header />
    <Home />
  </div>
</template>
