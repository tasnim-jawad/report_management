<template>
    <div class="card mb-3">
        <div class="card-header">
           ওয়ার্ডের মাসিক রিপোর্ট
        </div>
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="" method="GET">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month">
                <button class="btn btn-success ms-5" type="button" @click="get_monthly_report">দেখুন</button>
            </form>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            মাসিক ইউনিট রিপোর্ট (জমা দেওয়া ইউনিটের টোটাল )
        </div>
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="" method="GET" >
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month" @change="report_status">
                <button class="btn btn-success ms-5" type="button" @click.prevent="total_unit_report" v-if="approved_unit.length">দেখুন</button>
            </form>
            <p class="text-danger mt-2" v-if="!approved_unit.length">সিলেক্ট করা মাসে কোনো রিপোর্ট জমা হয়নি</p>
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
            user: [],
            approved_unit:[],
        }
    },
    created:function(){
        this.user_info()
        this.report_status()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    methods:{
        get_monthly_report: function(){
            if(this.month != null){
                window.open(`/ward/report?user_id=${this.user?.user?.id}&month=${this.month}`)
            }
        },
        total_unit_report: function(){
            if(this.month != null){
                window.open(`/ward/unit/total-unit-report?user_id=${this.user?.user?.id}&month=${this.month}`)
            }
        },
        user_info:function(){
            axios.get("/user/ward-user-info")
                .then(responce =>{
                    this.user = responce.data
                })
        },
        report_status:async function(){
            let response = await axios.get('/ward/unit/report-status', {
                            params: {
                                month: this.month
                            }
                        })
            if(response.data.status == 'success'){
                this.approved_unit = null,
                this.approved_unit = response.data.approved_unit ?? [];

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
        }
    }
}
</script>

<style>

</style>
