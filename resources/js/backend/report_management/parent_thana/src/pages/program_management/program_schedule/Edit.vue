<template>
    <div class="card">
        <div class="card-header">
            Edit Program Schedule
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_program_schedule">
                <input type="text" name="id" class="form-control d-none" :value="program_schedule.id">
                
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="form_label">
                        <label class="" for="">Select program</label>
                    </div>
                    <div class="form_input">
                        <select class="form-control" name="program_id" id="program_id" v-model="program_schedule.program_id" disabled>
                            <option value="">-- select program --</option>
                            <option v-for="(program, i) in all_program" :key="i" :value="program.id"  >{{program.title}}</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control" :value="program_schedule.title">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="">Is completed</label>
                    </div>
                    <div class="form_input">
                        <select class="form-control" name="is_completed" id="is_completed" v-model="program_schedule.is_completed">
                            <option value="">-- select --</option>
                            <option value="1">yes</option>
                            <option value="0">no</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit program Info</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import {store as program_store} from '../../../stores/ProgramStore';
import { mapActions, mapWritableState } from 'pinia';
export default {
    props:['program_id'],
    data:function(){
        return{
            program_schedule:[],
        }
    },
    created:function(){
        this.all_org_type_program('thana');
        this.show_program_schedule();
        
    },
    computed:{
        ...mapWritableState(program_store,{
            all_program:'all_program',
        }),
    },
    methods:{
        ...mapActions(program_store,{
            all_org_type_program:'all_org_type_program'
        }),
        show_program_schedule :async function(){
            await axios.get(`/program-schedule/show/${this.program_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.program_schedule = responce.data.data
                        console.log('this.program_schedule',this.program_schedule.program_id);
                        
                    }
                })
        },
        edit_program_schedule:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            formData.append('program_id', this.program_id)
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            if(window.confirm("Are you sure you want to Edit this program info?")){
                axios.post(`/program-schedule/update`,formData)
                .then((response) => {  // Use arrow function
                        this.$router.push({ 
                            name: 'ProgramScheduleDetails', 
                            params: { program_id: this.program_id } 
                        });
                        window.toaster('Program info updated successfully', 'success');
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            }

        }
    }
}
</script>

<style>

</style>
