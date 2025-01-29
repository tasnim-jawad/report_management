<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0">
                মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মন্তব্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <!-- <div class="d-flex flex-wrap gap-2 mb-2 align-items-center"> -->
                        <div class="d-flex flex-wrap flex-column gap-2 mb-2 align-items-center">
                        <div class="form_label w-100">
                            <label for="">ওয়ার্ড সভাপতির মন্তব্য :</label>
                        </div>
                        <div class="form_input w-100">
                            <textarea class="w-100 form-control" name="montobbo" @change="single_upload(`ward-montobbo`)" id="montobboText" rows="10"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="joma_din text-center mb-3">
            <a href="" class="btn btn-success" v-if="joma_status == 'unsubmitted'" @click.prevent="report_joma">রিপোর্ট জমা দিন</a>
            <a href="" class="btn btn-success" v-else-if="joma_status == 'rejected'" @click.prevent="report_joma">রিপোর্ট পুনরায় জমা দিন</a>
        </div>
        <previous-next
                :prev-route="{ name: 'BmExpenseAll' }"
                :month="month"
            >
        </previous-next>
    </div>
</template>

<script>
import FormInput from '../components/FormInput.vue'
import PreviousNext from '../components/PreviousNext.vue';
import { store as data_store} from "../stores/ReportStore";
import { mapState, mapWritableState } from 'pinia';

export default {
    components: { FormInput, PreviousNext },
    data: ()=>({
        // month:null,
        joma_status: null,
    }),
    created:function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        if(this.month != null){
            this.get_monthly_data();
            this.report_status();
        }
        this.report_status();
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
    },
    methods: {
        single_upload: function (endpoint) {
            var value = event.target.value;
            var name = event.target.name;
            var month = new Date(this.$refs.month.value);
            axios.post(`${endpoint}/store-single`, {
                value, name, month
            })
        },
        get_data_by_api: function (endpoint) {
            // console.log(endpoint,"montobbo");
            axios.get(`${endpoint}/data?month=${this.month}-01`)
                .then(({ data: object }) => {
                    for (const key in object) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            if(key == 'montobbo'){
                                const value = object[key];
                                let el = document.querySelector(`#montobboText`);
                                if (el) {
                                    // console.log('montobbo',value);
                                    el.value = value;
                                }
                            }
                        }
                    }
                });
        },
        get_monthly_data: function () {
            let els = document.querySelectorAll('textarea');
            els = [...els].forEach(e => e.value = '');

            this.get_data_by_api('ward-montobbo');
        },
        report_status: async function () {
            const month = this.month;
            let response = await axios.get('/ward/report-status', {
                params: {
                    month: month
                }
            })
            if (response.data.status == 'success') {
                this.joma_status = response.data.report_status
            }
        },
        report_joma: async function () {
            if (window.confirm("আপনি কি জমা দানের বিষয়ে নিশ্চিত?")) {
                const month = this.$route.params.month;
                let response = await axios.get('/ward/report-joma', {
                    params: {
                        month: month
                    }
                })
                if (response.data.status == 'success') {
                    // this.$router.push({ name: "Montobbo" });
                    this.report_status()
                    window.toaster(response.data.message, 'success');

                    this.joma_status = response.data.report_status
                }
            } else {
                window.toaster("রিপোর্ট জমা বন্ধ করা হয়েছে । অনুগ্রহ করে সমস্ত প্রয়োজনীয় তথ্য পূরণ করুন ", 'info');
            }
        },
    }

}
</script>

<style>

</style>
