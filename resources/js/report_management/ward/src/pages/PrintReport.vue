<template>
    <div class="card mb-3">
        <div class="card-body border-bottom-0">
            <form ref="report_form" action="/unit/report" method="GET">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month">
                <button class="btn btn-success ms-5" type="button" @click="get_monthly_report">Submit</button>
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
                this.$refs.report_form.submit();
                window.open(`http://127.0.0.1:8000/unit/report?user_id=${this.user?.user?.id}&month=${this.month}`)
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
