import Unit from '../pages/unit_management/unit/Layout.vue'
import UnitAll from '../pages/unit_management/unit/All.vue'
import UnitCreate from '../pages/unit_management/unit/Create.vue'
import UnitDetails from '../pages/unit_management/unit/Details.vue'
import UnitEdit from '../pages/unit_management/unit/Edit.vue'

const router = {
    name: "Unit",
    path: '/unit',
    component: Unit,
    children:[
        {
            name: "UnitAll",
            path: 'all',
            component: UnitAll,
        },
        {
            name: "UnitCreate",
            path: 'create',
            component: UnitCreate,
        },
        {
            name: "UnitDetails",
            path: 'details/:unit_id',
            component: UnitDetails,
            props: true,
        },
        {
            name: "UnitEdit",
            path: 'edit/:unit_id',
            component: UnitEdit,
            props: true,
        },
    ]
}

export default router;
