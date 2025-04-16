import ThanaShudhi from '../pages/bm_management/thana_shudhi/Layout.vue'
import ThanaShudhiAll from '../pages/bm_management/thana_shudhi/All.vue'
import ThanaShudhiCreate from '../pages/bm_management/thana_shudhi/Create.vue'
import ThanaShudhiDetails from '../pages/bm_management/thana_shudhi/Details.vue'
import ThanaShudhiEdit from '../pages/bm_management/thana_shudhi/Edit.vue'

const router ={
    name: "ThanaShudhi",
    path: 'thana-shudhi',
    component: ThanaShudhi,
    children:[
        {
            name: "ThanaShudhiAll",
            path: 'all',
            component: ThanaShudhiAll,
        },
        {
            name: "ThanaShudhiCreate",
            path: 'create',
            component: ThanaShudhiCreate,
        },
        {
            name: "ThanaShudhiDetails",
            path: 'details/:shudhi_id',
            component: ThanaShudhiDetails,
            props: true,
        },
        {
            name: "ThanaShudhiEdit",
            path: 'edit/:shudhi_id',
            component: ThanaShudhiEdit,
            props: true,
        },
    ]
}
export default router;
