<template>
    <div class="card">
        <div class="card-header">
            All Unit User
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start mb-3">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Approved unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in approved_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Rejected unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in rejected_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Pending unit name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit,index) in pending_unit" :key="index">
                            <td>{{unit.unit_title}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3">
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
import { store as data_store} from "../stores/ReportStore";
import { mapActions, mapWritableState } from 'pinia';
export default {
    props: ['user_id'],
    data() {
        return {
            unsubmitted_unit:[],
            pending_unit:[],
            rejected_unit:[],
            approved_unit:[],
        }
    },
    created:function(){
        this.set_month()
        this.report_status()
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
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
                console.log("report_status",response)
                console.log({
                    '1': this.unsubmitted_unit,
                    '2': this.pending_unit,
                    '3': this.rejected_unit,
                    '4': this.approved_unit,
                });


            }
        },

    }
}
</script>

<style>

</style>
