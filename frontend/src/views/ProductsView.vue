<template>
    <div>
        <h1>Продукты</h1>
        <Toast/>
        <ProductCard v-for="item of items" is_loading="!items.length" :product="item" :key="item"/>
    </div>
</template>

<script setup>
import ProductCard from '@/components/ProductCard.vue';
import { AppUrl }  from '@/main';
import axios from 'axios';
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
import { defineComponent, onMounted, ref } from 'vue';

const toast = useToast();
const items = ref([]);

function getItems(){
    axios.get(AppUrl+'/products/')
        .then((response) => {
            items.value = response.data;
        })
        .catch((response) => {
            console.log(response)
            toast.add({severity: 'error', summary: 'Что-то пошло не так'})
        });
}


defineComponent(ProductCard);
defineComponent(Toast)
onMounted(function() {
    getItems()
})
</script>

<style>
    * {
        color: whitesmoke;
    }
</style>
