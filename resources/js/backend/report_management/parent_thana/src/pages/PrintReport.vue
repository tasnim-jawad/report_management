<template>
    <div class="card mb-3">
        <div class="card-header">
           থানার মাসিক রিপোর্ট
        </div>
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="" method="GET">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month">
                <button class="btn btn-success ms-5" type="button" @click="get_monthly_report">দেখুন</button>
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
    <div class="card mb-3">
        <div class="card-header">
            মাসিক ওয়ার্ড রিপোর্ট (এপ্রুভড ওয়ার্ডের টোটাল ) - টোটাল ওয়ার্ড - {{ total_wards_counts }} টি এবং এপ্রুভড হয়েছে - {{ approved_wards_count }}  টি।
        </div>
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="" method="GET" >
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month" @change="report_status">
                <button class="btn btn-success ms-5" type="button" @click.prevent="total_ward_report" v-if="approved_ward.length">দেখুন</button>
            </form>
            <p style="color: red;" class="mt-2" v-if="!approved_ward.length">সিলেক্ট করা মাসে কোনো রিপোর্ট জমা হয়নি</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { store as data_store} from "../stores/ReportStore";
import { mapState, mapWritableState } from 'pinia';

export default {
    data:function(){
        return {
            user_id:"",
            start_month: null,
            end_month: null,
            user: [],
            approved_ward:[],
            approved_wards_count:'',
            total_wards_counts:'',
        }
    },
    created:function(){
        this.user_info()
        this.report_status()
        this.count_wards()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    watch:{
        month:function(){
            this.count_wards()
            this.report_status()
        }
    },
    methods:{
        formatBangla(number) {
            return number !== null && number !== undefined
                        ? number.toLocaleString("bn-BD")
                        : "";
        },
        get_monthly_report: async function (event) {
            event?.preventDefault();

            if (!this.month) {
                return window.s_warning("Please select a month.", 'error');
            }

            try {
                let response = await axios.get('/parent-thana/check-report-info-in-range', {
                    params: {
                        start_month: this.month,
                        end_month: this.month
                    }
                });
                if(response.data.data){
                    // window.open(`/ward/report/ward-report-sum?user_id=${this.user?.user?.id}&start_month=${this.start_month}&end_month=${this.end_month}&print=true`)

                    return this.$router.push({
                        name: "ThanaSumReport",
                        params: {
                            start_month: this.month,
                            end_month: this.month
                        },
                    });
                }else{
                    const errMessage = 'আপনার এই মাসের প্রতিবেদন অনুমোদন হয়নি।';
                    window.s_warning(errMessage, 'error');
                }
            } catch (error) {
                console.error("An error occurred while fetching report information:", error);
                window.s_warning("An unexpected error occurred. Please try again.", 'error');
            }
        },
        total_ward_report: function(){
            if(this.month != null){
                // window.open(`/ward/unit/total-unit-report?user_id=${this.user?.user?.id}&month=${this.month}`)
                window.open(`/ward/total-approved-ward-report?user_id=${this.user?.user?.id}&month=${this.month}`)
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
            let response = await axios.get('/thana/check-report-info-in-range', {
                params: {
                    start_month: this.start_month,
                    end_month: this.end_month
                }
            });
            if(response.data.data){
                // window.open(`/ward/report/ward-report-sum?user_id=${this.user?.user?.id}&start_month=${this.start_month}&end_month=${this.end_month}&print=true`)

                return this.$router.push({
                    name: "ThanaSumReport",
                    params: {
                        start_month: this.start_month,
                        end_month: this.end_month
                    },
                });
            }else{
                const errMessage = 'আপনার এই মাস গুলিতে কোনো প্রতিবেদন অনুমোদন হয়নি।';
                window.s_warning(errMessage, 'error');
            }
        },
        user_info:function(){
            axios.get("/user/thana-user-info")
                .then(responce =>{
                    this.user = responce.data
                })
        },
        report_status:async function(){
            let response = await axios.get('/thana/ward/report-status', {
                            params: {
                                month: this.month
                            }
                        })
            if(response.data.status == 'success'){
                this.approved_ward = [],
                this.approved_ward = response.data.approved_ward ?? [];
                // console.log("approved_ward", this.approved_ward);
                // console.log("approved_ward month", this.month);
                
                // this.unsubmitted_unit = response.data.unsubmitted_unit
                // this.pending_unit = response.data.pending_unit
                // this.rejected_unit = response.data.rejected_unit
                // this.report_month = response.data.report_month
                // console.log({
                //     '1': this.unsubmitted_unit,
                //     '2': this.pending_unit,
                //     '3': this.rejected_unit,
                //     '4': this.approved_unit,
                // });


            }
        },
        count_wards:async function(){
            if(this.month){
                let response = await axios.get('/thana/count-approved-ward', {
                                params: {
                                    month: this.month
                                }
                            })
                if(response.data.status == 'success'){
                    let approved = response.data.approved_wards;
                    let total = response.data.total_wards;

                    this.approved_wards_count = this.formatBangla(approved)
                    this.total_wards_counts = this.formatBangla(total)
                }
            }
        }
    }
}
</script>

<style>

</style>
