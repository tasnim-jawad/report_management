import ProgramSchedule from '../pages/program_management/program_schedule/Layout.vue'
import ProgramScheduleAll from '../pages/program_management/program_schedule/All.vue'
import ProgramScheduleAllProgram from '../pages/program_management/program_schedule/AllProgram.vue'
import ProgramScheduleCreate from '../pages/program_management/program_schedule/Create.vue'
import ProgramScheduleDetails from '../pages/program_management/program_schedule/Details.vue'
import ProgramScheduleEdit from '../pages/program_management/program_schedule/Edit.vue'

const router ={
    name: "ProgramSchedule",
    path: 'program-schedule',
    component: ProgramSchedule,
    children:[
        {
            name: "ProgramScheduleAll",
            path: 'all',
            component: ProgramScheduleAll,
        },
        {
            name: "ProgramScheduleAllProgram",
            path: 'all-program',
            component: ProgramScheduleAllProgram,
        },
        {
            name: "ProgramScheduleCreate",
            path: 'create/:program_id',
            component: ProgramScheduleCreate,
            props: true
        },
        {
            name: "ProgramScheduleDetails",
            path: 'details/:program_id',
            component: ProgramScheduleDetails,
            props: true,
        },
        {
            name: "ProgramScheduleEdit",
            path: 'edit/:program_id',
            component: ProgramScheduleEdit,
            props: true,
        },
    ]
}
export default router;
