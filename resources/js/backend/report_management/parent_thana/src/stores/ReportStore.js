import { defineStore } from "pinia";

export const store = defineStore(`custom_store`, {
    state: () => ({
        month: null,
        loading: true,
        thana_active_report_month_info: null,
        thana_user:null,
        thana_user_id: 0,
        thana_id: 0,
        is_parent: false,
    }),
    getters: {
        $init: () => {
            this.set_month(); // Call set_month when the store is initialized
            // this.set_permission_auto();
        }
        // setInterval(this.set_permission_auto, 24 * 60 * 60 * 1000);
    },
    actions: {
        set_month() {
            // const currentDate = new Date();
            // const currentMonth = currentDate.getMonth() + 1;
            // const currentYear = currentDate.getFullYear();

            // this.month = `${currentYear}-${currentMonth}`;
            // console.log(this.month); // Example: "2024-10"

            const currentYear = moment().format("YYYY");
            const currentMonth = moment().format("MM");

            let seted_month = `${currentYear}-${currentMonth}`;
            this.month = seted_month; // Already in "YYYY-MM" format
            console.log("from store",this.month);
            
        },
        user_info:function(){
            axios.get("/user/thana-user-info")
                .then(responce =>{
                    this.user_info = responce.data
                })
        },

        set_ward_report_status: function ({ward_id, report_month, new_status}) {
            console.log("ward_id, report_month, new_status",ward_id, report_month, new_status);
            
            // window.open(`/ward/ward/report-check?ward_id=${ward_id}&month=${report_month}`)
            const is_confirmed = confirm(`Are you sure you want to Change Submission Status to ${new_status}?`);
            if (is_confirmed) {
                let response = axios.post('/thana/ward/change-status', {
                    ward_id: ward_id,
                    month: report_month,
                    new_status: new_status
                });
            }
        },
        check_ward_report_status: async function ({ward_id, report_month}) {
            let response = await axios.post('/thana/ward/report-status-single-ward', {
                ward_id: ward_id,
                month: report_month
            });
            return response.data;
        },

        set_permission_auto: function (permission) {
            const new_permission_set_date = 28;
            const today = new Date();

            if (today.getDate() === new_permission_set_date) {
                console.log("today",today);
                
                this.permission_set();
            }
        },
        permission_set: function () {
            const today = new Date();
            let forward_month = today.getMonth() + 1;
            let year = today.getFullYear();

            if (forward_month === 12) {
                forward_month = 0;  // Wrap around to January (0)
                year += 1;  // Increment the year
            }
            const formatted_month = String(forward_month + 1).padStart(2, '0');
            let next_month = `${year}-${formatted_month}`;
            console.log("next_month",next_month);
            
            axios.post('/thana/set-thana-report-joma-permission', {
                    month: next_month
                })
                .then(response => {
                    console.log('permission', response.data);
                })
                .catch(error => {
                    console.error('API call error:', error);
                });
            
        },

        is_parent_check:async function () {
            let response = await axios.get('/thana/is-parent');
            if (response.data.status == "success") {
                this.is_parent = response.data.is_parent;
            }
            return response.data;
            
        }
        

    }


})
