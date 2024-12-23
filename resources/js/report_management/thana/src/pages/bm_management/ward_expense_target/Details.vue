<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            ধার্য বিস্তারিত
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitExpenseTargetAll'}" class="text-dark">সকল ধার্য দেখুন</router-link>
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
                            <td>Unit Name</td>
                            <td>{{unit_expense_target_info?.org_unit?.title}}</td>
                        </tr>
                        <tr>
                            <td>Categpry</td>
                            <td>{{unit_expense_target_info?.bm_expense_category?.title}}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>{{unit_expense_target_info?.amount}}</td>
                        </tr>
                        <tr>
                            <td>Start From</td>
                            <td>{{unit_expense_target_info?.start_from}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn btn-warning btn-sm me-2">
                <router-link :to="{name:'UnitExpenseTargetEdit',params: { unit_expense_target_id: unit_expense_target_info.id }}"  class="text-dark">Edit</router-link>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['unit_expense_target_id'],
    data:function(){
        return {
            unit_expense_target_info:[],
        }
    },
    created:function(){
        this.show_category();
    },
    methods:{
        show_category : function(){
            axios.get(`/unit-expense-target/show/${this.unit_expense_target_id}`)
                .then(responce => {
                    this.unit_expense_target_info = responce.data.data

                })
        }
    }
}
</script>

<style>

</style>
