<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Program Details
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramAll'}" class="text-dark">প্রোগ্রাম তালিকা</router-link>
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
                            <td>Title</td>
                            <td>{{program_info?.title}}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>{{program_info?.date}}</td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>{{program_info?.location}}</td>
                        </tr>
                        <tr>
                            <td>Time</td>
                            <td>{{program_info?.time}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{program_info?.description}}</td>
                        </tr>
                        <tr>
                            <td>Guest</td>
                            <td>{{program_info?.guest}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['program_id'],
    data:function(){
        return {
            program_info:[],
        }
    },
    created:function(){
        this.show_unit_program();
    },
    methods:{
        show_unit_program :async function(){
            try{
                await axios.get(`/program/show/${this.program_id}`)
                .then(response => {
                    if(response.data.status == "success" ){
                        this.program_info = response.data.data
                    }
                })
            }catch(e){
                console.log("error from program detail page" , e);
                
            }
            
        }
    }
}
</script>

<style>

</style>
