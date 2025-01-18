import ProgramDelegate from '../pages/program_management/program_delegate/Layout.vue'
import ProgramDelegateAllProgram from '../pages/program_management/program_delegate/AllProgram.vue'
import ProgramDelegateProgramWiseDelegate from '../pages/program_management/program_delegate/ProgramWiseDelegate.vue'
import ProgramDelegateCreate from '../pages/program_management/program_delegate/Create.vue'
import ProgramDelegateDetails from '../pages/program_management/program_delegate/Details.vue'
import ProgramDelegateEdit from '../pages/program_management/program_delegate/Edit.vue'

const router ={
    name: "ProgramDelegate",
    path: 'program-delegate',
    component: ProgramDelegate,
    children:[
        {
            name: "ProgramDelegateAllProgram",
            path: 'all-program',
            component: ProgramDelegateAllProgram,
        },
        {
            name: "ProgramDelegateProgramWiseDelegate",
            path: 'program-wise-delegate/:program_id',
            component: ProgramDelegateProgramWiseDelegate,
            props: true,
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
