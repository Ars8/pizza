<script setup>
import { watch, ref, onMounted } from "vue";
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

const addToFavorite = async (item) => {
  try {
    if (!item.isFavorite) {
      const obj = {
        item_id: item.id,
      };

      item.isFavorite = true;

      const { data } = await axios.post(
        `http://127.0.0.1:8000/api/favorites`,
        obj
      );
      console.log(obj);

      item.favoriteId = data.id;
    } else {
      item.isFavorite = false;
      console.log(obj);
      await axios.delete(
        `https://604781a0efa572c1.mokky.dev/favorites/${item.favoriteId}`
      );
      item.favoriteId = null;
    }
  } catch (err) {
    console.log(err);
  }
};

const fetchFavorites = async () => {
  try {
    const { data: favorites } = await axios.get(
      `https://604781a0efa572c1.mokky.dev/favorites`
    );

    items.value = items.value.map((item) => {
      const favorite = favorites.find(
        (favorite) => favorite.item_id === item.id
      );

      if (!favorite) {
        return item;
      }

      return {
        ...item,
        isFavorite: true,
        favoriteId: favorite.id,
      };
    });
  } catch (err) {
    console.log(err);
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
  const localCart = localStorage.getItem("cart");
  cart.value = localCart ? JSON.parse(localCart) : [];

  await fetchItems();
  await fetchFavorites();

  items.value = items.value.map((item) => ({
    ...item,
    isAdded: cart.value.some((cartItem) => cartItem.id === item.id),
  }));
});

watch(cart, () => {
  items.value = items.value.map((item) => ({
    ...item,
    isAdded: false,
  }));
});

watch(fetchItems);
</script>

<template>
  <div class="mt-10">
    <CardList
      :items="items"
      @add-to-favorite="addToFavorite"
      @add-to-cart="onClickAddPlus"
    />
  </div>
</template>
