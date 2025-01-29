import BmEntry from '../pages/bm_management/bm_entry/Layout.vue'
import BmEntryAll from '../pages/bm_management/bm_entry/All.vue'
import BmEntryCreate from '../pages/bm_management/bm_entry/Create.vue'
import BmEntryDetails from '../pages/bm_management/bm_entry/Details.vue'
import BmEntryEdit from '../pages/bm_management/bm_entry/Edit.vue'

const router ={
    name: "BmEntry",
    path: 'bm-entry',
    component: BmEntry,
    children:[
        {
            name: "BmEntryAll",
            path: 'all',
            component: BmEntryAll,
        },
        {
            name: "BmEntryCreate",
            path: 'create',
            component: BmEntryCreate,
        },
        {
            name: "BmEntryDetails",
            path: 'details/:entry_id',
            component: BmEntryDetails,
            props: true,
        },
        {
            name: "BmEntryEdit",
            path: 'edit/:entry_id',
            component: BmEntryEdit,
            props: true,
        },
    ]
}
export default router;
