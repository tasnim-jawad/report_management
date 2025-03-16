import BmCategoryUser from '../pages/bm_management/bm_category_user/Layout.vue'
import BmCategoryUserAll from '../pages/bm_management/bm_category_user/All.vue'
import BmCategoryUserCreate from '../pages/bm_management/bm_category_user/Create.vue'
import BmCategoryUserDetails from '../pages/bm_management/bm_category_user/Details.vue'
import BmCategoryUserEdit from '../pages/bm_management/bm_category_user/Edit.vue'

const router ={
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
}
export default router;
