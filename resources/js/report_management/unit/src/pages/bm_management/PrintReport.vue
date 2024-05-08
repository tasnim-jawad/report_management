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
export default {
    data:function(){
        return {
            month:"",
            user_id:"",
            user: [],
        }
    },
    created:function(){
        this.user_info()
    },
    methods:{
        get_monthly_report: function(){
            if(this.month != null){
                this.$refs.report_form.submit();
                // window.location.href = `http://127.0.0.1:8000/unit/report`;
                console.log('month selected');
                window.open(`http://127.0.0.1:8000/unit/report`,'_blank')

            }

        },
        user_info:function(){
            axios.get("/user/user_info")
                .then(responce =>{
                    console.log(responce);
                    this.user = responce.data
                    console.log(this.user);
                })
        },
    }
}
</script>

<style>

</style>
