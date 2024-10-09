<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Expense Category
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
                            <td>{{category_info?.title}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{category_info?.description}}</td>
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
    props:['expense_category_id'],
    data:function(){
        return {
            category_info:[],
        }
    },
    created:function(){
        this.show_category();
    },
    methods:{
        show_category : function(){
            // console.log(this.expense_category_id);
            axios.get(`/ward-bm-expense-category/show/${this.expense_category_id}`)
                .then(response => {
                    // console.log(response);
                    if(response.data.status == 'success'){
                        this.category_info = response?.data?.data
                        // console.log(this.category_info);
                    }
                })
        }
    }
}
</script>

<style>

</style>
