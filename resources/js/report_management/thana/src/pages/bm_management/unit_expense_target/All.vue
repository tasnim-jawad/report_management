<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            আয়ের সকল খাত সমূহ
            <div class="unit_select">
                <label for="unit_id">Unit:</label>
                <select name="unit_id" id="unit_id" class="text-center" v-model="searched_unit_id">
                    <option value="" > -- select unit --</option>
                    <option v-for="(unit,index) in units" :key="index" :value="unit.id">{{ unit.title }}</option>
                </select>
            </div>
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitExpenseTargetCreate'}" class="text-dark">নতুন ধার্য নির্ধারণ করুন </router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th >Unit Name</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Start From</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit_expense_target,index) in filtered_expense_targets" :key="index">
                            <td>{{unit_expense_target?.org_unit?.title}}</td>
                            <td>{{unit_expense_target?.bm_expense_category?.title}}</td>
                            <td>{{unit_expense_target?.amount}}</td>
                            <td>{{unit_expense_target?.start_from}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'UnitExpenseTargetDetails',params: { unit_expense_target_id: unit_expense_target.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'UnitExpenseTargetEdit',params: { unit_expense_target_id: unit_expense_target.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_category(unit_expense_target.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_unit_expense_target_form_'+unit_expense_target.id" >
                                            <input type="text" name="id" :value="unit_expense_target.id" class="d-none">
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
            unit_expense_targets:[],
            filtered_expense_targets: [],
            units: [],
            searched_unit_id: "",
        }
    },

    created:function(){
        this.show_unit_expense_target();
        this.all_units();
    },
    watch:{
        searched_unit_id:function(){
            console.log("searched_unit_id",this.searched_unit_id);
            this.expense_targets(this.searched_unit_id)
        }
    },
    methods:{
        show_unit_expense_target :async function(){
            await axios.get('/unit-expense-target/ward-wise')
                .then(response => {
                    this.unit_expense_targets = response.data.data;
                    this.filtered_expense_targets = this.unit_expense_targets;
                    console.log("this.filtered_expense_targets",this.filtered_expense_targets);

                })
        },
        delete_category : function(category_id){
            if (window.confirm("Are you sure you want to delete this Target?")) {
                this.submit_delete_form(category_id);
            } else {
                window.toaster('user info is safe', 'info');
            }

        },
        submit_delete_form : function(category_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_category_form_'+category_id));
            axios.post("/bm-category/destroy",formData)
                    .then(response => {
                        console.log(response);
                        window.toaster('category delete successfuly', 'success');
                        this.show_bm_category();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        },
        all_units:async function(){
            let response =await axios.get('/org-unit/ward-wise-unit')
            this.units = response.data.data;
        },
        expense_targets:async function(unit_id){
            console.log("unit_id",unit_id);
            if (!unit_id) {
                this.filtered_expense_targets = this.unit_expense_targets;
                return;
            }
            // let targets = unit_expense_targets.for
            const expense_targets = Array.isArray(this.unit_expense_targets) ? this.unit_expense_targets : Object.values(this.unit_expense_targets);
            let filtered_target_unit_wise = expense_targets.filter(expense_target =>{
                return expense_target.org_unit.id === unit_id
            });

            this.filtered_expense_targets = filtered_target_unit_wise;

            console.log("filtered ",this.filtered_expense_targets);

        },
    }

}
</script>

<style>

</style>
