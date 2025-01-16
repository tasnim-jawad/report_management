<template>
    <div class="card">
        <div class="card-header">
            Edit Program
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_unit_program">
                <input type="text" name="id" class="form-control d-none" :value="program.id">
                
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Program title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" :value="program.title" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Date</label>
                    </div>
                    <div class="form_input">
                        <input type="date" name="date" :value="program.date" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Location</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="location" :value="program.location" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Time</label>
                    </div>
                    <div class="form_input">
                        <input type="time" name="time" :value="program.time" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Description</label>
                    </div>
                    <div class="form_input">
                        <input type="description" name="description" :value="program.description" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Guest</label>
                    </div>
                    <div class="form_input">
                        <input type="guest" name="guest" :value="program.guest" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit program Info</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['program_id'],
    data:function(){
        return{
            program:[],
        }
    },
    created:function(){
        this.show_unit_program();
    },
    methods:{
        show_unit_program :async function(){
            await axios.get(`/program/show/${this.program_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.program = responce.data.data
                    }
                })
        },
        edit_unit_program:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            formData.append('org_type', 'unit')
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            if(window.confirm("Are you sure you want to Edit this program info?")){
                axios.post(`/program/update`,formData)
                    .then(function (response) {
                        window.toaster('program info Updated successfuly', 'success');
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
