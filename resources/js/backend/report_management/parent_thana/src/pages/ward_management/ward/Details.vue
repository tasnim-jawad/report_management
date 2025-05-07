<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            ওয়ার্ডের বিস্তারিত   
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'WardAll'}" class="text-dark"> সকল ওয়ার্ড </router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{ward_info.title}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{ward_info.description}}</td>
                        </tr>
                        <tr>
                            <td>Unit Type</td>
                            <td>{{ward_info.org_type?.title}}</td>
                        </tr>
                        <tr>
                            <td>Area</td>
                            <td>{{ward_info.org_area?.ward }} - {{ ward_info.org_area?.pourosova }} - {{ ward_info.org_area?.thana }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{ward_info.org_gender}}</td>
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
    props:['ward_id'],
    data:function(){
        return {
            ward_info:[],
        }
    },
    created:function(){
        this.show_ward();
    },
    methods:{
        show_ward : function(){
            console.log(this.ward_id);
            axios.get(`/thana/ward/show/${this.ward_id}`)
                .then(responce => {
                    this.ward_info = responce.data
                })
        }
    }
}
</script>

<style>

</style>
