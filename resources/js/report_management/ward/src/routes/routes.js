import { createRouter, createWebHashHistory } from 'vue-router'

import MainLayout from '../MainLayout.vue'

import Dashboard from '../pages/Dashboard.vue'
import Dawat from '../pages/Dawat.vue'
import Department from '../pages/Department.vue'
import DawahAndProkashona from '../pages/DawahAndProkashona.vue'
import Kormosuci from '../pages/Kormosuci.vue'
import Songothon from '../pages/Songothon.vue'
import Proshikkhon from '../pages/Proshikkhon.vue'
import Shomajsheba from '../pages/Shomajsheba.vue'
import Rastrio from '../pages/Rastrio.vue'
import Montobbo from '../pages/Montobbo.vue'
import ReportInfo from '../pages/ReportInfo.vue'
import BmUserReport from '../pages/bm_management/BmUserReport.vue'
import BmTotalReport from '../pages/bm_management/BmTotalReport.vue'
import PrintReport from '../pages/PrintReport.vue'
import UploadReport from '../pages/UploadReport.vue'

import Jonoshokti from '../pages/Jonoshokti.vue'
import CreateUser from '../pages/user/CreateUser.vue'
import ShowUser from '../pages/user/ShowUser.vue'
import EditUser from '../pages/user/EditUser.vue'

import BmCategory from '../pages/bm_management/bm_category/Layout.vue'
import BmCategoryAll from '../pages/bm_management/bm_category/All.vue'
import BmCategoryCreate from '../pages/bm_management/bm_category/Create.vue'
import BmCategoryDetails from '../pages/bm_management/bm_category/Details.vue'
import BmCategoryEdit from '../pages/bm_management/bm_category/Edit.vue'

import BmEntry from '../pages/bm_management/bm_entry/Layout.vue'
import BmEntryAll from '../pages/bm_management/bm_entry/All.vue'
import BmEntryCreate from '../pages/bm_management/bm_entry/Create.vue'
import BmEntryDetails from '../pages/bm_management/bm_entry/Details.vue'
import BmEntryEdit from '../pages/bm_management/bm_entry/Edit.vue'

import BmCategoryUser from '../pages/bm_management/bm_category_user/Layout.vue'
import BmCategoryUserAll from '../pages/bm_management/bm_category_user/All.vue'
import BmCategoryUserCreate from '../pages/bm_management/bm_category_user/Create.vue'
import BmCategoryUserDetails from '../pages/bm_management/bm_category_user/Details.vue'
import BmCategoryUserEdit from '../pages/bm_management/bm_category_user/Edit.vue'

import BmExpenseCategory from '../pages/bm_management/bm_expense_category/Layout.vue'
import BmExpenseCategoryAll from '../pages/bm_management/bm_expense_category/All.vue'
import BmExpenseCategoryCreate from '../pages/bm_management/bm_expense_category/Create.vue'
import BmExpenseCategoryDetails from '../pages/bm_management/bm_expense_category/Details.vue'
import BmExpenseCategoryEdit from '../pages/bm_management/bm_expense_category/Edit.vue'

import BmExpense from '../pages/bm_management/bm_expense/Layout.vue'
import BmExpenseAll from '../pages/bm_management/bm_expense/All.vue'
import BmExpenseCreate from '../pages/bm_management/bm_expense/Create.vue'
import BmExpenseDetails from '../pages/bm_management/bm_expense/Details.vue'
import BmExpenseEdit from '../pages/bm_management/bm_expense/Edit.vue'

const routes =
        {

            path: '',
            component: MainLayout,
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
                    name:'Montobbo',
                    path: 'montobbo',
                    component: Montobbo,
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
                    name: "BmCategory",
                    path: 'bm-category',
                    component: BmCategory,
                    children:[
                        {
                            name: "BmCategoryAll",
                            path: 'all',
                            component: BmCategoryAll,
                        },
                        {
                            name: "BmCategoryCreate",
                            path: 'create',
                            component: BmCategoryCreate,
                        },
                        {
                            name: "BmCategoryDetails",
                            path: 'details/:category_id',
                            component: BmCategoryDetails,
                            props: true,
                        },
                        {
                            name: "BmCategoryEdit",
                            path: 'edit/:category_id',
                            component: BmCategoryEdit,
                            props: true,
                        },
                    ]
                },
                {
                    name: "BmEntry",
                    path: 'bm-entry',
                    component: BmEntry,
                    children:[
                        {
                            name: "BmEntryAll",
                            path: 'all',
                            component: BmEntryAll,
                        },
                        {
                            name: "BmEntryCreate",
                            path: 'create',
                            component: BmEntryCreate,
                        },
                        {
                            name: "BmEntryDetails",
                            path: 'details/:entry_id',
                            component: BmEntryDetails,
                            props: true,
                        },
                        {
                            name: "BmEntryEdit",
                            path: 'edit/:entry_id',
                            component: BmEntryEdit,
                            props: true,
                        },
                    ]
                },

                {
                    name: "BmCategoryUser",
                    path: 'bm-category-user',
                    component: BmCategoryUser,
                    children:[
                        {
                            name: "BmCategoryUserAll",
                            path: 'all',
                            component: BmCategoryUserAll,
                        },
                        {
                            name: "BmCategoryUserCreate",
                            path: 'create',
                            component: BmCategoryUserCreate,
                        },
                        {
                            name: "BmCategoryUserDetails",
                            path: 'details/:category_user_id',
                            component: BmCategoryUserDetails,
                            props: true,
                        },
                        {
                            name: "BmCategoryUserEdit",
                            path: 'edit/:category_user_id',
                            component: BmCategoryUserEdit,
                            props: true,
                        },
                    ]
                },

                {
                    name: "BmExpenseCategory",
                    path: 'bm-expense-category',
                    component: BmExpenseCategory,
                    children:[
                        {
                            name: "BmExpenseCategoryAll",
                            path: 'all',
                            component: BmExpenseCategoryAll,
                        },
                        {
                            name: "BmExpenseCategoryCreate",
                            path: 'create',
                            component: BmExpenseCategoryCreate,
                        },
                        {
                            name: "BmExpenseCategoryDetails",
                            path: 'details/:expense_category_id',
                            component: BmExpenseCategoryDetails,
                            props: true,
                        },
                        {
                            name: "BmExpenseCategoryEdit",
                            path: 'edit/:expense_category_id',
                            component: BmExpenseCategoryEdit,
                            props: true,
                        },
                    ]
                },

                {
                    name: "BmExpense",
                    path: 'bm-expense',
                    component: BmExpense,
                    children:[
                        {
                            name: "BmExpenseAll",
                            path: 'all',
                            component: BmExpenseAll,
                        },
                        {
                            name: "BmExpenseCreate",
                            path: 'create',
                            component: BmExpenseCreate,
                        },
                        {
                            name: "BmExpenseDetails",
                            path: 'details/:expense_id',
                            component: BmExpenseDetails,
                            props: true,
                        },
                        {
                            name: "BmExpenseEdit",
                            path: 'edit/:expense_id',
                            component: BmExpenseEdit,
                            props: true,
                        },
                    ]
                },
                {
                    name: "BmUserReport",
                    path: 'bm-user-report',
                    component: BmUserReport,
                },
                {
                    name: "BmTotalReport",
                    path: 'bm-total-report',
                    component: BmTotalReport,
                },
                {
                    name: "PrintReport",
                    path: 'print-report',
                    component: PrintReport,
                },
                {
                    name: "UploadReport",
                    path: 'upload-report',
                    component: UploadReport,
                },

            ]
        }

export default routes;
