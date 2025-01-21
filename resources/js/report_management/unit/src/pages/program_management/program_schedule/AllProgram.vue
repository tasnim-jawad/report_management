<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সকল প্রোগ্রাম তালিকা
            <!-- <div class="unit_select">
                <select name="unit_id" id="unit_id">
                    <option value=""></option>
                    <option :value="unit.id" v-for="(unit,i) in units" :key="i"></option>
                </select>
            </div> -->
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ProgramScheduleAll'}" class="text-dark">সকল শিডিউল </router-link>
            </div>
        </div>
        <div class="card-body">
            
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Program title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(program,index) in all_program" :key="index">
                            <td>{{program.title}}</td>
                            <td>
                                <div class="action">
                                    <div class="d-flex justify-center">
                                        <router-link 
                                            v-if="program && program.id && !exist_schedule[program.id]"  
                                            :to="{name:'ProgramScheduleCreate',params: { program_id: program.id }}"  
                                            class="text-dark btn btn-info btn-sm me-2">
                                            create
                                        </router-link>
                                        <router-link 
                                            v-if="program && program.id && exist_schedule[program.id]"  
                                            :to="{name:'ProgramScheduleDetails',params: { program_id: program.id }}"  
                                            class="text-dark btn btn-success btn-sm me-2">
                                            show
                                        </router-link>
                                        <router-link 
                                            v-if="program && program.id && exist_schedule[program.id]"  
                                            :to="{name:'ProgramScheduleEdit',params: { program_id: program.id }}"  
                                            class="text-dark btn btn-primary btn-sm me-2">
                                            edit
                                        </router-link>
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
import { store as program_store } from "../../../stores/ProgramStore" 
import { store as program_schedule_store } from "../../../stores/ProgramScheduleStore" 
import { store as data_store } from "../../../stores/ReportStore" 
import { mapActions, mapWritableState } from 'pinia';
export default {
    data() {
        return {
            exist_schedule:[],
        }
    },

    created:async function(){
        await this.all_unit_program();
        await this.all_unit_program_schedule();

        this.exist_schedule_set();
        
        
    },
    computed:{
        ...mapWritableState(program_store, [
            'all_program',
        ]),
        ...mapWritableState(program_schedule_store, [
            'all_program_schedule',
        ]),
    },
    methods:{
        ...mapActions(program_store,{
            all_unit_program:'all_unit_program',
        }),
        ...mapActions(program_schedule_store,{
            all_unit_program_schedule:'all_unit_program_schedule',
        }),
        
        exist_schedule_set:function(){
            this.all_program_schedule.forEach((schedule) => {
                this.exist_schedule[schedule.program_id] = true;
            });

            console.log("Updated exist_schedule:", this.exist_schedule);
        },
        
        
    },
    watch: {
        all_program_schedule: {
            handler(newPrograms) {
                newPrograms.forEach((program) => {
                    console.log('from all_program_schedule' , program);
                    
                });
            },
        deep: true,     
        },
    },

}
</script>

<style>

</style>
