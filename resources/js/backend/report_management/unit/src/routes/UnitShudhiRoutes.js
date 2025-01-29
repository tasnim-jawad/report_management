import UnitShudhi from '../pages/bm_management/unit_shudhi/Layout.vue'
import UnitShudhiAll from '../pages/bm_management/unit_shudhi/All.vue'
import UnitShudhiCreate from '../pages/bm_management/unit_shudhi/Create.vue'
import UnitShudhiDetails from '../pages/bm_management/unit_shudhi/Details.vue'
import UnitShudhiEdit from '../pages/bm_management/unit_shudhi/Edit.vue'

const router ={
    name: "UnitShudhi",
    path: 'unit-shudhi',
    component: UnitShudhi,
    children:[
        {
            name: "UnitShudhiAll",
            path: 'all',
            component: UnitShudhiAll,
        },
        {
            name: "UnitShudhiCreate",
            path: 'create',
            component: UnitShudhiCreate,
        },
        {
            name: "UnitShudhiDetails",
            path: 'details/:shudhi_id',
            component: UnitShudhiDetails,
            props: true,
        },
        {
            name: "UnitShudhiEdit",
            path: 'edit/:shudhi_id',
            component: UnitShudhiEdit,
            props: true,
        },
    ]
}
export default router;
