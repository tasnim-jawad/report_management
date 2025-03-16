<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Program Details
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramScheduleAllProgram'}" class="text-dark">প্রোগ্রাম তালিকা</router-link>
               
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Program Schedule Title</td>
                            <td>{{program_schedule_info?.title}}</td>
                        </tr>
                        <tr>
                            <td>Ptogram title</td>
                            <td>{{program_schedule_info?.program?.title}}</td>
                        </tr>
                        <tr>
                            <td>Is completed</td>
                            <td>{{program_schedule_info?.is_completed == 1 ? 'yes':'no'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn btn-danger btn-sm">
                <a @click="delete_program_schedule(program_schedule_info.id)" class="text-dark btn btn-danger btn-sm">Delete</a>

                <form :id="'delete_program_schedule_form_'+program_schedule_info.id" >
                    <input type="text" name="id" :value="program_schedule_info.id" class="d-none">
                </form>
            </div>
            <!-- <router-link :to="{name:'ProgramScheduleAllProgram'}" class="btn btn-danger btn-sm">প্রোগ্রাম শিডিউলটি ডিলিট করুন</router-link> -->
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['program_id'],
    data:function(){
        return {
            program_schedule_info:[],
        }
    },
    created:function(){
        this.show_program_schedule();
    },
    methods:{
        show_program_schedule :async function(){
            try{
                await axios.get(`/program-schedule/show/${this.program_id}`)
                .then(response => {
                    if(response.data.status == "success" ){
                        this.program_schedule_info = response.data.data
                    }
                })
            }catch(e){
                console.log("error from program detail page" , e);
                
            }
            
        },
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
