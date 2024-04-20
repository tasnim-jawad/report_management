import { createRouter, createWebHashHistory } from 'vue-router'

import App from '../MainLayout.vue'
import Dashboard from '../components/Dashboard.vue'

import Dawat from '../pages/Dawat.vue'
import Department from '../pages/Department.vue'
import DawahAndProkashona from '../pages/DawahAndProkashona.vue'
import Kormosuci from '../pages/Kormosuci.vue'
import Songothon from '../pages/Songothon.vue'
import Proshikkhon from '../pages/Proshikkhon.vue'
import Shomajsheba from '../pages/Shomajsheba.vue'
import Rastrio from '../pages/Rastrio.vue'
import ReportInfo from '../pages/ReportInfo.vue'
import Jonoshokti from '../pages/Jonoshokti.vue'
import CreateUser from '../pages/CreateUser.vue'
import ShowUser from '../pages/ShowUser.vue'
import EditUser from '../pages/EditUser.vue'




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
                    name: "Jonoshokti",
                    path: 'jonoshokti',
                    component: Jonoshokti,
                },
                {
                    name:'Dawat',
                    path: 'dawat',
                    component: Dawat,
                },
                {
                    name:'Department',
                    path: 'department',
                    component: Department,
                },
                {
                    name:'DawahAndProkashona',
                    path: 'dawah-and-prokashona',
                    component: DawahAndProkashona,
                },
                {
                    name:'Kormosuci',
                    path: 'kormosuci',
                    component: Kormosuci,
                },
                {
                    name:'Songothon',
                    path: 'songothon',
                    component: Songothon,
                },
                {
                    name:'Proshikkhon',
                    path: 'proshikkhon',
                    component: Proshikkhon,
                },
                {
                    name:'Shomajsheba',
                    path: 'shomajsheba',
                    component: Shomajsheba,
                },
                {
                    name:'Rastrio',
                    path: 'rastrio',
                    component: Rastrio,
                },
                {
                    name:'ReportInfo',
                    path: 'report-info',
                    component: ReportInfo,
                },
                {
                    name: "CreateUser",
                    path: 'create-user',
                    component: CreateUser,
                },
                {
                    name: "ShowUser",
                    path: 'show-user/:user_id',
                    component: ShowUser,
                    props: true,
                },
                {
                    name: "EditUser",
                    path: 'edit-user/:user_id',
                    component: EditUser,
                    props: true,
                },
            ]
        },

    ]
});


export default routes;
