<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সকল সুধী তালিকা
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitShudhiCreate'}" class="text-dark">নতুন সুধী তৈরি করুন</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Name</th>
                            <th>mobile</th>
                            <th>target</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(shudhi,index) in all_shudhi" :key="index">
                            <td>{{shudhi.name}}</td>
                            <td>{{shudhi.mobile}}</td>
                            <td>{{shudhi.target}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link v-if="shudhi && shudhi.id"  :to="{name:'UnitShudhiDetails',params: { shudhi_id: shudhi.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link v-if="shudhi && shudhi.id"  :to="{name:'UnitShudhiEdit',params: { shudhi_id: shudhi.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_shudhi(shudhi.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_shudhi_form_'+shudhi.id" >
                                            <input type="text" name="id" :value="shudhi.id" class="d-none">
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
import { store as unit_shudhi_store } from "../../../stores/UnitShudhiStore" 
import { store as data_store } from "../../../stores/ReportStore" 
import { mapActions, mapWritableState } from 'pinia';
export default {
    data() {
        return {
            bm_category_user:[],
        }
    },

    created:function(){
        this.all_unit_shudhi()
    },
    computed:{
        ...mapWritableState(unit_shudhi_store, [
            'all_shudhi'
        ]),
    },
    methods:{
        ...mapActions(unit_shudhi_store,{
            all_unit_shudhi:'all_unit_shudhi',
        }),
        delete_shudhi : function(shudhi_id){
            if (window.confirm("Are you sure you want to delete this Shudhi?")) {
                this.submit_delete_form(shudhi_id);
            } else {
                window.toaster('Entry is safe', 'info');
            }
        },
        submit_delete_form : function(shudhi_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_shudhi_form_'+shudhi_id));
            axios.post("/unit-shudhi/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Shudhi delete successfuly', 'success');
                        this.all_unit_shudhi();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    }

}
</script>

<style>

</style>
