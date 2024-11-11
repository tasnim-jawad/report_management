<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সকল ইউনিট
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitCreate'}" class="text-dark">নতুন ইউনিট তৈরি করুন </router-link>
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
                        <tr v-for="(unit,index) in units" :key="index">
                            <td>{{unit.title}}</td>
                            <td>{{unit.description}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'UnitDetails',params: { unit_id: unit.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'UnitEdit',params: { unit_id: unit.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm" v-if="delete_permission">
                                        <a @click="delete_unit(unit.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_unit_form_'+unit.id" >
                                            <input type="text" name="id" :value="unit.id" class="d-none">
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
            units:[],
            delete_permission:false,
        }
    },

    created:function(){
        this.all_unit()
    },
    methods:{
        all_unit : function(){
            axios.get('/ward/unit/all')
                .then(response => {
                    this.units = response.data.data
                })
        },
        delete_unit : function(unit_id){
            if (window.confirm("Are you sure you want to delete this unit?")) {
                this.submit_delete_form(unit_id);
            } else {
                window.toaster('user info is safe', 'info');
            }

        },
        submit_delete_form : function(unit_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_unit_form_'+unit_id));
            axios.post("ward/unit/destroy",formData)
                    .then(response => {
                        window.toaster('Unit delete successfuly', 'success');
                        this.all_unit();
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
