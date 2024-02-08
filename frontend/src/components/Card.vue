<script setup>
defineProps({
  id: Number,
  title: String,
  imageUrl: String,
  price: Number,
  sizes: String,
  types: String,
  isFavorite: Boolean,
  isAdded: Boolean,
  onClickFavorite: Function,
  onClickAdd: Function,
});
</script>

<template>
  <div
    class="relative bg-white border border-slate-100 rounded-3xl p-8 cursor-pointer transition hover:-translate-y-2 hover:shadow-xl"
  >
    <img
      v-if="onClickFavorite"
      :src="!isFavorite ? '/like-1.svg' : '/like-2.svg'"
      alt="Like 1"
      class="absolute top-8 left-8"
      @click="onClickFavorite"
    />
    <img class="block mx-auto" :src="imageUrl" alt="Pizza" />
    <p class="text-center my-4 mx-auto">{{ title }}</p>
    <div class="flex flex-col bg-slate-200 rounded-2xl p-3">
      <ul class="flex mb-2">
        <li
          class="flex-1 text-center bg-slate-300 rounded-2xl text-xs mx-1 my-0 px-4 py-1 cursor-pointer"
        >
          тонкое
        </li>
        <li
          class="flex-1 text-center bg-slate-300 rounded-2xl text-xs mx-1 my-0 px-4 py-1 cursor-pointer"
        >
          традиционное
        </li>
      </ul>
      <ul class="flex">
        <li
          class="flex-1 text-center rounded-2xl text-xs mx-1 my-0 px-4 py-1 cursor-pointer"
        >
          25 см
        </li>
        <li
          class="flex-1 text-center bg-slate-300 rounded-2xl text-xs mx-1 my-0 px-4 py-1 cursor-pointer"
        >
          30 см
        </li>
        <li
          class="flex-1 text-center bg-slate-300 rounded-2xl text-xs mx-1 my-0 px-4 py-1 cursor-pointer"
        >
          40 см
        </li>
      </ul>
    </div>

    <div class="flex justify-between mt-5">
      <div class="flex flex-col">
        <span class="text-slate-400">Цена:</span>
        <b>{{ price }} руб.</b>
      </div>

      <img
        v-if="onClickAdd"
        @click="onClickAdd"
        :src="!isAdded ? '/plus.svg' : '/checked.svg'"
        alt="Plus"
      />
    </div>
  </div>
</template>
