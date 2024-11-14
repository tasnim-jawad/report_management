import UnitExpenseTarget from '../pages/bm_management/unit_expense_target/Layout.vue'
import UnitExpenseTargetAll from '../pages/bm_management/unit_expense_target/All.vue'
import UnitExpenseTargetCreate from '../pages/bm_management/unit_expense_target/Create.vue'
import UnitExpenseTargetDetails from '../pages/bm_management/unit_expense_target/Details.vue'
import UnitExpenseTargetEdit from '../pages/bm_management/unit_expense_target/Edit.vue'

const router = {
    name: "UnitExpenseTarget",
    path: 'unit-expense-target',
    component: UnitExpenseTarget,
    children:[
        {
            name: "UnitExpenseTargetAll",
            path: 'all',
            component: UnitExpenseTargetAll,
        },
        {
            name: "UnitExpenseTargetCreate",
            path: 'create',
            component: UnitExpenseTargetCreate,
        },
        {
            name: "UnitExpenseTargetDetails",
            path: 'details/:unit_expense_target_id',
            component: UnitExpenseTargetDetails,
            props: true,
        },
        {
            name: "UnitExpenseTargetEdit",
            path: 'edit/:unit_expense_target_id',
            component: UnitExpenseTargetEdit,
            props: true,
        },
    ]
}

export default router;
