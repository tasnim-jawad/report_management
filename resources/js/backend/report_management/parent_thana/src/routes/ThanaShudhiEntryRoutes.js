import ThanaShudhiEntry from '../pages/bm_management/thana_shudhi_entry/Layout.vue'
import ThanaShudhiEntryAll from '../pages/bm_management/thana_shudhi_entry/All.vue'
import ThanaShudhiEntryCreate from '../pages/bm_management/thana_shudhi_entry/Create.vue'
import ThanaShudhiEntryDetails from '../pages/bm_management/thana_shudhi_entry/Details.vue'
import ThanaShudhiEntryEdit from '../pages/bm_management/thana_shudhi_entry/Edit.vue'

const router ={
    name: "ThanaShudhiEntry",
    path: 'thana-shudhi-entry',
    component: ThanaShudhiEntry,
    children:[
        {
            name: "ThanaShudhiEntryAll",
            path: 'all',
            component: ThanaShudhiEntryAll,
        },
        {
            name: "ThanaShudhiEntryCreate",
            path: 'create',
            component: ThanaShudhiEntryCreate,
        },
        {
            name: "ThanaShudhiEntryDetails",
            path: 'details/:entry_id',
            component: ThanaShudhiEntryDetails,
            props: true,
        },
        {
            name: "ThanaShudhiEntryEdit",
            path: 'edit/:entry_id',
            component: ThanaShudhiEntryEdit,
            props: true,
        },
    ]
}
export default router;
