import { createRouter, createWebHashHistory } from 'vue-router';
import main_route from "./src/routes/routes";
import UnitReportUpload from "./src/pages/UnitReportUpload.vue";

const router = createRouter({
    history: createWebHashHistory(),
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    routes: [
        {
            name: "UnitReportUpload",
            path: '/unit-report-upload/:month/:user_id',
            component: UnitReportUpload,
            props: true
        },
        {
            name: "UnitReportUploadMonthly",
            path: '/unit-report-upload-monthly/:month/:user_id',
            component: UnitReportUpload,
            props: true
        },
        main_route,
    ]
})
// previous route store
router.beforeEach((to, from, next) => {
    to.href.length > 2 &&
        window.sessionStorage.setItem('prevurl', to.href);
    next();
});

router.afterEach((to, from) => {
    let el = document.querySelector(`[href="${to.href}"]`);
})

export default router;

