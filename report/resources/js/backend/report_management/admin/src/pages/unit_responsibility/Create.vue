<template>
    <div class="card">
        <div class="card-header">
            নতুন খাত তৈরি করুন
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_category">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input">
                        <input type="text" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">খাত তৈরি করুন</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return {
            fields1:[
                {
                    label:"Title",
                    name:"title",
                },
                {
                    label:"Description",
                    name:"description",
                },
            ],
        }
    },
    methods:{
        create_category:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            axios.post('/unit-responsibility/store',formData)
                .then(function (response) {
                    console.log(response.statusText);
                    window.toaster('New Responsibility Created successfuly', 'success');
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
