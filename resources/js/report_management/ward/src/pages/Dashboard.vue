<template>
    <div class="card mb-3">
        <div class="card-header">
            Report Status
        </div>
        <div class="card-body">
            <h3 > {{ report_status_message }} </h3>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            রিপোর্ট জমা দেওয়ার জন্য ইউনিটের জন্য অনুমোদিত মাস
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-start align-items-center gap-2">
                <p v-if="permitted_month_text != ''" >পারমিটেড মাসঃ {{ permitted_month_text }}</p>
                <p v-else  class="text-danger">কোনো মাসেই রিপোর্ট জমা দেয়ার কোনো অনুমতি নেই</p>
                <a href="" @click.prevent="remove_permission" class="btn btn-sm btn-danger " v-if="permitted_month_text != ''" >remove permission</a>
            </div>
            <div class="d-flex flex-wrap justify-content-start align-items-center mt-3 gap-2">
                <input type="month" v-model="permission_month" ref="month" name="month">
                <a href="" @click.prevent="set_permission" class="btn btn-sm btn-success ">Set New permission</a>
            </div>
        </div>
    </div>
    <!-- <div class="card mb-3">
        <div class="card-header">Permission to submit Unit report</div>
        <div class="card-body">
            <p><strong>Permitted Month:</strong> November(static)</p>
            <form ref="" action="">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month" v-model="month" name="month">
                <button class="btn btn-success ms-5" type="button" @click.prevent="unit_report_submission_permission">দেখুন</button>
            </form>
        </div>
    </div> -->
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            All Units Status <input type="month" v-model="month" ref="month" name="month">
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start mb-3" v-if="approved_unit.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Approved unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in approved_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-start align-items-center">
                                    <a href="" class="btn btn-sm btn-info " @click.prevent="unit_report_view(unit.unit_id , report_month )">View</a>
                                    <a href="" class="btn btn-sm btn-danger " @click.prevent="set_unit_report_status(unit.unit_id , report_month ,'rejected')">Reject</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-start">
                                <a href="" class="btn btn-success btn-sm" @click.prevent="submit_total_approved_unit_data">Submit Total Approved Unit Data</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3" v-if="rejected_unit.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Rejected unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in rejected_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-start align-items-center">
                                    <a href="" class="btn btn-sm btn-info " @click.prevent="unit_report_view(unit.unit_id , report_month )">View</a>
                                    <a href="" class="btn btn-sm btn-success " @click.prevent="set_unit_report_status(unit.unit_id , report_month ,'approved')">Approved</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3" v-if="pending_unit.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Pending unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in pending_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-start align-items-center">
                                    <a href="" class="btn btn-sm btn-info " @click.prevent="unit_report_view(unit.unit_id , report_month )">View</a>
                                    <a href="" class="btn btn-sm btn-success " @click.prevent="set_unit_report_status(unit.unit_id , report_month ,'approved')">Approved</a>
                                    <a href="" class="btn btn-sm btn-danger " @click.prevent="set_unit_report_status(unit.unit_id , report_month ,'rejected')">Reject</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3" v-if="unsubmitted_unit.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Unsubmitted unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in unsubmitted_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { store as data_store} from "../stores/ReportStore";
import { mapActions, mapWritableState } from 'pinia';
export default {
    props: ['user_id'],
    data() {
        return {
            permission_month:null,
            unsubmitted_unit:[],
            pending_unit:[],
            rejected_unit:[],
            approved_unit:[],
            report_month:[],
            user: [],
            report_status_message:'',
            permitted_month_text:'',
        }
    },
    created:function(){
        this.set_month()
        this.report_status()
        this.user_info()
        this.ward_report_status()
        this.unit_report_joma_permitted_month()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    watch:{
        month:function(){
            this.report_status()
        }
    },
    methods:{
        ...mapActions( data_store,['set_month']),

        report_status:async function(){
            let response = await axios.get('/ward/unit/report-status', {
                            params: {
                                month: this.month
                            }
                        })
            if(response.data.status == 'success'){
                this.unsubmitted_unit = response.data.unsubmitted_unit
                this.pending_unit = response.data.pending_unit
                this.rejected_unit = response.data.rejected_unit
                this.approved_unit = response.data.approved_unit
                this.report_month = response.data.report_month
                // console.log({
                //     '1': this.unsubmitted_unit,
                //     '2': this.pending_unit,
                //     '3': this.rejected_unit,
                //     '4': this.approved_unit,
                // });


            }
        },
        unit_report_view:function(unit_id , report_month){
            // window.open(`/ward/unit/report-check?unit_id=${unit_id}&month=${report_month}`)
            window.open(`/unit/report-check?unit_id=${unit_id}&month=${report_month}`)
        },
        set_unit_report_status:function(unit_id , report_month, new_status){
            // window.open(`/ward/unit/report-check?unit_id=${unit_id}&month=${report_month}`)
            const is_confirmed = confirm(`Are you sure you want to Change Submission Status to ${new_status}?`);
            if(is_confirmed){
            let response = axios.post('/ward/unit/change-status',{
                        unit_id: unit_id,
                        month: report_month,
                        new_status: new_status
                    }
                );
                console.log(response);
                this.report_status()
            }
        },
        submit_total_approved_unit_data:async function(){
            const is_confirmed = confirm(`Are you sure you want to submit the approved unit data for the month of ${this.month}?`);
            if(is_confirmed){
                try {
                    let response =await axios.post('/ward/submitted-units-data-add',{
                            month: this.month,
                            user_id: this.user?.user?.id,
                        });

                    if(response.data.status == "success"){
                        window.toaster("data is set successfully 111", 'success');
                    }
                } catch (error) {
                    console.error("Error submitting data:", error);
                    if(error.response.status == 403){
                        window.toaster(error.response.data.message, 'error');
                    }else{
                        window.toaster("Failed to submit data", 'error');
                    }
                }
            }
        },
        ward_report_status:async function(){
            let response = await axios.get('/ward/report-status', {
                            params: {
                                month: this.month
                            }
                        })
            if(response.data.status == 'success'){
                this.report_status_message = response.data.message;
            }
        },
        user_info:function(){
            axios.get("/user/ward-user-info")
                .then(responce =>{
                    this.user = responce.data
                })
        },
        unit_report_joma_permitted_month:async function() {
            let response =await axios.post('/ward/unit-report-joma-permitted-month',);
            if(response.data.status == 'success'){
                const month_year = response.data.data.month_year
                let formatted_month_year = window.formatDate(month_year, 'long_month_year');
                this.permitted_month_text = formatted_month_year
            }else{
                this.permitted_month_text = ''
            }
        },
        set_permission:async function(){
            let formatted_month_year = window.formatDate(this.permission_month, 'long_month_year');
            const is_confirmed = confirm(`Are you sure you want to Give Permission for month ${formatted_month_year}? `);
            if(is_confirmed){
                let response =await axios.post('/ward/set-unit-report-joma-permission',{
                            month: this.permission_month,
                        }
                    );
                    // console.log(response.data.status);
                if(response.data.status == 'success'){
                    this.unit_report_joma_permitted_month()
                }
            }
        },
        remove_permission:async function(){
            const is_confirmed = confirm(`Are you sure you want to remove Permission? `);
            if(is_confirmed){
                let response =await axios.post('/ward/remove-unit-report-joma-permission');
                if(response.data.status == 'success'){
                    this.unit_report_joma_permitted_month()
                }
            }
        }


    }
}
</script>

<style>

</style>
