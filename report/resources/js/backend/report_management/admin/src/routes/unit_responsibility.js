import UnitResponsibility from '../pages/unit_responsibility/Layout.vue'
import UnitResponsibilityAll from '../pages/unit_responsibility/All.vue'
import UnitResponsibilityCreate from '../pages/unit_responsibility/Create.vue'
import UnitResponsibilityDetails from '../pages/unit_responsibility/Details.vue'
import UnitResponsibilityEdit from '../pages/unit_responsibility/Edit.vue'

const router = {
    name: "UnitResponsibility",
    path: '/unit-responsibility',
    component: UnitResponsibility,
    children:[
        {
            name: "UnitResponsibilityAll",
            path: 'all',
            component: UnitResponsibilityAll,
        },
        {
            name: "UnitResponsibilityCreate",
            path: 'create',
            component: UnitResponsibilityCreate,
        },
        {
            name: "UnitResponsibilityDetails",
            path: 'details/:responsibility_id',
            component: UnitResponsibilityDetails,
            props: true,
        },
        {
            name: "UnitResponsibilityEdit",
            path: 'edit/:responsibility_id',
            component: UnitResponsibilityEdit,
            props: true,
        },
    ]
}

export default router;
