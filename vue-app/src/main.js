import { createApp } from 'vue'
import App from './App.vue'
import router  from './router/index'

const AppUrl = 'localhost';



createApp(App).use(router).mount('#app')
export {
    AppUrl
}
