import Ward from '../pages/ward_management/ward/Layout.vue'
import WardAll from '../pages/ward_management/ward/All.vue'
import WardCreate from '../pages/ward_management/ward/Create.vue'
import WardDetails from '../pages/ward_management/ward/Details.vue'
import WardEdit from '../pages/ward_management/ward/Edit.vue'

const router = {
    name: "Ward",
    path: '/ward',
    component: Ward,
    children:[
        {
            name: "WardAll",
            path: 'all',
            component: WardAll,
        },
        {
            name: "WardCreate",
            path: 'create',
            component: WardCreate,
        },
        {
            name: "WardDetails",
            path: 'details/:ward_id',
            component: WardDetails,
            props: true,
        },
        {
            name: "WardEdit",
            path: 'edit/:ward_id',
            component: WardEdit,
            props: true,
        },
    ]
}

export default router;
