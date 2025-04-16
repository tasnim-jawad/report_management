import ThanaBmUserEntry from '../pages/bm_management/thana_bm_user_entry/Layout.vue'
import ThanaBmUserEntryAll from '../pages/bm_management/thana_bm_user_entry/All.vue'
import ThanaBmUserEntryCreate from '../pages/bm_management/thana_bm_user_entry/Create.vue'
import ThanaBmUserEntryDetails from '../pages/bm_management/thana_bm_user_entry/Details.vue'
import ThanaBmUserEntryEdit from '../pages/bm_management/thana_bm_user_entry/Edit.vue'

const router ={
    name: "ThanaBmUserEntry",
    path: 'thana-bm-user-entry',
    component: ThanaBmUserEntry,
    children:[
        {
            name: "ThanaBmUserEntryAll",
            path: 'all',
            component: ThanaBmUserEntryAll,
        },
        {
            name: "ThanaBmUserEntryCreate",
            path: 'create',
            component: ThanaBmUserEntryCreate,
        },
        {
            name: "ThanaBmUserEntryDetails",
            path: 'details/:entry_id',
            component: ThanaBmUserEntryDetails,
            props: true,
        },
        {
            name: "ThanaBmUserEntryEdit",
            path: 'edit/:entry_id',
            component: ThanaBmUserEntryEdit,
            props: true,
        },
    ]
}
export default router;
