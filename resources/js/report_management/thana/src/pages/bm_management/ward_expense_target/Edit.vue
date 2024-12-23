<template>
    <div class="card">
        <div class="card-header">
            Edit Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_unit_expense_target">
                <input type="text" name="id" class="form-control d-none" :value="unit_expense_target_info.id">
                <!-- <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control" :value="unit_expense_target_info.title">
                    </div>
                </div> -->
                <!-- <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Description</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="description" :value="unit_expense_target_info.description" class="form-control">
                    </div>
                </div> -->
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="unit_id">Unit Name</label>
                    </div>
                    <div class="form_input">
                        <select name="unit_id" id="unit_id" class="form-control text-center" v-model="unit_expense_target_info.unit_id">
                            <option value="" > -- select unit --</option>
                            <option v-for="(unit,index) in units" :key="index" :value="unit.id">{{ unit.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="bm_expense_category_id">Category</label>
                    </div>
                    <div class="form_input">
                        <select name="bm_expense_category_id" id="bm_expense_category_id" class="form-control text-center" v-model="unit_expense_target_info.bm_expense_category_id">
                            <option value="" > -- select category--</option>
                            <option v-for="(category,index) in bm_expense_categorys" :key="index" :value="category.id">{{ category.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="amount">Amount</label>
                    </div>
                    <div class="form_input">
                        <input type="number" name="amount" id="amount" class="form-control" :value="unit_expense_target_info.amount">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="start_from">Start from</label>
                    </div>
                    <div class="form_input">
                        <input type="date" name="start_from" id="start_from" class="form-control" :value="unit_expense_target_info.start_from">
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
    props:['unit_expense_target_id'],
    data:function(){
        return{
            unit_expense_target_info:[],
            units: [],
            bm_expense_categorys: [],
        }
    },
    created:function(){
        this.unit_expense_target_show();
        this.all_units();
        this.all_bm_expense_categorys();
    },
    methods:{
        unit_expense_target_show :async function(){
            await axios.get(`/unit-expense-target/show/${this.unit_expense_target_id}`)
                .then(responce => {
                    this.unit_expense_target_info = responce.data.data
                    console.log(" this.unit_expense_target_info ", this.unit_expense_target_info );

                })
        },
        all_units:async function(){
            let response =await axios.get('/org-unit/ward-wise-unit')
            this.units = response.data.data;
        },
        all_bm_expense_categorys:async function(){
            let response =await axios.get('/bm-expense-category')
            this.bm_expense_categorys = response.data.data.length ? [response.data.data[0]] : []; 
            console.log("bm_expense_categorys" , this.bm_expense_categorys);

        },
        edit_unit_expense_target:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            axios.post(`/unit-expense-target/update`,formData)
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
