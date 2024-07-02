<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Show All Bm Expence Category
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmExpenseCategoryCreate'}" class="text-dark">Create Expense Category</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th >Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(category,index) in expense_categories" :key="index">
                            <td>{{category?.title}}</td>
                            <td>{{category?.description}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'BmExpenseCategoryDetails',params: { expense_category_id: category.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'BmExpenseCategoryEdit',params: { expense_category_id: category.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_expense_category(category.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_expense_category_form_'+category.id" >
                                            <input type="text" name="id" :value="category.id" class="d-none">
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
            expense_categories:[],
        }
    },

    created:function(){
        this.show_bm_expense_category()
    },
    methods:{
        show_bm_expense_category : function(){
            axios.get('/bm-expense-category/all')
                .then(response => {
                    console.log(response);
                    if(response.data.status == 'success'){
                        this.expense_categories = response?.data?.data?.data
                        console.log(this.expense_categories);
                    }

                })
        },
        delete_expense_category : function(expense_category_id){
            if (window.confirm("Are you sure you want to delete this expence category?")) {
                this.submit_delete_form(expense_category_id);
            } else {
                window.toaster('expense category info is safe', 'info');
            }

        },
        submit_delete_form : function(expense_category_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_expense_category_form_'+expense_category_id));
            axios.post("/bm-expense-category/destroy",formData)
                    .then(response => {
                        console.log(response);
                        window.toaster('expense category delete successfuly', 'success');
                        this.show_bm_expense_category();
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
