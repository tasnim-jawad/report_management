<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Entry Info
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{entry_info?.thana_bm_income_category?.title}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{entry_info?.amount}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['entry_id'],
    data:function(){
        return {
            entry_info:[],
        }
    },
    created:function(){
        this.show_entry();
    },
    methods:{
        show_entry : function(){
            axios.get(`/thana-bm-income/show/${this.entry_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.entry_info = responce.data?.data
                    }

                })
        }
    }
}
</script>

<style>

</style>
