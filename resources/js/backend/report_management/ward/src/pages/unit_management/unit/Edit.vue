<template>
    <div class="card">
        <div class="card-header">
            Edit Bm unit
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_unit">
                <input type="text" name="id" class="form-control d-none" :value="unit_info.id">
                <!-- <div class="mb-3">
                        <label for="gender_select" class="form-label">Select gender</label>
                        <select id="gender_select" class="form-select " name="org_gender" aria-label="Default select example" v-model="unit_info.org_gender" >
                            <option value="men" >পুরুষ</option>
                            <option value="women" >মহিলা</option>
                        </select>
                    </div> -->
                    <div class="mb-3">
                        <label for="unit_title" class="form-label">Write Unit Name</label>
                        <input type="text" class="form-control" id="unit_title" name="title" placeholder="write new unit title" v-model="unit_info.title">
                    </div>
                    <div class="mb-3">
                        <label for="unit_description" class="form-label">Write unit description</label>
                        <input id="unit_description" type="text" class="form-control" name="description" placeholder="write new unit description" v-model="unit_info.description">
                    </div>
                    <div class="mb-3">
                        <label for="org_type" class="form-label">Select Unit Type</label>
                        <select id="org_type" class="form-select" name="org_type_id" aria-label="Default select example" v-model="unit_info.org_type_id">
                            <option value="" selected disabled>select type</option>
                            <option v-for="(type, index) in org_types" :key="index" :value="type.id" >{{type.title}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="org_area" class="form-label">Select Area</label>
                        <select id="org_area" class="form-select" name="org_area_id" aria-label="Default select example" v-model="unit_info.org_area_id">
                            <option value="" selected disabled>select Area</option>
                            <option v-for="(area, index) in org_areas" :key="index" :value="area.id" >{{area.ward}} -- {{area.pourosova}} -- {{area.thana}}</option>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit unit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['unit_id'],
    data:function(){
        return{
            unit_info:[],
            org_types:[],
            org_areas:[],
        }
    },
    created:function(){
        this.org_type_list();
        this.org_area_list();
        this.show_unit();
    },
    methods:{
        show_unit : function(){
            axios.get(`/ward/unit/show/${this.unit_id}`)
                .then(responce => {
                    this.unit_info = responce.data
                })
        },
        edit_unit:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            axios.post(`/ward/unit/update`,formData)
                .then(function (response) {
                    window.toaster('unit Updated successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });

        },
        org_type_list(){
            axios.get(`/org-type/all`)
                .then(response => {
                    if(response.data.data.length > 0){
                        this.org_types = response.data.data;
                    }
                })
        },
        org_area_list(){
            axios.get(`/org-area/all`)
                .then(response => {
                    if(response.data.data.length > 0){
                        this.org_areas = response.data.data;
                    }
                })
        },
    }
}
</script>

<style>

</style>
