<template>
    <div class="card">
        <div class="card-header">
            Edit Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_category">
                <input type="text" name="id" class="form-control d-none" :value="unit_expense_target_info.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control" :value="unit_expense_target_info.title">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Description</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="description" :value="unit_expense_target_info.description" class="form-control">
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
    props:['unit_expense_target_id'],
    data:function(){
        return{
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
        },
        edit_category:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            axios.post(`/bm-category/update`,formData)
                .then(function (response) {
                    window.toaster('BM Category Updated successfuly', 'success');
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
