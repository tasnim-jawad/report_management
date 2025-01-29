import UnitShudhiEntry from '../pages/bm_management/unit_shudhi_entry/Layout.vue'
import UnitShudhiEntryAll from '../pages/bm_management/unit_shudhi_entry/All.vue'
import UnitShudhiEntryCreate from '../pages/bm_management/unit_shudhi_entry/Create.vue'
import UnitShudhiEntryDetails from '../pages/bm_management/unit_shudhi_entry/Details.vue'
import UnitShudhiEntryEdit from '../pages/bm_management/unit_shudhi_entry/Edit.vue'

const router ={
    name: "UnitShudhiEntry",
    path: 'unit-shudhi-entry',
    component: UnitShudhiEntry,
    children:[
        {
            name: "UnitShudhiEntryAll",
            path: 'all',
            component: UnitShudhiEntryAll,
        },
        {
            name: "UnitShudhiEntryCreate",
            path: 'create',
            component: UnitShudhiEntryCreate,
        },
        {
            name: "UnitShudhiEntryDetails",
            path: 'details/:entry_id',
            component: UnitShudhiEntryDetails,
            props: true,
        },
        {
            name: "UnitShudhiEntryEdit",
            path: 'edit/:entry_id',
            component: UnitShudhiEntryEdit,
            props: true,
        },
    ]
}
export default router;
