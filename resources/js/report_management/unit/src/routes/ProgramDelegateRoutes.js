import ProgramDelegate from '../pages/program_management/program_delegate/Layout.vue'
import ProgramDelegateAll from '../pages/program_management/program_delegate/All.vue'
import ProgramDelegateCreate from '../pages/program_management/program_delegate/Create.vue'
import ProgramDelegateDetails from '../pages/program_management/program_delegate/Details.vue'
import ProgramDelegateEdit from '../pages/program_management/program_delegate/Edit.vue'

const router ={
    name: "ProgramDelegate",
    path: 'program-delegate',
    component: ProgramDelegate,
    children:[
        {
            name: "ProgramDelegateAll",
            path: 'all',
            component: ProgramDelegateAll,
        },
        {
            name: "ProgramDelegateCreate",
            path: 'create',
            component: ProgramDelegateCreate,
        },
        {
            name: "ProgramDelegateDetails",
            path: 'details/:program_delegate_id',
            component: ProgramDelegateDetails,
            props: true,
        },
        {
            name: "ProgramDelegateEdit",
            path: 'edit/:program_delegate_id',
            component: ProgramDelegateEdit,
            props: true,
        },
    ]
}
export default router;
