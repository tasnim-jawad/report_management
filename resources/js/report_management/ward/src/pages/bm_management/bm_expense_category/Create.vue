<template>
    <div class="card">
        <div class="card-header">
            Create Bm Expense Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_expense_category">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input">
                        <input type="text" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return {
            fields1:[
                {
                    label:"Title",
                    name:"title",
                },
                {
                    label:"Description",
                    name:"description",
                },
            ],
        }
    },
    methods:{
        create_expense_category:function(){
            event.preventDefault();
            let e = event;
            let formData = new FormData(event.target);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            axios.post('/bm-expense-category/store',formData)
                .then(function (response) {
                    window.toaster('New BM Expence Category Created successfuly', 'success');
                    e.target.reset();
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },

    }
}
</script>

<style>

</style>
