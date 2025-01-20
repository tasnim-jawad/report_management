<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            প্রোগ্রাম শিডিউল তৈরি করুন
            <div class="">
                <router-link  :to="{name:'ProgramScheduleAll'}" class="text-dark btn btn-info btn-sm">সকল প্রোগ্রাম শিডিউল</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_program">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="form_label">
                        <label class="" for="">Select program</label>
                    </div>
                    <div class="form_input">
                        <select class="form-control" name="program_id" id="program_id" v-model="selected_program">
                            <option value="">-- select program --</option>
                            <option v-for="(program, i) in all_program" :key="i" :value="program.id"  >{{program.title}}</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="form_label">
                        <label for="">Is completed</label>
                    </div>
                    <div class="form_input">
                        <select class="form-control" name="is_completed" id="is_completed">
                            <option value="">-- select --</option>
                            <option value="1">yes</option>
                            <option value="0">no</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Program Schedule create</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as data_store} from "../../../stores/ReportStore"
import { store as program_store} from "../../../stores/ProgramStore"
import { mapActions, mapWritableState } from 'pinia';
export default {
    data(){
        return {
        }
    },
    created:function(){
        this.auth_user();
        this.all_unit_program();
    },
    computed:{
        ...mapWritableState(data_store,{
            unit_user:'unit_user',
            unit_user_id: 'unit_user_id',
            unit_id: 'unit_id',
        }),
        ...mapWritableState(program_store,{
            all_program:'all_program',
        }),
    },
    watch:{
        
    },
    methods:{
        ...mapActions(data_store,{
            auth_user:'auth_user'
        }),
        ...mapActions(program_store,{
            all_unit_program:'all_unit_program'
        }),
        create_program:function(){
            event.preventDefault();
            let e = event;
            let formData = new FormData(event.target);
            // formData.append('unit_id', this.value);
            formData.append('org_type', 'unit');

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
