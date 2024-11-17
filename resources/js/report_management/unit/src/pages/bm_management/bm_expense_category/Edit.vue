<template>
    <div class="card">
        <div class="card-header">
        Update Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_category">
                <input type="text" name="id" class="form-control d-none" :value="category_info.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control" :value="category_info.title">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Description</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="description" :value="category_info.description" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="parent_id">প্রধান খাত</label>
                    </div>
                    <div class="form_input">
                        <select id="parent_id" class="form-select text-center" name="parent_id" aria-label="Default select example" v-model="category_info.parent_id">
                            <option value=""> -- (optional) -- </option>
                            <option v-for="(category, index) in categories" :key="index" :value="category.id" >{{category.title}}</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Category</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['expense_category_id'],
    data:function(){
        return{
            category_info:[],
            categories:[],

        }
    },
    created:function(){
        this.show_category();
        this.all_categories();
    },
    methods:{
        show_category : function(){
            axios.get(`/bm-expense-category/show/${this.expense_category_id}`)
                .then(responce => {
                    if(responce.data.status == 'success'){
                        this.category_info = responce?.data?.data
                    }
                })
        },
        edit_category:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            if (window.confirm("Are you sure you want to Edit this expence category?")) {
                axios.post(`/bm-expense-category/update`,formData)
                    .then(function (response) {
                        window.toaster('BM Expense Category Updated successfuly', 'success');
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            } else {
                window.toaster('expense category info is safe', 'info');
            }

        },
        all_categories:async function() {
            let response = await axios.get('/bm-expense-category/parent-category')
            if (response) {
                this.categories = response.data

            }
        }
    }
}
</script>

<style>

</style>
