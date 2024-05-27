import { createRouter, createWebHashHistory } from 'vue-router'

import App from '../MainLayout.vue'
import Dashboard from '../components/Dashboard.vue'
import Home from '../components/Home.vue'
import Task from '../components/Task.vue'
import UnitUserManagement from '../pages/UnitUserManagement.vue'
import UnitList from '../pages/UnitList.vue'




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
                    name:'UnitUserManagement',
                    path: 'unit-user-management',
                    component: UnitUserManagement,
                },
                {
                    name:'UnitList',
                    path: 'unit-list',
                    component: UnitList,
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
