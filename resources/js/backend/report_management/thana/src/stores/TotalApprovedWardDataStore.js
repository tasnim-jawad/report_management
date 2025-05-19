import { defineStore } from "pinia";

export const store = defineStore(`total_approved_ward_data_store`, {
    state: () => ({
        loading: true,
        start_month: null,
        end_month:null,
        report_header: {},
        report_sum_data: {},
        previous_present: {},

        income_report: {},
        expense_report: {},

        total_income: null,
        total_expense: null,

        total_previous: null,
        total_current_income: null,
        in_total: null,
    }),

    actions: {
        total_approved_ward_report_data:async function (month , user_id) {
            let res = await axios.get('/thana/ward/total-approved-ward-report-data', {
                params: {
                    month: month,
                    user_id: user_id,
                },
            });

            console.log("res",res);
            
            if (res.data.status == "success") {
                console.log("res report_sum_data", res.data.data);
            }

            
        },
    }


})
