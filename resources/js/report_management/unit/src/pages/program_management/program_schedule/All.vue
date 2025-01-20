<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            প্রোগ্রাম তালিকা
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramScheduleCreate'}" class="text-dark">নতুন প্রোগ্রাম তৈরি করুন</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Is completed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(program_schedule,index) in all_program_schedule" :key="index">
                            <td>{{program_schedule.title}}</td>
                            <td>{{program_schedule.is_completed == 1 ? 'Completed': 'Pending'}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">Schedule
                                        <router-link v-if="program_schedule && program_schedule.id"  :to="{name:'ProgramScheduleDetails',params: { program_schedule_id: program_schedule.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link v-if="program_schedule && program_schedule.id"  :to="{name:'ProgramScheduleEdit',params: { program_schedule_id: program_schedule.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_program(program_schedule.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_program_schedule_form_'+program_schedule.id" >
                                            <input type="text" name="id" :value="program_schedule.id" class="d-none">
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
import { store as program_store } from "../../../stores/ProgramStore" 
import { store as program_schedule_store } from "../../../stores/ProgramScheduleStore" 
import { store as data_store } from "../../../stores/ReportStore" 
import { mapActions, mapWritableState } from 'pinia';
export default {
    data() {
        return {
            
        }
    },

    created:function(){
        this.all_unit_program()
    },
    computed:{
        ...mapWritableState(program_store, [
            'all_program'
        ]),
        ...mapWritableState(program_schedule_store, [
            'all_program_schedule'
        ]),
    },
    methods:{
        ...mapActions(program_store,{
            all_unit_program:'all_unit_program',
        }),
        ...mapActions(program_schedule_store,{
            all_unit_program_schedule:'all_unit_program_schedule',
        }),

        delete_program : function(program_schedule_id){
            if (window.confirm("Are you sure you want to delete this program?")) {
                this.submit_delete_form(program_schedule_id);
            } else {
                window.toaster('Program is safe', 'info');
            }
        },
        submit_delete_form : function(program_schedule_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_program_form_'+program_schedule_id));
            axios.post("/program/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Program delete successfuly', 'success');
                        this.all_unit_program();
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
