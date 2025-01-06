<template>
    <div class="container">
        <div class="card mb-2">
            <div class="card-header">
                Unit Create
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Unit User Create
            </div>
            <div class="card-body">
                <form action="" id="create_unit_form">

                    <div class="mb-3">
                        <label for="gender_select" class="form-label">Select gender</label>
                        <select id="gender_select" class="form-select " name="org_gender" aria-label="Default select example" v-model="selected_gender">
                            <option value="men" >পুরুষ</option>
                            <option value="women" >মহিলা</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="unit_title" class="form-label">Write Unit Name</label>
                        <input type="text" class="form-control" id="unit_title" name="title" placeholder="write new unit title">
                    </div>
                    <div class="mb-3">
                        <label for="unit_description" class="form-label">Write unit description</label>
                        <input id="unit_description" type="text" class="form-control" name="description" placeholder="write new unit description">
                    </div>
                    <div class="mb-3">
                        <label for="org_type" class="form-label">Select Unit Type</label>
                        <select id="org_type" class="form-select" name="org_type_id" aria-label="Default select example">
                            <option value="" selected disabled>select type</option>
                            <option v-for="(type, index) in org_types" :key="index" :value="type.id" >{{type.title}}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="org_area" class="form-label">Select Area</label>
                        <select id="org_area" class="form-select" name="org_area_id" aria-label="Default select example">
                            <option value="" selected disabled>select Area</option>
                            <option v-for="(area, index) in org_areas" :key="index" :value="area.id" >{{area.ward}} -- {{area.pourosova}} -- {{area.thana}}</option>
                        </select>
                    </div>
                    <button type="button" @click="confirm_submit()" class="btn btn-sm btn-info ">Create Unit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data: function(){
        return {
            org_types:[],
            org_areas:[],
            selected_gender:'',
        }
    },
    created:function(){
        this.org_type_list();
        this.org_area_list();
    },
    methods:{
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

        confirm_submit:function(){
            if (window.confirm("Are you sure you want to create unit?")) {
                this.submit_form();
            } else {
                window.toaster('unit is not create', 'info');
            }

        },
        submit_form : function(){
            let cevent = event;
            cevent.preventDefault();
            const formData = new FormData(document.getElementById('create_unit_form'));
            // console.log(formData);
            formData.forEach((value, key) => {
                console.log(`${key}: ${value}`);
            });
            axios.post("ward/unit/store",formData)
                    .then(responce => {
                        window.toaster('unit create successfuly', 'success');
                        console.log(cevent.target);
                        
                        const form = document.getElementById('create_unit_form');
                        form.reset();
                        this.selected_gender = null;
                        // cevent.target.reset();
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
