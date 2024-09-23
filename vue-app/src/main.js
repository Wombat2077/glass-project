import { createApp } from 'vue'
import App from './App.vue'
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import router  from './router/index'

const AppUrl = 'localhost';



createApp(App)
    .use(router)
    .use(PrimeVue,
        {
            theme: {
                preset: Aura
            }
        })
    .mount('#app')
export {
    AppUrl
}
