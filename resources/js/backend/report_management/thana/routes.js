import { createRouter, createWebHashHistory } from "vue-router";
import main_route from "./src/routes/routes";
import WardReportUpload from "./src/pages/WardReportUpload.vue";
import ThanaReportUploadMonthly from "./src/pages/ThanaReportUploadMonthly.vue";
import WardReportCheck from "./src/pages/WardReportCheck.vue";

const router = createRouter({
    history: createWebHashHistory(),
    linkActiveClass: "active",
    linkExactActiveClass: "active",
    routes: [
        {
            name: "WardReportUpload",
            path: "/ward-report-upload/:month/:user_id",
            component: WardReportUpload,
            props: true,
        },
        {
            name: "ThanaReportUploadMonthly",
            path: "/thana-report-upload-monthly/:month/:user_id",
            component: ThanaReportUploadMonthly,
            props: true,
        },
        {
            name: "WardReportCheck",
            path: "/unit-report-check/:month/:unit_id",
            component: WardReportCheck,
            props: true,
        },
        main_route,
    ],
});
// previous route store
router.beforeEach((to, from, next) => {
    to.href.length > 2 && window.sessionStorage.setItem("prevurl", to.href);
    next();
});

router.afterEach((to, from) => {
    let el = document.querySelector(`[href="${to.href}"]`);
});

export default router;
