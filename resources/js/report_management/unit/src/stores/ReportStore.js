import { defineStore } from "pinia";

export const store = defineStore('custom_store', {
    state: () => ({
        month: null,
        loading: true,
        unit_active_report_month_info: null,
        unit_user:null,
        unit_user_id: 0,
        unit_id: 0,
    }),
    getters: {
        $init: (state) => {
            state.set_month(); // Call set_month when the store is initialized
        }
    },
    actions: {
        set_month() {
            const currentDate = new Date();
            const currentMonth = currentDate.getMonth() + 1;
            const currentYear = currentDate.getFullYear();

            this.month = `${currentYear}-${currentMonth}`;
        },
        auth_user:async function () {
            await axios.get("/user/user_info").then((responce) => {
                this.unit_user = responce.data;
                this.unit_user_id = this.unit_user?.user?.id;
                this.unit_id = this.unit_user?.responsibility?.org_unit?.id;
            });
            
        },

    }
});
