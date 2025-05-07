<template>
    <div class="card">
        <!-- <div class="card-header">
            নতুন সুধী তৈরি করুন
        </div> -->
        <div class="card-header d-flex justify-content-between align-items-center">
            নতুন সুধী তৈরি করুন
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ThanaShudhiAll'}" class="text-dark">সকল সুধী তালিকা</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_shudhi">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input">
                        <input :type="field.field_type" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">ধার্য নিশ্চিত করুন</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as data_store} from "../../../stores/ReportStore"
import { mapActions, mapWritableState } from 'pinia';
export default {
    data(){
        return {
            fields1:[
                {
                    label:"Name",
                    name:"name",
                    field_type:"text",
                },
                {
                    label:"Mobile",
                    name:"mobile",
                    field_type:"text",
                },
                {
                    label:"Target",
                    name:"target",
                    field_type:"number",
                },
            ],

        }
    },
    created:function(){
        // this.auth_user();
    },
    computed:{
        // ...mapWritableState(data_store,{
        //     unit_user:'unit_user',
        //     unit_user_id: 'unit_user_id',
        //     unit_id: 'unit_id',
        // })
    },
    watch:{
        
    },
    methods:{
        // ...mapActions(data_store,{
        //     auth_user:'auth_user'
        // }),
        create_shudhi:function(){
            event.preventDefault();
            let e = event;
            let formData = new FormData(event.target);
            // formData.append('unit_id', this.value);
            formData.append('org_type', 'thana');

            for (const entry of formData.entries()) {
                console.log(entry);
            }
            axios.post('/thana-shudhi/store',formData)
                .then(function (response) {
                    console.log(response.data.status);
                    if(response.data.status){
                        window.toaster('New Shudhi Created successfuly', 'success');
                        e.target.reset();
                    }else{
                        window.toaster('Something is wrong', 'error');
                        e.target.reset();
                    }
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },

    }
}
</script>

<style>

</style>
