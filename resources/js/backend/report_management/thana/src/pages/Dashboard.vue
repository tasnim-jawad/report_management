<template>
    <div class="card mb-3">
        <div class="card-header">
            Report Status
        </div>
        <div class="card-body">
            <h3> {{ report_status_message }} </h3>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            রিপোর্ট জমা দেওয়ার জন্য ওয়ার্ডের জন্য অনুমোদিত মাস
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-start align-items-center gap-2">
                <!-- {{ permitted_month_text }} -->
                <p v-show="permitted_month_text != ''">পারমিটেড মাসঃ {{ permitted_month_text }}</p>
                <p style="color: red;"  v-show="!permitted_month_text" >কোনো মাসেই রিপোর্ট জমা দেয়ার কোনো অনুমতি নেই</p>
                <a href="" @click.prevent="remove_permission" class="btn btn-sm btn-danger" 
                    v-show="permitted_month_text != ''" >remove permission</a>
            </div>
            <div  class="d-flex flex-wrap justify-content-start align-items-center mt-3 gap-2">
                <input type="month" v-model="permission_month"  name="month">
                <a href="" @click.prevent="set_permission" class="btn btn-sm btn-success ">Set New permission</a>
            </div>
        </div>
    </div>
    <!-- <div class="card mb-3">
        <div class="card-header">Permission to submit ward report</div>
        <div class="card-body">
            <p><strong>Permitted Month:</strong> November(static)</p>
            <form ref="" action="">
                <input type="text" class="d-none" name="user_id" :value = "this.user?.user?.id" >
                মাস: <input type="month"  name="month">
                <button class="btn btn-success ms-5" type="button" @click.prevent="ward_report_submission_permission">দেখুন</button>
            </form>
        </div>
    </div> -->
    <div class="card">
        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            All wards Status <input type="month" v-model="month"  name="month">
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive">
                <table class="table table-striped table-bordered text-start mb-3" v-if="approved_ward.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Approved ward name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ward, index) in approved_ward" :key="index">
                            <td>{{ ward.ward_title }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-start align-items-center">
                                    <a href="" class="btn btn-sm btn-info "
                                        @click.prevent="ward_report_view(ward.ward_id, report_month)">View</a>
                                    <a href="" class="btn btn-sm btn-danger "
                                        @click.prevent="set_ward_report_status(ward.ward_id, report_month, 'rejected')">Reject</a>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td colspan="2" class="text-start">
                                <a href="" class="btn btn-success btn-sm"
                                    @click.prevent="submit_total_approved_ward_data">Submit Total Approved ward Data</a>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3" v-if="rejected_ward.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Rejected ward name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ward, index) in rejected_ward" :key="index">
                            <td>{{ ward.ward_title }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-start align-items-center">
                                    <a href="" class="btn btn-sm btn-info "
                                        @click.prevent="ward_report_view(ward.ward_id, report_month)">View</a>
                                    <a href="" class="btn btn-sm btn-success "
                                        @click.prevent="set_ward_report_status(ward.ward_id, report_month, 'approved')">Approved</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3" v-if="pending_ward.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Pending ward name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ward, index) in pending_ward" :key="index">
                            <td>{{ ward.ward_title }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-start align-items-center">
                                    <a href="" class="btn btn-sm btn-info "
                                        @click.prevent="ward_report_view(ward.ward_id, report_month)">View</a>
                                    <a href="" class="btn btn-sm btn-success "
                                        @click.prevent="set_ward_report_status(ward.ward_id, report_month, 'approved')">Approved</a>
                                    <a href="" class="btn btn-sm btn-danger "
                                        @click.prevent="set_ward_report_status(ward.ward_id, report_month, 'rejected')">Reject</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered text-start mb-3" v-if="unsubmitted_ward.length">
                    <thead>
                        <tr class="table-dark">
                            <th class="w-50">Unsubmitted ward name </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(ward, index) in unsubmitted_ward" :key="index">
                            <td>{{ ward.ward_title }}</td>
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
import { store as data_store } from "../stores/ReportStore";
import { mapActions, mapWritableState } from 'pinia';
export default {
    props: ['user_id'],
    data() {
        return {
            permission_month: '',
            unsubmitted_ward: [],
            pending_ward: [],
            rejected_ward: [],
            approved_ward: [],
            report_month: [],
            user: [],
            report_status_message: '',
            permitted_month_text: '',

            loaded: false,
        }
    },
    created: function () {
        this.set_month()
        this.report_status()
        this.user_info()
        this.thana_report_status()
        this.ward_report_joma_permitted_month()

        this.loaded = true
       
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    watch: {
        month: function () {
            this.report_status()
        }
    },
    methods: {
        ...mapActions(data_store, ['set_month']),

        report_status: async function () {
            let response = await axios.get('thana/ward/report-status', {
                params: {
                    month: this.month
                }
            })
            if (response.data.status == 'success') {
                this.unsubmitted_ward = response.data.unsubmitted_ward
                this.pending_ward = response.data.pending_ward
                this.rejected_ward = response.data.rejected_ward
                this.approved_ward = response.data.approved_ward
                this.report_month = response.data.report_month
                // console.log({
                //     '1': this.unsubmitted_ward,
                //     '2': this.pending_ward,
                //     '3': this.rejected_ward,
                //     '4': this.approved_ward,
                // });


            }
        },
        ward_report_view: function (ward_id, report_month) {
            console.log(ward_id, report_month);
            
            // window.open(`/ward/ward/report-check?ward_id=${ward_id}&month=${report_month}`)
            // window.open(`/ward/report-check?ward_id=${ward_id}&month=${report_month}`)
            if (ward_id, report_month) {
                this.$router.push({
                    name: 'WardReportCheck',
                    params: {
                        month: report_month,
                        ward_id: ward_id
                    }
                });
            }

        },
        set_ward_report_status: function (ward_id, report_month, new_status) {
            // window.open(`/ward/ward/report-check?ward_id=${ward_id}&month=${report_month}`)
            const is_confirmed = confirm(`Are you sure you want to Change Submission Status to ${new_status}?`);
            if (is_confirmed) {
                let response = axios.post('/thana/ward/change-status', {
                    ward_id: ward_id,
                    month: report_month,
                    new_status: new_status
                }
                );
                console.log(response);
                this.report_status()
            }
        },
        submit_total_approved_ward_data: async function () {
            const is_confirmed = confirm(`Are you sure you want to submit the approved ward data for the month of ${this.month}?`);
            if (is_confirmed) {
                try {
                    let response = await axios.post('/ward/submitted-wards-data-add', {
                        month: this.month,
                        user_id: this.user?.user?.id,
                    });

                    if (response.data.status == "success") {
                        window.toaster("data is set successfully 111", 'success');
                    }
                } catch (error) {
                    console.error("Error submitting data:", error);
                    if (error.response.status == 403) {
                        window.toaster(error.response.data.message, 'error');
                    } else {
                        window.toaster("Failed to submit data", 'error');
                    }
                }
            }
        },
        thana_report_status: async function () {
            let response = await axios.get('/thana/report-status', {
                params: {
                    month: this.month
                }
            })
            if (response.data.status == 'success') {
                this.report_status_message = response.data.message;
            }
        },
        user_info: function () {
            axios.get("/user/thana-user-info")
                .then(responce => {
                    this.user = responce.data
                })
        },
        ward_report_joma_permitted_month: async function () {
            let response = await axios.post('/thana/ward-report-joma-permitted-month',);
            console.log("from ward_report_joma_permitted_month", response.data);
            
            if (response.data.status == 'success') {
                const month_year = response.data.data.month_year
                let formatted_month_year = window.formatDate(month_year, 'long_month_year');
                this.permitted_month_text = formatted_month_year
                console.log("from permitted_month_text", this.permitted_month_text);
            } else {
                this.permitted_month_text = ''
            }
        },
        set_permission: async function () {
            let formatted_month_year = window.formatDate(this.permission_month, 'long_month_year');
            const is_confirmed = confirm(`Are you sure you want to Give Permission for month ${formatted_month_year}? `);
            if (is_confirmed) {
                try {
                    let response = await axios.post('/thana/set-ward-report-joma-permission', {
                                month: this.permission_month,
                            });
                    console.log("status response",response.data.status);
                    if (response.data.status == 'success') {
                        this.ward_report_joma_permitted_month()
                    }else if (response.data.status === 'fail') {
                        // Show the message from the response
                        window.toaster(response.data.message, 'error');
                    }else {
                        console.warn('Unexpected response:', response.data);
                        window.toaster('An unexpected error occurred.', 'error');
                    }

                } catch (error) {
                    console.error("Error submitting data:", error);
                    if (error.response) {
                        switch (error.response.status) {
                            case 403:
                                window.toaster(error.response.data.message, 'error');
                                break;
                            case 422:
                                const validationErrors = Object.values(error.response.data.errors).flat().join(', ');
                                window.toaster(`Validation error: ${validationErrors}`, 'error');
                                break;
                            case 500:
                                window.toaster('Server error. Please try again later.', 'error');
                                break;
                            default:
                                window.toaster('An unexpected error occurred.', 'error');
                                break;
                        }
                    } else if (error.request) {
                        window.toaster('No response from server. Please check your connection.', 'error');
                    } else {
                        window.toaster(`Unexpected error: ${error.message}`, 'error');
                    }
                }
                
            }
        },
        remove_permission: async function () {
            const is_confirmed = confirm(`Are you sure you want to remove Permission? `);
            if (is_confirmed) {
                let response = await axios.post('/thana/remove-ward-report-joma-permission');
                if (response.data.status == 'success') {
                    this.ward_report_joma_permitted_month()
                }
            }
        }


    }
}
</script>

<style></style>
