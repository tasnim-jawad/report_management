<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            নতুন ধার্য নির্ধারণ করুন
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitExpenseTargetAll'}" class="text-dark">সকল ধার্য দেখুন</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_category">

                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="unit_id">Unit Name</label>
                    </div>
                    <div class="form_input">
                        <select name="unit_id" id="unit_id" class="form-control text-center">
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
                        <select name="bm_expense_category_id" id="bm_expense_category_id" class="form-control text-center">
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
                        <input type="number" name="amount" id="amount" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="start_from">Start from</label>
                    </div>
                    <div class="form_input">
                        <input type="date" name="start_from" id="start_from" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">ধার্য নির্ধারণ করুন</button>
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
            units: [],
            bm_expense_categorys: [],
        }
    },
    created:function () {
        this.all_units()
        this.all_bm_expense_categorys()
    },
    methods:{
        create_category:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            let self = this;
            axios.post('/unit-expense-target/store',formData)
                .then(function (response) {
                    console.log(response.statusText);
                    window.toaster('New BM expense target Created successfuly', 'success');
                    self.$router.push({ name: 'UnitExpenseTargetAll' });
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },
        all_units:async function(){
            let response =await axios.get('/org-unit/ward-wise-unit')
            this.units = response.data.data;
        },
        all_bm_expense_categorys:async function(){
            let response =await axios.get('/bm-expense-category')
            this.bm_expense_categorys = response.data.data;
            console.log("bm_expense_categorys" , this.bm_expense_categorys);

        }

    }
}
</script>

<style>

</style>
