import { createRouter, createWebHashHistory } from 'vue-router'

import App from '../MainLayout.vue'

import Dashboard from '../pages/Dashboard.vue'
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

import BmCategoryAll from '../pages/bm_management/bm_category/All.vue'
import BmCategoryCreate from '../pages/bm_management/bm_category/Create.vue'
import BmCategoryDetails from '../pages/bm_management/bm_category/Details.vue'
import BmCategoryEdit from '../pages/bm_management/bm_category/Edit.vue'

import BmEntryAll from '../pages/bm_management/bm_entry/All.vue'
import BmEntryCreate from '../pages/bm_management/bm_entry/Create.vue'
import BmEntryDetails from '../pages/bm_management/bm_entry/Details.vue'
import BmEntryEdit from '../pages/bm_management/bm_entry/Edit.vue'

import BmCategoryUserAll from '../pages/bm_management/bm_category_user/All.vue'
import BmCategoryUserCreate from '../pages/bm_management/bm_category_user/Create.vue'
import BmCategoryUserDetails from '../pages/bm_management/bm_category_user/Details.vue'
import BmCategoryUserEdit from '../pages/bm_management/bm_category_user/Edit.vue'




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
                {
                    name: "BmCategoryAll",
                    path: 'bm-category/all',
                    component: BmCategoryAll,
                },
                {
                    name: "BmCategoryCreate",
                    path: 'bm-category/create',
                    component: BmCategoryCreate,
                },
                {
                    name: "BmCategoryDetails",
                    path: 'bm-category/details/:category_id',
                    component: BmCategoryDetails,
                    props: true,
                },
                {
                    name: "BmCategoryEdit",
                    path: 'bm-category/edit/:category_id',
                    component: BmCategoryEdit,
                    props: true,
                },
                {
                    name: "BmEntryAll",
                    path: 'bm-entry/all',
                    component: BmEntryAll,
                },
                {
                    name: "BmEntryCreate",
                    path: 'bm-entry/create',
                    component: BmEntryCreate,
                },
                {
                    name: "BmEntryDetails",
                    path: 'bm-entry/details/:entry_id',
                    component: BmEntryDetails,
                    props: true,
                },
                {
                    name: "BmEntryEdit",
                    path: 'bm-entry/edit/:entry_id',
                    component: BmEntryEdit,
                    props: true,
                },
                {
                    name: "BmCategoryUserAll",
                    path: 'bm-category-user/all',
                    component: BmCategoryUserAll,
                },
                {
                    name: "BmCategoryUserCreate",
                    path: 'bm-category-user/create',
                    component: BmCategoryUserCreate,
                },
                {
                    name: "BmCategoryUserDetails",
                    path: 'bm-category-user/details/:category_user_id',
                    component: BmCategoryUserDetails,
                    props: true,
                },
                {
                    name: "BmCategoryUserEdit",
                    path: 'bm-category-user/edit/:category_user_id',
                    component: BmCategoryUserEdit,
                    props: true,
                },
            ]
        },

    ]
});


export default routes;
