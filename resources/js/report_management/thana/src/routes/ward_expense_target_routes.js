import WardExpenseTarget from '../pages/bm_management/ward_expense_target/Layout.vue'
import WardExpenseTargetAll from '../pages/bm_management/ward_expense_target/All.vue'
import WardExpenseTargetCreate from '../pages/bm_management/ward_expense_target/Create.vue'
import WardExpenseTargetDetails from '../pages/bm_management/ward_expense_target/Details.vue'
import WardExpenseTargetEdit from '../pages/bm_management/ward_expense_target/Edit.vue'

const router = {
    name: "WardExpenseTarget",
    path: 'ward-expense-target',
    component: WardExpenseTarget,
    children:[
        {
            name: "WardExpenseTargetAll",
            path: 'all',
            component: WardExpenseTargetAll,
        },
        {
            name: "WardExpenseTargetCreate",
            path: 'create',
            component: WardExpenseTargetCreate,
        },
        {
            name: "WardExpenseTargetDetails",
            path: 'details/:ward_expense_target_id',
            component: WardExpenseTargetDetails,
            props: true,
        },
        {
            name: "WardExpenseTargetEdit",
            path: 'edit/:ward_expense_target_id',
            component: WardExpenseTargetEdit,
            props: true,
        },
    ]
}

export default router;
