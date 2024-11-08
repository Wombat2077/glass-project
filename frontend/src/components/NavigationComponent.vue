<template>
    <Menubar :model="items"></Menubar>
</template>
<script setup>
import { ref } from 'vue';
import Menubar from 'primevue/menubar';
import router from '@/router';
const items = ref([
    {
        label: 'Главная',
        command: () => { console.log('111');router.push('/app/') }
    },
    {
        label: 'Наши Продукты',
        command: () => { router.push('/app/products') }
    },
    {
        label: 'О нас',
        command: () => { router.push('/app/about') }
    },
]);
</script>
