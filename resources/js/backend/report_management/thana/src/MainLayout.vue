<template>
    <div id="report_app" class="report_app">
        <!-- <div class="d-none overlay"></div> -->
        <div id="report_app_left" class="report_app_left">
            <a href="" class="close_sidebar" @click.prevent="toggle_sidebar"
                ><i class="fa-solid fa-xmark"></i
            ></a>
            <aside>
                <nav id="side_nav" class="side_nav">
                    <div class="logo">
                        <!-- <img src="https://cdn.freebiesupply.com/logos/large/2x/mi-1-logo-black-and-white.png" alt=""> -->
                        <img src="/images/bji_logo2.png" alt="" />
                    </div>
                    <div class="profile_view">
                        <div class="profile_pic">
                            <div class="circle">
                                <div class="image_body">
                                    <img
                                        src="/images/avatar.jpg"
                                        alt=""
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="profile_info">
                            <h5 class="m-0">
                                {{ this.user?.user?.full_name }}
                            </h5>
                            <p class="m-0">
                                {{
                                    this.user?.responsibility?.resposibilities
                                        ?.title
                                }}
                            </p>
                            <!-- <p class="m-0">ward: {{this.user?.responsibility?.org_ward?.title}}</p>
                            <p class="m-0">thana: {{this.user?.thana?.title}}</p> -->
                        </div>
                    </div>
                    <ul class="options">
                        <div class="block_title">Pages</div>
                        <li>
                            <router-link :to="{ name: 'Dashboard' }">
                                <span class="icon_margin"
                                    ><i class="fa-solid fa-gauge"></i></span
                                >ড্যাশবোর্ড থানা
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'UserAll' }">
                                <span class="icon_margin"
                                    ><i
                                        class="fa-solid fa-people-group"
                                    ></i></span
                                >জনশক্তি
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'ProgramAll' }">
                                <span class="icon_margin"
                                    ><i class="fa-solid fa-book"></i></span
                                >প্রোগ্রাম
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                :to="{ name: 'ProgramDelegateAllProgram' }"
                            >
                                <span class="icon_margin"
                                    ><i class="fa-solid fa-book"></i></span
                                >প্রোগ্রাম ডেলিগেট
                            </router-link>
                        </li>
                        <li>
                            <router-link
                                :to="{ name: 'ProgramScheduleAllProgram' }"
                            >
                                <span class="icon_margin"
                                    ><i class="fa-solid fa-book"></i></span
                                >প্রোগ্রাম শিডিউল
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'WardAll' }">
                                <span class="icon_margin"
                                    ><i
                                        class="fa-solid fa-people-group"
                                    ></i></span
                                >ওয়ার্ড
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'WardJonoshoktiAll' }">
                                <span class="icon_margin"
                                    ><i
                                        class="fa-solid fa-people-group"
                                    ></i></span
                                >ওয়ার্ড জনশক্তি
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'WardExpenseTargetAll' }">
                                <span class="icon_margin"
                                    ><i
                                        class="fa-solid fa-people-group"
                                    ></i></span
                                >ওয়ার্ডের ধার্য
                            </router-link>
                        </li>
                        <!-- <li>
                            <router-link :to="{name:'ReportInfo'}">
                                <span class="icon_margin"><i class="fa-solid fa-gauge"></i></span>Monthly Report Info
                            </router-link>
                        </li> -->
                        <li>
                            <router-link :to="{ name: 'Dawat' }">
                                <span class="icon_margin"
                                    ><i class="fa-regular fa-comment"></i></span
                                >দাওয়াত ও তাবলিগ
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'Department' }">
                                <span class="icon_margin"
                                    ><i
                                        class="fa-solid fa-puzzle-piece"
                                    ></i></span
                                >বিভাগ ভিত্তিক তথ্য
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'DawahAndProkashona' }">
                                <span class="icon_margin"><i class="fa-solid fa-book"></i></span>দাওয়াহ্ ও প্রকাশনা
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'Kormosuci' }">
                                <span class="icon_margin"><i class="fa-solid fa-handshake"></i></span>কর্মসূচি
                                বাস্তবায়ন
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'Songothon' }">
                                <span class="icon_margin"><i class="fa-solid fa-sitemap"></i></span>সংগঠন
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'Proshikkhon' }">
                                <span class="icon_margin"><i class="fa-solid fa-chalkboard-user"></i></span>প্ৰশিক্ষণ
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'Shomajsheba' }">
                                <span class="icon_margin"><i class="fa-solid fa-share-from-square"></i></span>সমাজ
                                সংস্কার ও সমাজসেবা
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'Rastrio' }">
                                <span class="icon_margin"><i class="fa-solid fa-globe"></i></span>রাষ্ট্রীয় সংস্কার ও
                                সংশোধন
                            </router-link>
                        </li>
                        <!-- <sidebar-dropdown
                            title="বায়তুলমাল"
                            name="bm"
                            :active_dropdown="active_dropdown"
                            @update_active="set_active_dropdown"
                        > -->
                            <li>
                                <router-link :to="{ name: 'ThanaShudhiAll' }">
                                    <span class="icon_margin"
                                        ><i
                                            class="fa-solid fa-user-tag"
                                        ></i></span
                                    >সুধী তালিকা
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: 'ThanaShudhiEntryAll' }"
                                >
                                    <span class="icon_margin"
                                        ><i
                                            class="fa-solid fa-user-tag"
                                        ></i></span
                                    >সুধী আয় এন্ট্রি করুন
                                </router-link>
                            </li>
                            <li>
                                <router-link
                                    :to="{ name: 'ThanaBmCategoryUserAll' }"
                                >
                                    <span class="icon_margin"
                                        ><i
                                            class="fa-solid fa-user-tag"
                                        ></i></span
                                    >ব্যক্তিগত ধার্য
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'ThanaBmUserEntryAll' }">
                                    <span class="icon_margin"
                                        ><i
                                            class="fa-solid fa-user-tag"
                                        ></i></span
                                    >ব্যক্তিগত বায়তুলমাল
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'BmEntryAll' }">
                                    <span class="icon_margin"
                                        ><i
                                            class="fa-solid fa-dollar-sign"
                                        ></i></span
                                    >আয় এন্ট্রি করুন
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'BmExpenseAll' }">
                                    <span class="icon_margin"
                                        ><i
                                            class="fa-solid fa-circle-dollar-to-slot"
                                        ></i></span
                                    >ব্যয় এন্ট্রি করুন
                                </router-link>
                            </li>
                        <!-- </sidebar-dropdown> -->
                        <li>
                            <router-link :to="{ name: 'Montobbo' }">
                                <span class="icon_margin"><i class="fa-solid fa-comments"></i></span>মন্তব্য
                            </router-link>
                        </li>
                        <!-- <li>
                            <router-link :to="{ name: 'BmCategoryAll' }">
                                <span class="icon_margin"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>আয়ের
                                খাত সমুূহ
                            </router-link>
                        </li> -->
                        <!-- <li>
                            <router-link :to="{ name: 'BmEntryAll' }">
                                <span class="icon_margin"><i class="fa-solid fa-dollar-sign"></i></span>আয় এন্ট্রি করুন
                            </router-link>
                        </li> -->
                        <!-- <li>
                            <router-link :to="{name:'BmCategoryUserAll'}">
                                <span class="icon_margin"><i class="fa-solid fa-user-tag"></i></span>ব্যক্তিগত ধার্য
                            </router-link>
                        </li> -->
                        <!-- <li>
                            <router-link :to="{ name: 'BmExpenseCategoryAll' }">
                                <span class="icon_margin"><i class="fa-solid fa-layer-group"></i></span>ব্যয়ের খাত সমুূহ
                            </router-link>
                        </li> -->
                        <!-- <li>
                            <router-link :to="{ name: 'BmExpenseAll' }">
                                <span class="icon_margin"><i class="fa-solid fa-circle-dollar-to-slot"></i></span>ব্যয়
                                এন্ট্রি করুন
                            </router-link>
                        </li> -->
                        <!-- <li>
                            <router-link :to="{name:'BmUserReport'}">
                                <span class="icon_margin"><i class="fa-solid fa-user-plus"></i></span>BM User Report
                            </router-link>
                        </li> -->
                        <!-- <li>
                            <router-link :to="{name:'BmTotalReport'}">
                                <span class="icon_margin"><i class="fa-solid fa-user-plus"></i></span>BM Total Report
                            </router-link>
                        </li> -->
                        <li>
                            <router-link :to="{ name: 'PrintReport' }">
                                <span class="icon_margin"><i class="fa-solid fa-print"></i></span>রিপোর্ট প্রিন্ট
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'UploadReport' }">
                                <span class="icon_margin"
                                    ><i class="fa-solid fa-print"></i></span
                                >রিপোর্ট আপলোড
                            </router-link>
                        </li>
                    </ul>
                </nav>
            </aside>
        </div>
        <div class="report_app_right">
            <header class="report_app_right_top">
                <div class="left">
                    <a href="#" @click.prevent="toggle_sidebar"
                        ><i class="fa-solid fa-bars"></i
                    ></a>
                </div>
                <div class="middle">
                    <p>
                        থানাঃ {{ this.user?.responsibility?.org_thana?.title }}
                    </p>
                    <p class="city_name">মহানগরীঃ {{ this.user?.city?.title }}</p>
                </div>
                <div class="right">
                    <notification-button
                        :thana_id="user?.responsibility?.org_thana?.id"
                    ></notification-button>
                    <a
                        class="btn"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        ><i class="fa-solid fa-ellipsis-vertical"></i
                    ></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a
                                class="dropdown-item"
                                href="#"
                                @click.prevent="logout"
                                >Logout</a
                            >
                        </li>
                        <li v-if="is_parent">
                            <a
                                class="dropdown-item"
                                href="#"
                                @click.prevent="parent_dashboard"
                                >Parent dashboard</a
                            >
                        </li>
                        <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </div>
            </header>
            <main class="route_body overflow-x-scroll scrollbar_width_none">
                <div
                    class="route_content scrollbar_width_none overflow-y-scroll"
                >
                    <router-view></router-view>
                </div>
            </main>
        </div>
        <!-------------------------------------->
        <!-------------Modal start-------------->
        <!-------------------------------------->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button> -->

        <!-- Modal -->
        <div
            class="modal fade"
            id="staticBackdrop"
            data-bs-backdrop="static"
            data-bs-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            সরাসরি রিপোর্ট ফরমে যেতে চান ?
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body d-flex">
                        <button
                            class="btn btn-success m-auto"
                            type="button"
                            @click="upload_report"
                            :disabled="!month || !user_id"
                            data-bs-toggle="modal"
                        >
                            রিপোর্ট ফরম
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-primary px-4"
                            data-bs-dismiss="modal"
                        >
                            না
                        </button>
                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!------------------------------------>
        <!-------------Modal end-------------->
        <!------------------------------------>

        <!-- NOtification Modal -->
        <!-- Modal -->
        <div
            class="modal fade"
            id="notification_modal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Notification
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="empty_data">
                            <p v-if="!all_notifications.length">
                                No new notifications found.
                            </p>
                        </div>
                        <div
                            class="all_comment"
                            v-for="(notification, index) in all_notifications"
                            :key="index"
                        >
                            <notification-dropdown
                                :notification="notification"
                            ></notification-dropdown>
                        </div>
                    </div>

                    <div class="modal-footer d-flec justify-content-between">
                        <!-- <a href="#" class="btn btn-sm btn-primary" @click.prevent="see_all_notification">See all notification</a> -->
                        <a
                            class="btn btn-sm btn-primary"
                            data-bs-dismiss="modal"
                            @click="
                                go_to_notification(
                                    user?.responsibility?.org_thana?.id
                                )
                            "
                        >
                            See all notification
                        </a>
                        <button
                            type="button"
                            class="btn btn-sm btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import NotificationButton from "./components/NotificationButton.vue";
import NotificationDropdown from "./components/NotificationDropdown.vue";
import SidebarDropdown from "./components/SidebarDropdown.vue";
import { store as data_store } from "./stores/ReportStore";
import { store as notification_store } from "./stores/NotificationStore";
import { store as sidebar_dropdown_store } from "./stores/SidebarDropdownStore";
import { mapActions, mapWritableState } from "pinia";
import moment from "moment";

export default {
    components: {
        NotificationButton,
        NotificationDropdown,
        SidebarDropdown,
    },
    data: function () {
        return {
            user: [],
            user_id: "",
            isThanaReportPage: false,
            notifications: [],
        };
    },
    created: function () {
        let token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "/login";
        }
        // this.$router.push({name:`Dashboard`})
        let prevUrl = window.sessionStorage.getItem("prevurl");
        window.location.hash = prevUrl || "#/dashboard";

        this.auth_user();
        this.set_month();
        this.set_permission_auto();
        this.is_parent_check();
    },
    // mounted: function () {
    //     this.isUnitReportPage =
    //         window.location.href.includes("unit-report-upload");

    //     // Show the modal if not on 'unit-report-upload' page
    //     if (!this.isUnitReportPage) {
    //         let modalElement = new window.bootstrap.Modal(
    //             document.getElementById("staticBackdrop"),
    //             {
    //                 keyboard: false,
    //             }
    //         );
    //         // modalElement.show();  // যেহেতু এখন রিপোর্ট আপলোডের পেইজ নাই তাই এটা কমেন্ট করা হয়েছে
    //     }
    // },
    mounted: async function () {
        let org_type = "thana";
        let thana_active_report = await axios
            .get(`/report-management-control/active-report/${org_type}`)
            .then((response) => {
                return response.data.data;
            })
            .catch((error) => {
                console.error(
                    "An error occurred while fetching unit active report:",
                    error
                );
                return null;
            });
        // console.log("ward active report:", ward_active_report);
        this.thana_active_report_month_info = thana_active_report;

        this.isThanaReportPage = window.location.href.includes(
            "thana-report-upload-monthly"
        );

        // Show the modal if not on 'unit-report-upload' page
        if (!this.isThanaReportPage) {
            let modalElement = new window.bootstrap.Modal(
                document.getElementById("staticBackdrop"),
                {
                    keyboard: false,
                }
            );

            if (this.thana_active_report_month_info) {
                this.month = moment(
                    this.thana_active_report_month_info.month_year
                ).format("YYYY-MM");
                modalElement.show();
            }
            // modalElement.show();
        }
    },
    methods: {
        ...mapActions(data_store, ["set_month","set_permission_auto","is_parent_check"]),
        ...mapActions(notification_store, ["see_all_notification"]),
        auth_user: function () {
            axios.get("/user/thana-user-info").then((responce) => {
                this.user = responce.data;
                this.user_id = this.user?.user?.id;
            });
        },
        logout: function () {
            if (window.confirm("logout")) {
                localStorage.removeItem("token");
                sessionStorage.removeItem("prevurl");
                window.location.href = "/login";
            } else {
                let prevUrl = window.sessionStorage.getItem("prevurl");
                window.location.href = prevUrl || "#/dashboard";
            }
        },

        parent_dashboard: function () {
            if (window.confirm("are you sure to go parent dashboard")) {
                // sessionStorage.removeItem("prevurl");
                window.location.href = "/dashboard/parent-thana";
            } 
        },
        toggle_sidebar: function () {
            const width = window.innerWidth;
            if (width >= 768) {
                const report_app = document.getElementById("report_app");
                report_app.classList.toggle("sidebar_hide");

                const side_nav = document.getElementById("side_nav");
                side_nav.classList.toggle("side_nav_toggle");
            } else if (width < 768) {
                const report_app_left =
                    document.getElementById("report_app_left");
                report_app_left.classList.toggle("report_app_left_toggle");
            }
        },
        upload_report: async function () {
            console.log("upload data", this.month, this.user_id);

            let modalElement = new window.bootstrap.Modal(
                document.getElementById("staticBackdrop"),
                {
                    keyboard: false,
                }
            );
            modalElement.hide();

            // Validate month selection
            if (!this.month) {
                return window.s_warning("Please select a month.", "error");
            }
            try {
                // Check report info
                const { data } = await axios.get("/thana/check-report-info", {
                    params: { month: this.month },
                });
                console.log("from thana mainlayout", data);

                if (data.data) {
                    if (this.user_id) {
                        // Navigate to report upload route
                        return this.$router.push({
                            name: "ThanaReportUploadMonthly",
                            params: {
                                month: this.month,
                                user_id: this.user_id,
                            },
                        });
                    } else {
                        return window.s_warning(
                            "User ID is missing. Please ensure it is provided.",
                            "error"
                        );
                    }
                }

                // Show error for insufficient permissions
                const errMessage =
                    "আপনার রিপোর্ট পূরণ করার অনুমতি নেই। রিপোর্ট পূরণ করার অনুমতির জন্য আপনার ঊর্ধ্বতন দায়িত্বশীলের সাথে যোগাযোগ করুন।";
                window.s_warning(errMessage, "error");
            } catch (error) {
                // Handle unexpected errors
                console.error(
                    "An error occurred while fetching report information:",
                    error
                );
                window.s_warning(
                    "An unexpected error occurred. Please try again.",
                    "error"
                );
            }
        },
        go_to_notification(thana_id = 0) {
            if (thana_id != 0) {
                this.$router.push({
                    name: "Notification",
                    params: { thana_id: thana_id },
                });
            }
        },
    },
    computed: {
        ...mapWritableState(data_store, [
            "month",
            "thana_active_report_month_info",
            "is_parent",
        ]),

        ...mapWritableState(notification_store, [
            "all_notifications",
            "number_of_notifications",
        ]),
        ...mapWritableState(sidebar_dropdown_store, ["active_dropdown"]),
    },
};
</script>

<style>

#notification_modal .modal-header{
    background-color: var(--color3);
    color: white;
    font-family: system-ui;
    font-weight: 600;
}

#notification_modal .modal-body{
    overflow-x: auto;
    max-height: 400px;
}

@media screen and (max-width: 768px) {
    .report_app_right .report_app_right_top .middle{
        flex: 1;
    }
    .report_app_right .report_app_right_top .middle .city_name{
        display: none;
    }
    
}

</style>
