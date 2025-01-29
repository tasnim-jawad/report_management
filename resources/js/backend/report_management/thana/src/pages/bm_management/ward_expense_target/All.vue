<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            আয়ের সকল খাত সমূহের ধার্য
            <div class="ward_select">
                <label for="ward_id">Ward:</label>
                <select name="ward_id" id="ward_id" class="text-center" v-model="searched_ward_id">
                    <option value="" > -- select ward --</option>
                    <option v-for="(ward,index) in wards" :key="index" :value="ward.id">{{ ward.title }}</option>
                </select>
            </div>
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'WardExpenseTargetCreate'}" class="text-dark">নতুন ধার্য নির্ধারণ করুন </router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th >Ward Name</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Start From</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ward_expense_target,index) in filtered_expense_targets" :key="index">
                            <td>{{ward_expense_target?.org_ward?.title}}</td>
                            <td>{{ward_expense_target?.ward_bm_expense_category?.title}}</td>
                            <td>{{ward_expense_target?.amount}}</td>
                            <td>{{ward_expense_target?.start_from}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'WardExpenseTargetDetails',params: { ward_expense_target_id: ward_expense_target.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'WardExpenseTargetEdit',params: { ward_expense_target_id: ward_expense_target.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_category(ward_expense_target.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_ward_expense_target_form_'+ward_expense_target.id" >
                                            <input type="text" name="id" :value="ward_expense_target.id" class="d-none">
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
            ward_expense_targets:[],
            filtered_expense_targets: [],
            wards: [],
            searched_ward_id: "",
        }
    },

    created:function(){
        this.show_ward_expense_target();
        this.all_wards();
    },
    watch:{
        searched_ward_id:function(){
            console.log("searched_ward_id",this.searched_ward_id);
            this.expense_targets(this.searched_ward_id)
        }
    },
    methods:{
        show_ward_expense_target :async function(){
            await axios.get('/ward-expense-target/thana-wise')
                .then(response => {
                    this.ward_expense_targets = response.data.data;
                    this.filtered_expense_targets = this.ward_expense_targets;
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
        all_wards:async function(){
            let response =await axios.get('/org-ward/thana-wise-ward')
            this.wards = response.data.data;
        },
        expense_targets:async function(ward_id){
            console.log("ward_id",ward_id);
            if (!ward_id) {
                this.filtered_expense_targets = this.ward_expense_targets;
                return;
            }
            // let targets = ward_expense_targets.for
            const expense_targets = Array.isArray(this.ward_expense_targets) ? this.ward_expense_targets : Object.values(this.ward_expense_targets);
            let filtered_target_ward_wise = expense_targets.filter(expense_target =>{
                return expense_target.org_ward.id === ward_id
            });

            this.filtered_expense_targets = filtered_target_ward_wise;

            console.log("filtered ",this.filtered_expense_targets);

        },
    }

}
</script>

<style>

</style>
