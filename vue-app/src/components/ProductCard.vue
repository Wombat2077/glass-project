<template>
    <Card>
        <template #header>
            <img alt="product photo" :src="photopath">
        </template>
        <template #title>
            {{ product.name }}
        </template>
        <template #subtitle>
            Цена: {{ product.price }}₽
        </template>
        <template #content>
            <p>
                {{ product.description }}
            </p>
        </template>
        <template #footer>
            <Button label="О товаре" />
        </template>
    </Card>
</template>

<script setup>
import { computed, defineProps } from 'vue';
import Card from 'primevue/card';
import AppUrl from '../main.js';
defineProps({
    product: Object,
    is_loading: Boolean
});
const photopath = computed(() => AppUrl + product.photopath)
</script>

<style scoped>
Card {
    overflow: hidden;
}

p {
    text-overflow: ellipsis;
}
</style>
