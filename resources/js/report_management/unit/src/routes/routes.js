import { createRouter, createWebHashHistory } from 'vue-router'

import App from '../MainLayout.vue'
import Dashboard from '../components/Dashboard.vue'
import Home from '../components/Home.vue'
import Task from '../components/Task.vue'




const routes = createRouter({
    history: createWebHashHistory(),
    routes: [
        {

            path: '/',
            // component: App,
            children:[
                {
                    name: "Dashboard",
                    path: 'dashboard',
                    component: Dashboard,
                },
                {
                    name:'Home',
                    path: 'home',
                    component: Home,
                },
                {
                    name:'Task',
                    path: 'task',
                    component: Task,
                },


            ]
        },

    ]
});


export default routes;
