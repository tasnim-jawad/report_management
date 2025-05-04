<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সুধীর বিস্তারিত তথ্য
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitShudhiAll'}" class="text-dark">সকল সুধী তালিকা</router-link>
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
                            <td>Name</td>
                            <td>{{shudhi_info?.name}}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{shudhi_info?.mobile}}</td>
                        </tr>
                        <tr>
                            <td>Target</td>
                            <td>{{shudhi_info?.target}}</td>
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
    props:['shudhi_id'],
    data:function(){
        return {
            shudhi_info:[],
        }
    },
    created:function(){
        this.show_unit_shudhi();
    },
    methods:{
        show_unit_shudhi :async function(){
            try{
                await axios.get(`/unit-shudhi/show/${this.shudhi_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.shudhi_info = responce.data.data
                        console.log(this.shudhi_info);
                    }
                })
            }catch(e){
                console.log("error from shudhi detail page" , e);
                
            }
            
        }
    }
}
</script>

<style>

</style>
