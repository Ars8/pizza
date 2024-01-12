<template>
  <div class="p-10 bg-white w-4/5 m-auto rounded-xl shadow-xl mt-14">
    <Header />
    <Comp :items="items" />
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import Comp from "@/components/Comp.vue";
import Header from "@/components/Header.vue";

const items = ref([]);

const fetchItems = async () => {
  try {
    const { data } = await axios.get(`http://127.0.0.1:8000/api/pizza`);

    items.value = data.map((obj) => ({
      ...obj,
      isFavorite: false,
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
