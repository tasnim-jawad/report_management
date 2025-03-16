<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Entry Info
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmUserEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
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
                            <td>নাম</td>
                            <td>{{entry_info?.user?.full_name}}</td>
                        </tr>
                        <tr>
                            <td>খাত</td>
                            <td>{{entry_info?.bm_category?.title}}</td>
                        </tr>
                        <tr>
                            <td>তারিখ</td>
                            <td>{{entry_info?.month}}</td>
                        </tr>
                        <tr>
                            <td>টাকার পরিমাণ</td>
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
            axios.get(`/bm-user-entry/show/${this.entry_id}`)
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
