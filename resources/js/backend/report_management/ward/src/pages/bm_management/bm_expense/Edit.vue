<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            ব্যয় এডিট করুন
            <div class="btn btn-info btn-sm">
                    <router-link :to="{name:'BmExpenseAll'}" class="text-dark">ব্যয়ের বিবরণ</router-link>
                </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_expense">
                <input type="text" name="id" class="form-control d-none" :value="expense_info.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <select type="text" name="ward_bm_expense_category_id" class="form-control text-center">
                            <option value="">-- select category --</option>
                            <option v-for="(bm_expense_category, i) in expense_category.data" :key="i" :value="bm_expense_category['id']"
                            :selected="bm_expense_category['id'] === expense_info.ward_bm_expense_category_id">{{bm_expense_category["title"]}}</option>

                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Amount</label>
                    </div>
                    <div class="form_input">
                        <input type="number" name="amount" :value="expense_info.amount" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Expense</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['expense_id'],
    data:function(){
        return{
            expense_info:[],
            expense_category:[],
        }
    },
    created:function(){
        this.show_expense();
        this.bm_category_list();
    },
    methods:{
        bm_category_list:function(){
            axios.get('/ward-bm-expense-category/all')
                .then(responce => {
                    this.expense_category = responce?.data?.data
                    console.log('expense_category',this.expense_category);
                })
        },
        show_expense: function(){
            axios.get(`/ward-bm-expense/show/${this.expense_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.expense_info = responce?.data?.data
                    }
                })
        },
        edit_expense:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            for (const entry of formData.entries()) {
                console.log(entry);
            }
            axios.post(`/ward-bm-expense/update`,formData)
                .then(function (response) {
                    window.toaster('BM Expense Updated successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });

        }
    }
}
</script>

<style>

</style>
