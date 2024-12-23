import WardJonoshokti from '../pages/ward_management/ward_jonoshokti/Layout.vue'
import WardJonoshoktiAll from '../pages/ward_management/ward_jonoshokti/All.vue'
import WardJonoshoktiCreate from '../pages/ward_management/ward_jonoshokti/Create.vue'
import WardJonoshoktiDetails from '../pages/ward_management/ward_jonoshokti/Details.vue'
import WardJonoshoktiEdit from '../pages/ward_management/ward_jonoshokti/Edit.vue'
import WardJonoshoktiResponsibility from '../pages/ward_management/ward_jonoshokti/Responsibility.vue'

const router = {
    name: "WardJonoshokti",
    path: '/ward-jonoshokti',
    component: WardJonoshokti,
    children:[
        {
            name: "WardJonoshoktiAll",
            path: 'all',
            component: WardJonoshoktiAll,
        },
        {
            name: "WardJonoshoktiCreate",
            path: 'create',
            component: WardJonoshoktiCreate,
        },
        {
            name: "WardJonoshoktiDetails",
            path: 'details/:user_id',
            component: WardJonoshoktiDetails,
            props: true,
        },
        {
            name: "WardJonoshoktiEdit",
            path: 'edit/:user_id',
            component: WardJonoshoktiEdit,
            props: true,
        },
        {
            name: "WardJonoshoktiResponsibility",
            path: 'responsibility/:user_id/:ward_id/:responsibility_id?',
            component: WardJonoshoktiResponsibility,
            props: true,
        },
    ]
}

export default router;
