<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Entry Info
            <!-- <div class="btn btn-info btn-sm">
                <router-link :to="{name:'CreateUser'}" class="text-dark">Edit</router-link>
            </div> -->
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
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
                            <td>{{entry_info.bm_category.title}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{entry_info.amount}}</td>
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
            console.log();
            console.log(this.entry_id);
            axios.get(`/bm-paid/show/${this.entry_id}`)
                .then(responce => {
                    console.log(responce);
                    this.entry_info = responce.data
                    console.log(this.entry_info);
                })
        }
    }
}
</script>

<style>

</style>
