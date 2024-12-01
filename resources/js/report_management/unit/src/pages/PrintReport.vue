<template>
    <div class="card mb-3 ">
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="/unit/report" method="GET">
                <input type="text" class="d-none" name="user_id" :value="this.user?.user?.id">
                <label for="" class="form-label">মাস:</label>
                <input type="month" v-model="month" name="month" class="form-control">
                <a href="#" class="btn btn-success mt-2" @click="get_monthly_report">Print preview</a>
            </form>
        </div>
    </div>
    <div class="card mb-3 ">
        <div class="card-header">
            print month to month
        </div>
        <div class="card-body border-bottom-0">
            <form ref="report_form_sum">
                <label for="" class="form-label">শুরুর মাস:</label>
                <input type="month" v-model="start_month" name="start_month" class="form-control">
                <label for="" class="form-label">শেষের মাস:</label>
                <input type="month" v-model="end_month" name="end_month" class="form-control">

                <button class="btn btn-success mt-2 me-2" type="button" @click.prevent="report_sum('any')">Month to
                    Month</button>
                <button class="btn btn-warning mt-2 me-2" type="button" @click.prevent="report_sum('half_yearly')">Half
                    Yearly</button>
                <button class="btn btn-info mt-2 me-2" type="button"
                    @click.prevent="report_sum('annual')">Annual</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios, { Axios } from 'axios';
import { store as data_store } from "../stores/ReportStore";
import { mapState, mapWritableState } from 'pinia';

export default {
    data: function () {
        return {
            user_id: "",
            start_month: null,
            end_month: null,
            user_id: "",
            user: [],
        }
    },
    created: function () {
        this.user_info()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    methods: {
        get_monthly_report: async function (event) {
            event?.preventDefault();

            if (!this.month) {
                return window.s_warning("Please select a month.", 'error');
            }

            try {
                const { data } = await axios.get('/unit/check-report-info', {
                    params: { month: this.month }
                });

                if (data.data) {
                    const url = `/unit/unit-report-monthly?user_id=${this.user?.user?.id}&month=${this.month}&print=true`;
                    window.open(url);
                } else {
                    const errMessage = 'আপনার রিপোর্ট দেখার অনুমতি নেই। রিপোর্ট দেখার অনুমতির জন্য আপনার ঊর্ধ্বতন দায়িত্বশীলের সাথে যোগাযোগ করুন।';
                    window.s_warning(errMessage, 'error');
                }
            } catch (error) {
                console.error("An error occurred while fetching report information:", error);
                window.s_warning("An unexpected error occurred. Please try again.", 'error');
            }
        },


        report_sum: async function (sum_type) {
            const current_year = new Date().getFullYear();
            if (sum_type == 'half_yearly') {
                this.start_month = `${current_year}-01`; // January of the current year
                this.end_month = `${current_year}-06`;
            } else if (sum_type == 'annual') {
                this.start_month = `${current_year}-01`; // January of the current year
                this.end_month = `${current_year}-12`;
            }
            let response = await axios.get('/unit/check-report-info-in-range', {
                params: {
                    start_month: this.start_month,
                    end_month: this.end_month
                }
            });
            // console.log(response);
            if(response.data.data){
                window.open(`/unit/report/unit-report-sum?user_id=${this.user?.user?.id}&start_month=${this.start_month}&end_month=${this.end_month}&print=true`)
            }else{
                const errMessage = 'আপনার এই মাস গুলিতে কোনো প্রতিবেদন অনুমোদন হয়নি।';
                window.s_warning(errMessage, 'error');
            }
        },
        user_info: function () {
            axios.get("/user/user_info")
                .then(responce => {
                    this.user = responce.data
                })
        },
    }
}
</script>

<style></style>
