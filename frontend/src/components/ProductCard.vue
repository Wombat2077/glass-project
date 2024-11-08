<template>
    <Card class="card">
        <template #header>
            <img  class="card-img" :src="photopath">
        </template>
        <template #title>
            {{ product.name }}
        </template>
        <template #subtitle>
            Цена: {{ product.price }}₽
        </template>
        <template #content>
            <p class="description">
                {{ product.description	 }}
            </p>
        </template>
        <template #footer>
            <a :href="'/app/product/'+product.id">
                <Button label="О товаре" />
            </a>
        </template>
    </Card>
</template>

<script setup>
import { computed, defineProps } from 'vue';
import Card from 'primevue/card';
import Button from 'primevue/button';
import { AppUrl } from '../main.js';
const props = defineProps({
    product: Object,
    is_loading: Boolean
});
const photopath = computed(() =>props.product.photopath ?AppUrl +'/'+ props.product.photopath : AppUrl+'/images/placeholder.jpeg')
</script>

<style scoped>
.card {
    overflow: hidden;
    width: 12rem;
    min-height: 20rem;
    border: solid lightgray 2px;
    border-radius: 2em;
    box-sizing: border-box;
}
.card-img {
    width: 100%;
}
p.description {
    display: -webkit-box;
    text-align: left;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
