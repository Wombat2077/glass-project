<template>
<div>
    <h3 class="title">
        {{ comment?.user?.name }}
    </h3>
    <p class="text">
        {{ comment?.text }}
    </p>
<!--     <div class="score"> MAYBE SOON

    </div> -->
</div>
</template>
<script setup>
import { defineProps } from 'vue';


defineProps({
    comment: Object
})
</script>
<style scoped>
 div {
    border: solid whitesmoke 2px;
    width: 40em;
    padding: 2em;
    margin: 3px;
    text-align: start;
 }
</style>
