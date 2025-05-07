<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Entry Info
            <div class="d-flex gap-2">
                <div class="btn btn-warning btn-sm">
                    <!-- <router-link :to="{name:'CreateUser'}" class="text-dark">Edit</router-link> -->
                    <router-link :to="{name:'BmExpenseEdit',params: { expense_id: expense_info.id }}"  class="text-dark">Edit</router-link>
                </div>
                <div class="btn btn-info btn-sm">
                    <router-link :to="{name:'BmExpenseAll'}" class="text-dark">ব্যয়ের বিবরণ</router-link>
                </div>
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
                            <td>{{expense_info?.thana_bm_expense_category?.title}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{expense_info?.amount}}</td>
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
    props:['expense_id'],
    data:function(){
        return {
            expense_info:[],
        }
    },
    created:function(){
        this.show_expense();
    },
    methods:{
        show_expense : function(){
            axios.get(`/thana-bm-expense/show/${this.expense_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.expense_info = responce?.data?.data
                        console.log('expense---',this.expense_info );
                        console.log('expense---',this.expense_info.id );
                    }

                })
        }
    }
}
</script>

<style>

</style>
