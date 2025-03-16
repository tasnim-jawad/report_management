<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Entry Info
            <!-- <div class="btn btn-info btn-sm">
                <router-link :to="{name:'CreateUser'}" class="text-dark">Edit</router-link>
            </div> -->
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
                            <td>{{category_user_info?.bm_category?.title}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{category_user_info?.amount}}</td>
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
    props:['category_user_id'],
    data:function(){
        return {
            category_user_info:[],
        }
    },
    created:function(){
        this.show_category_user();
    },
    methods:{
        show_category_user : function(){
            axios.get(`/bm-category-user/show/${this.category_user_id}`)
                .then(responce => {
                    console.log("category_user---" ,responce);
                    if(responce.data.status == "success"){
                        this.category_user_info = responce.data.data
                        console.log(this.category_user_info);
                    }
                })
        }
    }
}
</script>

<style>

</style>
