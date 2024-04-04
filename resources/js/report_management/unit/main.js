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

axios.interceptors.request.use(function (config) {
    return config;
}, function (error) {
    return Promise.reject(error);
});

// Add a response interceptor
axios.interceptors.response.use(function (response) {
    console.log(response);
    return response;
}, function (error) {
    console.log(error);
    // return Promise.reject(error);
    if(Object.keys(error.response?.data?.errors).length){
        var object = error.response?.data?.errors;
        for (const key in error.response?.data?.errors) {
            if (Object.hasOwnProperty.call(object, key)) {
                const element = object[key];
                window.toaster(element[0], 'error');
            }
        }
    }else if(error.response?.data?.message){
        window.toaster(error.response.data.message, 'error');
    }else{
        window.toaster('Faild!! Something is wrong.', 'error');
    }
});

const pinia = createPinia()
const app = createApp({});
app.component('app', App);
app.component('form-input', FormInput);

app.use(routes).use(pinia).mount('#app');
