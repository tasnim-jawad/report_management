import { defineStore } from "pinia";

export const store = defineStore(`custom_store`, {
    state: () => ({
        month: null,
        loading: true,
    }),
    getters: {
        $init: () => {
            this.set_month(); // Call set_month when the store is initialized
        }
    },
    actions: {
        set_month() {
            const currentDate = new Date();
            const currentMonth = currentDate.getMonth() + 1;
            const currentYear = currentDate.getFullYear();

            this.month = `${currentYear}-${currentMonth}`;
            // console.log(this.month); // Example: "2024-10"
        },
        user_info:function(){
            axios.get("/user/ward-user-info")
                .then(responce =>{
                    this.user_info = responce.data
                })
        },
        set_unit_report_status: function ({unit_id, report_month, new_status}) {
            console.log("unit_id, report_month, new_status",unit_id, report_month, new_status);
            
            // window.open(`/ward/unit/report-check?unit_id=${unit_id}&month=${report_month}`)
            const is_confirmed = confirm(`Are you sure you want to Change Submission Status to ${new_status}?`);
            if (is_confirmed) {
                let response = axios.post('/ward/unit/change-status', {
                    unit_id: unit_id,
                    month: report_month,
                    new_status: new_status
                });
            }
        },
        check_unit_report_status: async function ({unit_id, report_month}) {
            let response = await axios.post('/ward/unit/report-status-single-unit', {
                unit_id: unit_id,
                month: report_month
            });
            return response.data;
        },

    }


})
