<template>
    <div class="card mb-3">
        <div class="card-header">
            Report Status
        </div>
        <div class="card-body">
            <h3 >{{ report_status_message }}</h3>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            All Unit Resposibility
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th class="bg-red">Name</th>
                            <th>Resposibility</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit_user,index) in user_details" :key="index">
                            <td>{{unit_user.full_name}}</td>
                            <td>{{unit_user.org_unit_responsible[0].responsibility?.title}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import { store as data_store} from "../stores/ReportStore";
import { mapActions, mapWritableState } from 'pinia';

export default {
    props: ['user_id'],
    data() {
        return {
            user_details:[],
            joma_status:null,
            report_status_message:'',
        }
    },
    created:function(){
        this.show_users();
        this.report_status();
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },

    methods:{
        ...mapActions( data_store,['set_month']),
        show_users : function(){
            axios.get(`/user/show_unit_user`)
                .then(responce => {
                    this.user_details = responce.data
                    console.log(responce.data);

                })
        },
        report_status:async function(){
            let response = await axios.get('/unit/report-status', {
                            params: {
                                month: this.month
                            }
                        })
            if(response.data.status == 'success'){
                this.joma_status = response.data.report_status;
                this.report_status_message = response.data.message;
                console.log("report_status",response)

            }
        },

    },
}
</script>

<style>

</style>
