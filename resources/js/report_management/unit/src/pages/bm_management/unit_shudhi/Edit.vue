<template>
    <div class="card">
        <div class="card-header">
            Edit Bm Category User
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_unit_shudhi">
                <input type="text" name="id" class="form-control d-none" :value="shudhi.id">
                
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Name</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="name" :value="shudhi.name" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Mobile</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="mobile" :value="shudhi.mobile" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Target</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="target" :value="shudhi.target" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Shudhi Info</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['shudhi_id'],
    data:function(){
        return{
            shudhi:[],
        }
    },
    created:function(){
        this.show_unit_shudhi();
    },
    methods:{
        show_unit_shudhi :async function(){
            await axios.get(`/unit-shudhi/show/${this.shudhi_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.shudhi = responce.data.data
                    }
                })
        },
        edit_unit_shudhi:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            if(window.confirm("Are you sure you want to Edit this Shudhi info?")){
                axios.post(`/unit-shudhi/update`,formData)
                    .then(function (response) {
                        window.toaster('Shudhi info Updated successfuly', 'success');
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
