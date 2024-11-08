<template>
    <navigation-component></navigation-component>
    <router-view class="view" />
</template>
<script setup>
import NavigationComponent from "./components/NavigationComponent.vue";
</script>
<style>
#app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}

nav {
    padding: 30px;
}

nav a {
    font-weight: bold;
    color: #2c3e50;
}

nav a.router-link-exact-active {
    color: #42b983;
}
.view {
    margin: 2em;
    position: relative;
    border: none;
    padding: 10px 15px;
    border-radius: 10px;
    font-weight: bold;
    overflow: hidden;
}

/* .view::after {
    content: "";
    position: absolute;
    top: calc(var(--y, 0) * 1px - 250px);
    left: calc(var(--x, 0) * 1px - 250px);
    width: 100;
    height: 400px;
    background: radial-gradient(white, #3984ff00 70%);

    opacity: 0;
    transition: opacity 0.2s;
}

.view:hover::after {
    opacity: 0.4;
} */
</style>
<script>
const view = document.querySelector("#app");
view.addEventListener("mousemove", (e) => {
    const { x, y } = view.getBoundingClientRect();
    view.style.setProperty("--x", e.clientX - x);
    view.style.setProperty("--y", e.clientY - y);
});
</script>
