<template>
    <div class="card mb-3 ">
        <div class="card-header border-bottom-0">
            মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Show All Bm Expense
            <div class="btn btn-info btn-sm" v-if="is_permitted">
                <router-link :to="{name:'BmExpenseCreate'}" class="text-dark">Create Expense</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(expense,index) in bm_expense" :key="index">
                            <td>{{expense?.ward_bm_expense_category?.title}}</td>
                            <td>{{expense?.amount}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'BmExpenseDetails',params: { expense_id: expense.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2" v-if="is_permitted">
                                        <router-link :to="{name:'BmExpenseEdit',params: { expense_id: expense.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm" v-if="is_permitted">
                                        <a @click="delete_expense(expense.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_expense_form_'+expense.id" >
                                            <input type="text" name="id" :value="expense.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="total_expense > 0">
                            <td class="text-end">Total</td>
                            <td>{{ total_expense }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as data_store} from "../../../stores/ReportStore";
import { mapWritableState } from 'pinia';
export default {
    data() {
        return {
            bm_expense:[],
            total_expense:[],
            is_permitted: false,
        }
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    created: function() {
        if (this.month) {
            this.show_bm_expense();
        }
    },
    methods:{
        show_bm_expense :async function(){
            let response = await axios.get('/ward-bm-expense/single-ward',{
                                params: { month: this.month  }
                            });
            if(response.data.status == "success"){
                console.log("response",response.data);
                this.bm_expense = response.data.data;
                this.total_expense = response.data.total_expense;
                this.is_permitted = response.data.is_permitted;
            }
        },
        delete_expense : function(expense_id){
            if (window.confirm("Are you sure you want to delete this Expense?")) {
                this.submit_delete_form(expense_id);
            } else {
                window.toaster('Entry is safe', 'info');
            }

        },
        submit_delete_form : function(expense_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_expense_form_'+expense_id));
            axios.post("/ward-bm-expense/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Exponse delete successfuly', 'success');
                        this.show_bm_expense();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    },
    watch:{
        month:function(){
            this.show_bm_expense()
        }
    }

}
</script>

<style>

</style>
