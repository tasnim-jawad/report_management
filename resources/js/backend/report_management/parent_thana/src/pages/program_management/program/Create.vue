<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            প্রোগ্রাম তৈরি করুন
            <div class="">
                <router-link  :to="{name:'ProgramAll'}" class="text-dark btn btn-info btn-sm">সকল প্রোগ্রাম</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_program">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input">
                        <input :type="field.field_type" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Program create</button>
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
                    label:"Program Title",
                    name:"title",
                    field_type:"text",
                },
                {
                    label:"Date",
                    name:"date",
                    field_type:"date",
                },
                {
                    label:"Location",
                    name:"location",
                    field_type:"text",
                },
                {
                    label:"Time",
                    name:"time",
                    field_type:"time",
                },
                {
                    label:"Description",
                    name:"description",
                    field_type:"text",
                },
                {
                    label:"Guest",
                    name:"guest",
                    field_type:"text",
                },
            ],

        }
    },
    // created:function(){
    //     this.auth_user();
    // },
    // computed:{
    //     ...mapWritableState(data_store,{
    //         unit_user:'unit_user',
    //         unit_user_id: 'unit_user_id',
    //         unit_id: 'unit_id',
    //     })
    // },
    // watch:{
        
    // },
    methods:{
        // ...mapActions(data_store,{
        //     auth_user:'auth_user'
        // }),
        create_program:function(){
            event.preventDefault();
            let e = event;
            let formData = new FormData(event.target);
            // formData.append('unit_id', this.value);
            formData.append('org_type', 'thana');

            for (const entry of formData.entries()) {
                console.log(entry);
            }
            axios.post('/program/store',formData)
                .then(function (response) {
                    console.log(response.data.status);
                    if(response.data.status){
                        window.toaster('New Program Created successfuly', 'success');
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
