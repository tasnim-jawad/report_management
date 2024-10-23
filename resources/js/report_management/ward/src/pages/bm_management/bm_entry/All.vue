<template>
    <div class="card mb-3 ">
        <div class="card-header border-bottom-0">
            মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
        </div>
    </div>
    <div class="card mb-3" v-if="month">
        <div class="card-header">
            <h1 class="fw-semibold">বায়তুলমাল</h1>
        </div>
    </div>
    <div class="card" v-if="month">
        <div class="card-header d-flex justify-content-between align-items-center">
            আয়ের বিবরণ
            <div class="btn btn-info btn-sm" v-if="is_permitted">
                <router-link :to="{name:'BmEntryCreate'}" class="text-dark">Create Entry</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <!-- <th>Name</th> -->
                            <th>Category</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(entry,index) in bm_entry" :key="index">
                            <!-- <td>{{entry.user.full_name}}</td> -->
                            <td>{{entry.ward_bm_income_category.title}}</td>
                            <td>{{ new Date(entry.month).toLocaleString('default', { month: 'long' }) +' ' + new Date(entry.month).getFullYear().toString().slice(-2)}}</td>
                            <td>{{entry.amount}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'BmEntryDetails',params: { entry_id: entry.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2" v-if="is_permitted">
                                        <router-link :to="{name:'BmEntryEdit',params: { entry_id: entry.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm" v-if="is_permitted">
                                        <a @click="delete_entry(entry.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_entry_form_'+entry.id" >
                                            <input type="text" name="id" :value="entry.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="total_income > 0">
                            <td colspan="2" class="text-end">Total</td>
                            <td>{{ total_income }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as data_store} from "../../../stores/ReportStore";
import { mapWritableState } from 'pinia';
export default {
    data() {
        return {
            bm_entry:[],
            total_income:[],
            is_permitted: false,
        }
    },
    created:function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    created: function() {
        if (this.month) {
            this.show_bm_entry();
        }
    },
    methods:{
        show_bm_entry :async function(){
            let response = await  axios.get('/ward-bm-income/single-ward',{
                                params: { month: this.month  }
                            });

            if(response.data.status == "success"){
                this.bm_entry = response.data.data;
                this.total_income = response.data.total_income;
                this.is_permitted = response.data.is_permitted;
            }
        },
        delete_entry : function(entry_id){
            if (window.confirm("Are you sure you want to delete this Entry?")) {
                this.submit_delete_form(entry_id);
            } else {
                window.toaster('Entry is safe', 'info');
            }

        },
        submit_delete_form : function(entry_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_entry_form_'+entry_id));
            axios.post("/ward-bm-income/destroy",formData)
                    .then(response => {
                        window.toaster('Entry delete successfuly', 'success');
                        this.show_bm_entry();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    },
    watch:{
        month:function(){
            this.show_bm_entry()
        }
    }

}
</script>

<style>

</style>
