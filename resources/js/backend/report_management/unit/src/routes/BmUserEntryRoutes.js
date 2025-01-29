import BmUserEntry from '../pages/bm_management/bm_user_entry/Layout.vue'
import BmUserEntryAll from '../pages/bm_management/bm_user_entry/All.vue'
import BmUserEntryCreate from '../pages/bm_management/bm_user_entry/Create.vue'
import BmUserEntryDetails from '../pages/bm_management/bm_user_entry/Details.vue'
import BmUserEntryEdit from '../pages/bm_management/bm_user_entry/Edit.vue'

const router ={
    name: "BmUserEntry",
    path: 'bm-user-entry',
    component: BmUserEntry,
    children:[
        {
            name: "BmUserEntryAll",
            path: 'all',
            component: BmUserEntryAll,
        },
        {
            name: "BmUserEntryCreate",
            path: 'create',
            component: BmUserEntryCreate,
        },
        {
            name: "BmUserEntryDetails",
            path: 'details/:entry_id',
            component: BmUserEntryDetails,
            props: true,
        },
        {
            name: "BmUserEntryEdit",
            path: 'edit/:entry_id',
            component: BmUserEntryEdit,
            props: true,
        },
    ]
}
export default router;
