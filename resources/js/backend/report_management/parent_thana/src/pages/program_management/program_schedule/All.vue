<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            প্রোগ্রাম শিডিউল তালিকা
            <!-- <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramScheduleCreate'}" class="text-dark">নতুন প্রোগ্রাম তৈরি করুন</router-link>
            </div> -->
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
                                <div class="action d-flex justify-start">
                                    <div >
                                        <router-link class="btn btn-success btn-sm me-2" v-if="program_schedule && program_schedule.program_id"  :to="{name:'ProgramScheduleDetails',params: { program_id: program_schedule.program_id }}" >show</router-link>
                                    </div>
                                    <div >
                                        <router-link class="btn btn-warning btn-sm me-2" v-if="program_schedule && program_schedule.program_id"  :to="{name:'ProgramScheduleEdit',params: { program_id: program_schedule.program_id }}" >Edit</router-link>
                                    </div>
                                    <div >
                                        <a @click="delete_program_schedule(program_schedule.id)" class="text-dark btn btn-danger btn-sm">Delete</a>

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
        this.all_org_type_program('thana')
        this.all_org_type_program_schedule('thana')
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
            all_org_type_program:'all_org_type_program',
        }),
        ...mapActions(program_schedule_store,{
            all_org_type_program_schedule:'all_org_type_program_schedule',
        }),

        delete_program_schedule : function(program_schedule_id){
            if (window.confirm("Are you sure you want to delete this program schedule?")) {
                this.submit_delete_form(program_schedule_id);
            } else {
                window.toaster('Program is safe', 'info');
            }
        },
        submit_delete_form : function(program_schedule_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_program_schedule_form_'+program_schedule_id));
            axios.post("/program-schedule/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        this.$router.push({ 
                            name: 'ProgramScheduleAllProgram'
                        });
                        window.toaster('Program delete successfuly', 'success');
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
