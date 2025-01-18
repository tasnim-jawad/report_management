<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সকল ডেলিগেট তালিকা
            <div class="unit_select">
                <select name="unit_id" id="unit_id">
                    <option value=""></option>
                    <option :value="unit.id" v-for="(unit,i) in units" :key="i"></option>
                </select>
            </div>
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramDelegateCreate'}" class="text-dark">নতুন ডেলিগেট এড করুন</router-link>
            </div>
        </div>
        <div class="card-body">
            
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Name</th>
                            <th>mobile</th>
                            <th>target</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(program_delegate,index) in all_program_delegate" :key="index">
                            <td>{{program_delegate.name}}</td>
                            <td>{{program_delegate.mobile}}</td>
                            <td>{{program_delegate.target}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link v-if="program_delegate && program_delegate.id"  :to="{name:'ProgramDelegateDetails',params: { program_delegate_id: program_delegate.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link v-if="program_delegate && program_delegate.id"  :to="{name:'ProgramDelegateEdit',params: { program_delegate_id: program_delegate.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_program_delegate(program_delegate.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_program_delegate_form_'+program_delegate.id" >
                                            <input type="text" name="id" :value="program_delegate.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as program_delegate_store } from "../../../stores/ProgramDelegateStore" 
import { store as program_store } from "../../../stores/ProgramStore" 
import { store as data_store } from "../../../stores/ReportStore" 
import { mapActions, mapWritableState } from 'pinia';
export default {
    props:['program_id'],
    data() {
        return {
            bm_category_user:[],
        }
    },

    created:function(){
        this.show_delegates()
    },
    computed:{
        ...mapWritableState(program_delegate_store, [
            'program_wide_delegate',
        ]),
    },
    methods:{
        ...mapActions(program_delegate_store,{
            all_unit_program_delegate:'all_unit_program_delegate',
        }),

        show_delegates:function(){
            let program_id = this.program_id
            console.log("show_delegates",program_id);
        },

        delete_program_delegate : function(program_delegate_id){
            if (window.confirm("Are you sure you want to delete this program delegate ?")) {
                this.submit_delete_form(program_delegate_id);
            } else {
                window.toaster('Entry is safe', 'info');
            }
        },
        submit_delete_form : function(program_delegate_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_program_delegate_form_'+program_delegate_id));
            axios.post("/unit-program_delegate/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Shudhi delete successfuly', 'success');
                        this.all_unit_program_delegate();
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
