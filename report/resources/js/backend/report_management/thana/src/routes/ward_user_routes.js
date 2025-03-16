import User from '../pages/user/Layout.vue'
import UserAll from '../pages/user/All.vue'
import UserCreate from '../pages/user/Create.vue'
import UserDetails from '../pages/user/Details.vue'
import UserEdit from '../pages/user/Edit.vue'

const router = {
    name: "User",
    path: '/user',
    component: User,
    children:[
        {
            name: "UserAll",
            path: 'all',
            component: UserAll,
        },
        {
            name: "UserCreate",
            path: 'create',
            component: UserCreate,
        },
        {
            name: "UserDetails",
            path: 'details/:user_id',
            component: UserDetails,
            props: true,
        },
        {
            name: "UserEdit",
            path: 'edit/:user_id',
            component: UserEdit,
            props: true,
        },
    ]
}

export default router;
