import ProgramSchedule from '../pages/program_management/program_schedule/Layout.vue'
import ProgramScheduleAll from '../pages/program_management/program_schedule/All.vue'
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
            name: "ProgramScheduleCreate",
            path: 'create',
            component: ProgramScheduleCreate,
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
