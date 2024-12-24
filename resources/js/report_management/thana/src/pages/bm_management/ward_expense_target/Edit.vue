<template>
    <div class="card">
        <div class="card-header">
            Edit Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_ward_expense_target">
                <input type="text" name="id" class="form-control d-none" :value="ward_expense_target_info.id">
                <!-- <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control" :value="ward_expense_target_info.title">
                    </div>
                </div> -->
                <!-- <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Description</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="description" :value="ward_expense_target_info.description" class="form-control">
                    </div>
                </div> -->
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="ward_id">Ward Name</label>
                    </div>
                    <div class="form_input">
                        <select name="ward_id" id="ward_id" class="form-control text-center" v-model="ward_expense_target_info.ward_id">
                            <option value="" > -- select ward --</option>
                            <option v-for="(ward,index) in wards" :key="index" :value="ward.id">{{ ward.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="bm_expense_category_id">Category</label>
                    </div>
                    <div class="form_input">
                        <select name="ward_bm_expense_category_id" id="ward_bm_expense_category_id" class="form-control text-center" v-model="ward_expense_target_info.ward_bm_expense_category_id">
                            <option value="" > -- select category--</option>
                            <option v-for="(category,index) in ward_bm_expense_categorys" :key="index" :value="category.id">{{ category.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="amount">Amount</label>
                    </div>
                    <div class="form_input">
                        <input type="number" name="amount" id="amount" class="form-control" :value="ward_expense_target_info.amount">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="start_from">Start from</label>
                    </div>
                    <div class="form_input">
                        <input type="date" name="start_from" id="start_from" class="form-control" :value="ward_expense_target_info.start_from">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Target</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['ward_expense_target_id'],
    data:function(){
        return{
            ward_expense_target_info:[],
            wards: [],
            ward_bm_expense_categorys: [],
        }
    },
    created:function(){
        this.ward_expense_target_show();
        this.all_wards();
        this.all_ward_bm_expense_categorys();
    },
    methods:{
        ward_expense_target_show :async function(){
            await axios.get(`/ward-expense-target/show/${this.ward_expense_target_id}`)
                .then(responce => {
                    this.ward_expense_target_info = responce.data.data
                    console.log(" this.ward_expense_target_info ", this.ward_expense_target_info );

                })
        },
        all_wards:async function(){
            let response =await axios.get('/org-ward/thana-wise-ward')
            this.wards = response.data.data;
        },
        all_ward_bm_expense_categorys:async function(){
            let response =await axios.get('/ward-bm-expense-category')
            this.ward_bm_expense_categorys = response.data.data.length ? [response.data.data[0]] : [];
            console.log("ward_bm_expense_categorys" , this.ward_bm_expense_categorys);

        },
        edit_ward_expense_target:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            axios.post(`/ward-expense-target/update`,formData)
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
