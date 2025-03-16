import Program from '../pages/program_management/program/Layout.vue'
import ProgramAll from '../pages/program_management/program/All.vue'
import ProgramCreate from '../pages/program_management/program/Create.vue'
import ProgramDetails from '../pages/program_management/program/Details.vue'
import ProgramEdit from '../pages/program_management/program/Edit.vue'

const router ={
    name: "Program",
    path: 'program',
    component: Program,
    children:[
        {
            name: "ProgramAll",
            path: 'all',
            component: ProgramAll,
        },
        {
            name: "ProgramCreate",
            path: 'create',
            component: ProgramCreate,
        },
        {
            name: "ProgramDetails",
            path: 'details/:program_id',
            component: ProgramDetails,
            props: true,
        },
        {
            name: "ProgramEdit",
            path: 'edit/:program_id',
            component: ProgramEdit,
            props: true,
        },
    ]
}
export default router;
