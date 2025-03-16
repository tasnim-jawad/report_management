import axios from "axios";
import { defineStore } from "pinia";

export const use_auth_store = defineStore("auth_store", {
    state: () => ({
        is_auth: 0,
        auth_info: {},
        role: {},
        user_unseen_notification: {},
        unit_active_report_month_info: null,
    }),
    getters: {},
    actions: {
        set_is_auth: function (status) {
            this.is_auth = status;
        },
        log_out: async function () {
            await fetch("/api-logout", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            });
            window.sessionStorage.removeItem("prevurl");
            localStorage.removeItem("token");
            return (location.href = "/login");
        },
        check_is_auth: async function () {
            let that = this;
            // let res = await window.axios.get("/user/check_user");

            try {
                let res = await window.axios.get("/user/check_user");
                if (res.data && res.data.user) {
                    that.auth_info = res.data.user;
                    that.is_auth = 1;

                    let prevurl =
                        sessionStorage.getItem("prevurl") || "#/dashboard";

                    // if(that.auth_info.role == 6){
                    //     console.log('unit');
                    //     window.location.href ='/dashboard/unit' + prevurl;
                    // }else if(that.auth_info.role == 5){
                    //     console.log('ward');
                    //     window.location.href ='/dashboard/ward' + prevurl;
                    // }else if(that.auth_info.role == 2){
                    //     console.log('admin');
                    //     window.location.href ='/dashboard/admin' + prevurl;
                    // }

                    switch (that.auth_info.role) {
                        case 6:
                            console.log("unit");
                            window.location.href = "/dashboard/unit" + prevurl;
                            break;
                        case 5:
                            console.log("ward");
                            window.location.href = "/dashboard/ward" + prevurl;
                            break;
                        case 4:
                            console.log("thana");
                            window.location.href = "/dashboard/thana" + prevurl;
                            break;
                        case 2:
                            console.log("admin");
                            window.location.href = "/dashboard/admin" + prevurl;
                            break;
                        default:
                            console.log("default");
                            window.location.href = prevurl;
                            break;
                    }
                } else {
                    console.error("User data is missing in the response.");
                }
            } catch (error) {
                if (error.response && error.response.status === 401) {
                    location.href = "/logout";
                    // location.href = "/login";
                } else {
                    console.error("An error occurred:", error);
                }
            }
            // if (res.status != 200) {
            //     console.log("dhukeche");
            //     localStorage.removeItem("token");
            //     return (location.href = "/login");
            // }
            // that.auth_info = res.data.user;
            // that.is_auth = 1;

            // that.role = res.data.user.roles[0];

            // console.log(res.data);
            // await window.cookieStore.get('AXRF-TOKEN')
            //     .then(async (cookie) => {
            //         if (!cookie) {
            //             this.log_out();
            //         }
            //         let token = `Bearer ${cookie.value}`;
            //         fetch("/api/v1/user", {
            //             method: "GET",
            //             headers: {
            //                 "Content-Type": "application/json",
            //                 "Authorization": token,
            //                 // 'Content-Type': 'application/x-www-form-urlencoded',
            //             },
            //         }).then(res => res.json())
            //             .then(res => {
            //                 this.set_is_auth(res.auth_status);
            //                 this.auth_info = res.auth_information;
            //             })
            //     })
        },
        get_user_unseen_notification: async function () {
            let response = await axios.get(
                "user-notifications?get_all=1&seen=0"
            );
            this.user_unseen_notification = response.data.data;
        },
    },
});
