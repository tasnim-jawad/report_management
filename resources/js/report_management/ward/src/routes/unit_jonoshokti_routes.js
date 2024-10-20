import UnitJonoshokti from '../pages/unit_management/unit_jonoshokti/Layout.vue'
import UnitJonoshoktiAll from '../pages/unit_management/unit_jonoshokti/All.vue'
import UnitJonoshoktiCreate from '../pages/unit_management/unit_jonoshokti/Create.vue'
import UnitJonoshoktiDetails from '../pages/unit_management/unit_jonoshokti/Details.vue'
import UnitJonoshoktiEdit from '../pages/unit_management/unit_jonoshokti/Edit.vue'
import UnitJonoshoktiResponsibility from '../pages/unit_management/unit_jonoshokti/Responsibility.vue'

const router = {
    name: "UnitJonoshokti",
    path: '/unit-jonoshokti',
    component: UnitJonoshokti,
    children:[
        {
            name: "UnitJonoshoktiAll",
            path: 'all',
            component: UnitJonoshoktiAll,
        },
        {
            name: "UnitJonoshoktiCreate",
            path: 'create',
            component: UnitJonoshoktiCreate,
        },
        {
            name: "UnitJonoshoktiDetails",
            path: 'details/:unit_user_id',
            component: UnitJonoshoktiDetails,
            props: true,
        },
        {
            name: "UnitJonoshoktiEdit",
            path: 'edit/:unit_user_id',
            component: UnitJonoshoktiEdit,
            props: true,
        },
        {
            name: "UnitJonoshoktiResponsibility",
            path: 'responsibility/:user_id/:unit_id/:responsibility_id?',
            component: UnitJonoshoktiResponsibility,
            props: true,
        },
    ]
}

export default router;
