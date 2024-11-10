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
            <form ref="report_form" action="" method="GET">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month">
                <button class="btn btn-success ms-5" type="button" @click.prevent="total_unit_report">দেখুন</button>
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
    }
}
</script>

<style>

</style>
