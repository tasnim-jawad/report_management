import ThanaBmCategoryUser from '../pages/bm_management/thana_bm_category_user/Layout.vue'
import ThanaBmCategoryUserAll from '../pages/bm_management/thana_bm_category_user/All.vue'
import ThanaBmCategoryUserCreate from '../pages/bm_management/thana_bm_category_user/Create.vue'
import ThanaBmCategoryUserDetails from '../pages/bm_management/thana_bm_category_user/Details.vue'
import ThanaBmCategoryUserEdit from '../pages/bm_management/thana_bm_category_user/Edit.vue'

const router ={
    name: "ThanaBmCategoryUser",
    path: 'thana-bm-category-user',
    component: ThanaBmCategoryUser,
    children:[
        {
            name: "ThanaBmCategoryUserAll",
            path: 'all',
            component: ThanaBmCategoryUserAll,
        },
        {
            name: "ThanaBmCategoryUserCreate",
            path: 'create',
            component: ThanaBmCategoryUserCreate,
        },
        {
            name: "ThanaBmCategoryUserDetails",
            path: 'details/:category_user_id',
            component: ThanaBmCategoryUserDetails,
            props: true,
        },
        {
            name: "ThanaBmCategoryUserEdit",
            path: 'edit/:category_user_id',
            component: ThanaBmCategoryUserEdit,
            props: true,
        },
    ]
}
export default router;
