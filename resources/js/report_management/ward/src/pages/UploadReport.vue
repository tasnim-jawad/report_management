<template>
    <div class="card mb-3">
        <div class="card-body border-bottom-0">
            মাস: <input type="month" v-model="month" name="month">
            <button class="btn btn-success ms-5"
                    type="button"
                    @click="upload_report"
                    :disabled="!month || !user_id"
            >Submit</button>
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
            // month:"",
            user_id:"",
        }
    },
    created:function(){
        this.user_info()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    methods:{
        upload_report: function(){
            console.log(this.month, this.user_id);

            if (this.month && this.user_id) {
                this.$router.push({
                    name: 'WardReportUpload',
                    params: {
                        month: this.month,
                        user_id: this.user_id
                    }
                });
            } else {
                alert("Please select a month and ensure user ID is available");
            }

        },
        user_info:function(){
            axios.get("/user/ward-user-info")
                .then(responce =>{
                    this.user_id = responce?.data?.user?.id;
                })
                .catch(error => {
                    console.error("Error fetching user info:", error);
                });
        },
    }
}
</script>

<style>

</style>
