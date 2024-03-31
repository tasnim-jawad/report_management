import '../../bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'
import routes from './src/routes/routes';

import App from './src/MainLayout.vue';



const pinia = createPinia()
const app = createApp({});
app.component('app', App);

app.use(routes).use(pinia).mount('#app');
