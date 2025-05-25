<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সকল ওয়ার্ড
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'WardCreate'}" class="text-dark">নতুন ওয়ার্ড তৈরি করুন </router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ward,index) in wards" :key="index">
                            <td>{{ward.title}}</td>
                            <td>{{ward.description}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'WardDetails',params: { ward_id: ward.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'WardEdit',params: { ward_id: ward.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm" v-if="!ward.is_thana_parent && delete_permission">
                                        <a @click="delete_ward(ward.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_ward_form_'+ward.id" >
                                            <input type="text" name="id" :value="ward.id" class="d-none">
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
            wards:[],
            delete_permission:true,
        }
    },

    created:function(){
        this.all_ward()
    },
    methods:{
        all_ward : function(){
            axios.get('/thana/ward/all')
                .then(response => {
                    this.wards = response.data.data
                })
        },
        delete_ward : function(ward_id){
            if (window.confirm("Are you sure you want to delete this ward?")) {
                this.submit_delete_form(ward_id);
            } else {
                window.toaster('ward is safe', 'info');
            }

        },
        submit_delete_form : function(ward_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_ward_form_'+ward_id));
            axios.post("thana/ward/destroy",formData)
                    .then(response => {
                        window.toaster('Ward delete successfuly', 'success');
                        this.all_ward();
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
