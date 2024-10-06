import BmCategory from '../pages/bm_management/bm_category/Layout.vue'
import BmCategoryAll from '../pages/bm_management/bm_category/All.vue'
import BmCategoryCreate from '../pages/bm_management/bm_category/Create.vue'
import BmCategoryDetails from '../pages/bm_management/bm_category/Details.vue'
import BmCategoryEdit from '../pages/bm_management/bm_category/Edit.vue'

const router = {
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
}

export default router;
