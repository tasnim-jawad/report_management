<template>
    <div class="card">
        <div class="card-header">
            All Unit
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start ">
                    <thead>
                        <tr class="table-dark">
                            <th>মহানগরী</th>
                            <th>থানা</th>
                            <th>ওয়ার্ড</th>
                            <th>নাম</th>
                            <th>এরিয়া</th>
                            <th>দায়িত্বশীল তালিকা</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in units" :key="index">
                            <td>{{unit?.org_city?.title}}</td>
                            <td>{{unit?.org_thana?.title}}</td>
                            <td>{{unit?.org_ward?.title}}</td>
                            <td>{{unit?.title}}</td>
                            <td>{{unit?.org_area?.thana}}</td>
                            <td>
                                <span v-for="(responsible,index) in unit.org_unit_responsible" :key="index"> {{responsible?.responsibility_id}},</span>
                            </td>
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
    data:function(){
        return{
            units:[],
        }
    },
    created:function(){
        this.unit_list();
    },
    methods:{
        unit_list(){
            axios.get(`/org-unit/details`)
                .then(response => {
                    console.log(response.data);
                    if(response.data.status == 'success'){
                        this.units = response.data.data;
                        console.log('unit list',this.units);
                    }
                })
        },
    }
}
</script>

<style>

</style>
