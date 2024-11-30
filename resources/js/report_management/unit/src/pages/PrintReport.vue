<template>
    <div class="card mb-3 ">
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="/unit/report" method="GET">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                <label for="" class="form-label">মাস:</label>
                <input type="month" v-model="month" name="month" class="form-control">
                <button class="btn btn-success mt-2" type="button" @click="get_monthly_report">Print preview</button>
            </form>
        </div>
    </div>
    <div class="card mb-3 ">
        <div class="card-header">
            print month to month
        </div>
        <div class="card-body border-bottom-0">
            <form ref="report_form_sum" >
                <label for="" class="form-label">শুরুর মাস:</label>
                <input type="month" v-model="start_month" name="start_month" class="form-control">
                <label for="" class="form-label">শেষের মাস:</label>
                <input type="month" v-model="end_month" name="end_month" class="form-control">

                <button class="btn btn-success mt-2 me-2" type="button" @click.prevent="report_sum('any')">Month to Month</button>
                <button class="btn btn-warning mt-2 me-2" type="button" @click.prevent="report_sum('half_yearly')">Half Yearly</button>
                <button class="btn btn-info mt-2 me-2" type="button" @click.prevent="report_sum('annual')">Annual</button>
            </form>
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
            start_month:null,
            end_month:null,
            user_id:"",
            user: [],
        }
    },
    created:function(){
        this.user_info()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    methods:{
        get_monthly_report: function(){
            if(this.month != null){
                this.$refs.report_form_sum.submit();
                // window.open(`/unit/report?user_id=${this.user?.user?.id}&month=${this.month}&print=true`)
                window.open(`/unit/unit-report-monthly?user_id=${this.user?.user?.id}&month=${this.month}&print=true`)
            }
        },

        report_sum:function(sum_type){
            const current_year = new Date().getFullYear();
            if(sum_type == 'half_yearly'){
                this.start_month = `${current_year}-01`; // January of the current year
                this.end_month = `${current_year}-06`;
            }else if(sum_type == 'annual'){
                this.start_month = `${current_year}-01`; // January of the current year
                this.end_month = `${current_year}-12`;
            }

            if(this.start_month != null && this.end_month != null){
                window.open(`/unit/report/unit-report-sum?user_id=${this.user?.user?.id}&start_month=${this.start_month}&end_month=${this.end_month}&print=true`)
            }
        },
        user_info:function(){
            axios.get("/user/user_info")
                .then(responce =>{
                    this.user = responce.data
                })
        },
    }
}
</script>

<style>

</style>
