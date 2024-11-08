import { createApp } from 'vue'
import App from './App.vue'
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import router  from './router/index'
import ToastService from 'primevue/toastservice';




createApp(App)
    .use(router)
    .use(PrimeVue,
        {
            theme: {
                preset: Aura
            }
        })
    .use(ToastService)
    .mount('#app')

export const AppUrl = 'http://localhost:8000';
