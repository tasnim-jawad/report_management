import '../../bootstrap.js';
import '../../plugins/axios_setup.js';
import '../../plugins/sweet_alert.js';
import '../../plugins/moment_setup.js';

import { createApp } from 'vue';
import { createPinia } from 'pinia'
import router from './routes.js';

import App from './App.vue';
import FormInput from './src/components/FormInput.vue';


const pinia = createPinia()
const app = createApp({});


app.component('app', App);
app.component('form-input', FormInput);
app.use(router).use(pinia).mount('#app');
