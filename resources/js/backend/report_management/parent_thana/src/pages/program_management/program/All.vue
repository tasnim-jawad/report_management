<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            প্রোগ্রাম তালিকা
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramCreate'}" class="text-dark">নতুন প্রোগ্রাম তৈরি করুন</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Time</th>
                            <th>Desscription</th>
                            <th>Guest</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(program,index) in all_program" :key="index">
                            <td>{{program.title}}</td>
                            <td>{{program.date}}</td>
                            <td>{{program.location}}</td>
                            <td>{{program.time}}</td>
                            <td>{{program.description}}</td>
                            <td>{{program.guest}}</td>
                            <!-- <td>{{program.id}}</td> -->
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramDetails',params: { program_id: program.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramEdit',params: { program_id: program.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_program(program.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_program_form_'+program.id" >
                                            <input type="text" name="id" :value="program.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
                            <!-- <td>
                                <div class="action">
                                    <div class="d-flex justify-center">
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramScheduleCreate',params: { program_id: program.id }}"  class="text-dark btn btn-primary btn-sm me-2">schedule create</router-link>
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramScheduleDetails',params: { program_id: program.id }}"  class="text-dark btn btn-primary btn-sm me-2">schedule show</router-link>
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramScheduleEdit',params: { program_id: program.id }}"  class="text-dark btn btn-primary btn-sm me-2">schedule show</router-link>
                                    </div>
                                </div>
                            </td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as program_store } from "../../../stores/ProgramStore" 
import { store as data_store } from "../../../stores/ReportStore" 
import { mapActions, mapWritableState } from 'pinia';
export default {
    data() {
        return {
            
        }
    },

    created:function(){
        this.all_org_type_program('thana')
    },
    computed:{
        ...mapWritableState(program_store, [
            'all_program'
        ]),
    },
    methods:{
        ...mapActions(program_store,{
            all_org_type_program:'all_org_type_program',
        }),

        delete_program : function(program_id){
            if (window.confirm("Are you sure you want to delete this program?")) {
                this.submit_delete_form(program_id);
            } else {
                window.toaster('Program is safe', 'info');
            }
        },
        submit_delete_form : function(program_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_program_form_'+program_id));
            axios.post("/program/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Program delete successfuly', 'success');
                        this.all_org_type_program('thana');
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
