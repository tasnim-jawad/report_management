import '../../bootstrap';
import { createApp } from 'vue';
import { createPinia } from 'pinia'
import routes from './src/routes/routes';

import App from './src/MainLayout.vue';
import FormInput from './src/components/FormInput.vue';
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.defaults.headers.common["Authorization"] = `Bearer ${window.localStorage?.token}`;
axios.defaults.baseURL = location.origin + '/api/v1';



const pinia = createPinia()
const app = createApp({});
app.component('app', App);
app.component('form-input', FormInput);

app.use(routes).use(pinia).mount('#app');
