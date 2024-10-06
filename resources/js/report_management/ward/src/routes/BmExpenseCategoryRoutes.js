import BmExpenseCategory from '../pages/bm_management/bm_expense_category/Layout.vue'
import BmExpenseCategoryAll from '../pages/bm_management/bm_expense_category/All.vue'
import BmExpenseCategoryCreate from '../pages/bm_management/bm_expense_category/Create.vue'
import BmExpenseCategoryDetails from '../pages/bm_management/bm_expense_category/Details.vue'
import BmExpenseCategoryEdit from '../pages/bm_management/bm_expense_category/Edit.vue'


const router ={
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
}
export default router;
