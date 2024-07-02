<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Show All Bm Expense
            <div class="btn btn-info btn-sm">
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
                            <td>{{expense?.bm_expense_category?.title}}</td>
                            <td>{{expense?.amount}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'BmExpenseDetails',params: { expense_id: expense.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'BmExpenseEdit',params: { expense_id: expense.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_expense(expense.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_expense_form_'+expense.id" >
                                            <input type="text" name="id" :value="expense.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
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
    data() {
        return {
            bm_expense:[],
        }
    },

    created:function(){
        this.show_bm_expense()
    },
    methods:{
        show_bm_expense : function(){
            axios.get('/bm-expense/single-unit')
                .then(response => {
                    console.log('bm expense', response);
                    if(response.data.status == 'success'){
                        this.bm_expense = response?.data?.data
                    }
                    // console.log('bm_expense',this.bm_expense);

                })
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
            axios.post("/bm-expense/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Exponse delete successfuly', 'success');
                        this.show_bm_expense();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    }

}
</script>

<style>

</style>
