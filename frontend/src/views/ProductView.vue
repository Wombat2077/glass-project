<template>
    <Toast />
    <div class="page">
    <img :src="photopath">
    <h1>
        {{ product?.name }}
    </h1>
    <h2>
        Цена: {{ product?.price}}₽
    </h2>
    <hr>
    <div class="product-overview" v-if="product?.description">
        <h2> Описание товара</h2>
        <p v-for="text of product?.description?.split('\n')" :key="text">
            {{ text }}
        </p>
    </div>
    <div class="product-overview" v-else>
        <h2> Описание товара отсутствует</h2>
    </div>
    <hr>
    <div class="leave-comment">
        <FloatLabel class="float-label">
            <label>Оставьте комментарий</label>
            <Textarea class="new-comment" autoResize v-model="new_comment" rows="4" cols="50"/>
        </FloatLabel>
        <Button label="Оставить комментарий" class="btn"/>
    </div>
    <hr>
    <div v-for="comment of product?.comments" :key="comment">
        <CommentComponent :comment="comment"/>
    </div>
    </div>
</template>

<script setup>
//Toast
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
//PrimeVue
import FloatLabel from 'primevue/floatlabel';
import Textarea from 'primevue/textarea';
import Button from 'primevue/button';
//Vue
import {computed, onMounted, reactive, ref} from 'vue';
import { useRoute } from 'vue-router';
//other
import { AppUrl } from '@/main';
import axios from 'axios';
import CommentComponent from '@/components/CommentComponent.vue';

const product_id = computed(() => useRoute().params.id)
const photopath = computed(() => product.photopath ?AppUrl +'/'+ product.photopath : AppUrl+'/images/placeholder.jpeg')
const product = reactive({});
const new_comment = ref('')
const toast = useToast();

function getData(){
    product
    axios
        .get(AppUrl + '/products/'+product_id.value)
        .then(response => {
            for(const [key, value] of Object.entries(response.data)){
                product[key] = value;
            }
        })
        .catch(response => {
            console.log(response);

            toast.add({severity: 'error', summary: 'Что-то пошло не так.'})
        })
}

onMounted(function(){
    getData();
})
</script>

<style scoped>
    .page {
        color: whitesmoke;
        display: flex;
        flex-direction: column;
        align-items: start;
        padding: 5%
    }
    hr {
        max-width: 40%;
        min-width: 30%;
        color: whitesmoke;
        height: 2px;
        margin-inline: auto;
        margin-left: 0;
        margin-block: 2em;
    }
    .product-overview {
        display: flex;
        flex-direction: column;
        text-align: justify;
        max-width: 40%
    }
    .new-comment {
        min-width: 90%;
        min-width: 4em;
        margin-right: auto;
        margin-left: 0;
    }
    .leave-comment {
        width: 40%;
        display: flex;
        flex-direction: column;
    }
    .float-label {
        text-align: start;
    }
    .btn {
        margin: 1em;
        max-width: 20em;
    }
</style>
