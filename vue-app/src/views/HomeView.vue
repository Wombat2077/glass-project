<template>
    <Menubar :model="items" />
</template>

<script setup>
import { ref } from 'vue';
import Menubar from 'primevue/menubar';
const items = ref([
    {
        label: 'Главная',
        action: () => { }
    },
    {
        label: 'Наши Продукты',
        action: () => { }
    },
    {
        label: 'О нас',
        action: () => { }
    },
]);
</script>
