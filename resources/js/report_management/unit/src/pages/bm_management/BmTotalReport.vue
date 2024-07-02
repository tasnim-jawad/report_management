<template>
    <div class="card mb-3">
        <div class="card-header border-bottom-0">
            মাস: <input type="month" @change="get_monthly_report" v-model="month" name="month">
        </div>
    </div>
    <div class="card" v-if="month">
        <div class="card-header">
            Bm Total
        </div>
        <div class="card-body">
            <div class="d-flex align-items-start table-responsive">
                <table class="table table-bordered text-start">
                    <thead>
                        <tr class="table-info">
                            <th colspan="3">Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-success">
                            <td class="border">srl#</td>
                            <td class="border">category</td>
                            <td class="border">Amount</td>
                        </tr>
                        <tr  v-for="(income,index) in category_wise_income" :key="index">
                            <td class="border">{{index + 1}}</td>
                            <td class="border">{{income.category}}</td>
                            <td class="border">{{income.amount}}</td>
                        </tr>
                        <tr>
                            <td class="border text-end" colspan="2">Total Income</td>
                            <td class="border">{{total_income}}</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered text-start">
                    <thead>
                        <tr class="table-info">
                            <th colspan="3">Expense</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-danger">
                            <td class="border">srl#</td>
                            <td class="border">category</td>
                            <td class="border">Amount</td>
                        </tr>
                        <tr  v-for="(expense,index) in category_wise_expense" :key="index">
                            <td class="border">{{index + 1}}</td>
                            <td class="border">{{expense.category}}</td>
                            <td class="border">{{expense.amount}}</td>
                        </tr>
                        <!-- <tr>
                            <td class="border">3</td>
                            <td class="border">Ekkalin</td>
                            <td class="border">4000</td>
                        </tr>
                        <tr>
                            <td class="border">4</td>
                            <td class="border">Nirbachoni</td>
                            <td class="border">15000</td>
                        </tr>
                        <tr>
                            <td class="border">5</td>
                            <td class="border">Office</td>
                            <td class="border">4000</td>
                        </tr>
                        <tr>
                            <td class="border">6</td>
                            <td class="border">Dan</td>
                            <td class="border">15000</td>
                        </tr> -->
                        <tr>
                            <td class="border" colspan="3"></td>
                        </tr>
                        <tr class="text-primary">
                            <td class="border text-end text-primary" colspan="2">Total Expense</td>
                            <td class="border ">{{total_expense}}</td>
                        </tr>
                        <tr>
                            <td class="border text-end text-success" colspan="2">Total Income</td>
                            <td class="border">{{total_income}}</td>
                        </tr>
                        <tr>
                            <td class="border text-end text-danger" colspan="2">Due</td>
                            <td class="border">{{total_expense - total_income}}</td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data:function(){
        return {
            month:"",
            category_wise_income:[],
            total_income:"",
            category_wise_expense:[],
            total_expense:"",

        }
    },

    methods:{
        get_monthly_report: function () {
            this.category_wise_income = [];
            this.total_income = "";
            this.category_wise_expense = [];
            this.total_expense = "";

            axios.get(`/bm-paid/bm-total/${this.month}`)
                .then(response => {
                    if(response.data.status == 'success'){
                        this.category_wise_income = response.data.data;
                        this.total_income = response.data.total_income;
                    }
                })
            axios.get(`bm-expense/bm-total-expense/${this.month}`)
                .then(response =>{
                    if(response.data.status == 'success'){
                        this.category_wise_expense = response.data.data;
                        this.total_expense = response.data.total_expense;
                    }else if(response?.data?.err_message){
                        window.toaster( 'there is no data to show' , 'error');
                    }
                })
        }
    },
}
</script>

<style>

</style>
