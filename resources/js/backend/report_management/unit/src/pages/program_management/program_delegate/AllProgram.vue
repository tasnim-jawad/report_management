<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সকল ডেলিগেট তালিকা
            <!-- <div class="unit_select">
                <select name="unit_id" id="unit_id">
                    <option value=""></option>
                    <option :value="unit.id" v-for="(unit,i) in units" :key="i"></option>
                </select>
            </div> -->
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramDelegateCreate'}" class="text-dark">নতুন ডেলিগেট এড করুন</router-link>
            </div>
        </div>
        <div class="card-body">
            
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Program title</th>
                            <th>Delegate number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(program,index) in all_program" :key="index">
                            <td>{{program.title}}</td>
                            <td>
                                {{count_delegates[program.id]?.program_delegate_number}}</td>
                            <td>
                                <div class="action">
                                    <div class="d-flex justify-center">
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramDelegateProgramWiseDelegate',params: { program_id: program.id }}"  class="text-dark btn btn-info btn-sm me-2">show</router-link>
                                        <router-link v-if="program && program.id"  :to="{name:'ProgramDelegateEdit',params: { program_id: program.id }}"  class="text-dark btn btn-warning btn-sm me-2">edit</router-link>
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
    data() {
        return {
        }
    },

    created:async function(){
        await this.all_org_type_program('unit');
    },
    computed:{
        ...mapWritableState(program_store, [
            'all_program',
        ]),
        ...mapWritableState(program_delegate_store, [
            'count_delegates',
            'program_delegates',
        ]),
    },
    methods:{
        ...mapActions(program_store,{
            all_org_type_program:'all_org_type_program',
        }),
        ...mapActions(program_delegate_store,{
            program_wise_delegate:'program_wise_delegate',
        }),
        
        
    },
    watch: {
        all_program: {
            handler(newPrograms) {
                newPrograms.forEach((program) => {
                    this.program_wise_delegate(program.id);
                });
            },
        deep: true, // Watches nested changes
        },
    },

}
</script>

<style>

</style>
