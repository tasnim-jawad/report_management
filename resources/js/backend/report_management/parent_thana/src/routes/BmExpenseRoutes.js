import BmExpense from '../pages/bm_management/bm_expense/Layout.vue'
import BmExpenseAll from '../pages/bm_management/bm_expense/All.vue'
import BmExpenseCreate from '../pages/bm_management/bm_expense/Create.vue'
import BmExpenseDetails from '../pages/bm_management/bm_expense/Details.vue'
import BmExpenseEdit from '../pages/bm_management/bm_expense/Edit.vue'


const router ={
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
}
export default router;
