<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            ইউনিটের বিস্তারিত
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitAll'}" class="text-dark">সকল ইউনিট</router-link>
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
                            <td>{{unit_info.title}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{unit_info.description}}</td>
                        </tr>
                        <tr>
                            <td>Unit Type</td>
                            <td>{{unit_info.org_type?.title}}</td>
                        </tr>
                        <tr>
                            <td>Area</td>
                            <td>{{unit_info.org_area?.ward }} - {{ unit_info.org_area?.pourosova }} - {{ unit_info.org_area?.thana }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{unit_info.org_gender}}</td>
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
    props:['unit_id'],
    data:function(){
        return {
            unit_info:[],
        }
    },
    created:function(){
        this.show_unit();
    },
    methods:{
        show_unit : function(){
            console.log(this.unit_id);
            axios.get(`/ward/unit/show/${this.unit_id}`)
                .then(responce => {
                    this.unit_info = responce.data
                })
        }
    }
}
</script>

<style>

</style>
