<template>
    <div>
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0">
                মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>১. তালিমুল কুরআনের মাধ্যমে দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ব্যক্তিগত উদ্যোগে:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>২. বিভিন্ন শ্রেণি-পেশার মানুষের মাঝে দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'department4-different-job-holders-dawat'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রান্তিক জনগোষ্ঠী (অতি দরিদ্র):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'department4-different-job-holders-dawat'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ভিন্নধর্মাবলম্বী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'department4-different-job-holders-dawat'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>৩. পরিবারভিত্তিক দাওয়াত:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'department5-paribarik-dawat'" :unique_key="5"></form-input>
                </form>
            </div>
        </div>
        <previous-next
                :prev-route="{ name: 'Dawat' }"
                :next-route="{ name: 'DawahAndProkashona' }"
                :month="month"
            >
        </previous-next>
    </div>
</template>

<script>
import axios from 'axios';
import FormInput from '../components/FormInput.vue'
import PreviousNext from '../components/PreviousNext.vue';
import { store as data_store} from "../stores/ReportStore";
import { mapState, mapWritableState } from 'pinia';

export default {
  components: { FormInput, PreviousNext },
    data: ()=>({
        // month: null,
        fields1:[
            {
                label:'কতজন সদস্য(রুকন) কুরআন শিক্ষা প্রদান করেছেন ',
                name:'teacher_rokon',
            },
            {
                label:'কতজন কর্মী কুরআন শিক্ষা প্রদান করেছেন',
                name:'teacher_worker',
            },
            {
                label:'কতজন সদস্য(রুকন)-কে কুরআন শিক্ষা প্রদান করা হয়েছে ',
                name:'student_rokon',
            },
            {
                label:'কতজন কর্মীকে কুরআন শিক্ষা প্রদান করা হয়েছে ',
                name:'student_worker',
            },

        ],
        fields2:[
            {
                label:'কতজন সহীহ তিলাওয়াত শিখেছেন',
                name:'how_much_learned_quran',
            },
            {
                label:'মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name:'how_much_invited',
            },
            {
                label:'কতজন সহযোগী সদস্য হয়েছেন',
                name:'how_much_been_associated',
            },

        ],
        fields3:[
            {
                label:'কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে',
                name:'political_and_special_invited',
            },
            {
                label:'কতজন সহযোগী সদস্য হয়েছেন',
                name:'political_and_special_been_associated',
            },
            {
                label:'টার্গেট',
                name:'political_and_special_target',
            },
        ],
        fields4:[
            {
                label:'কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে',
                name:'prantik_jonogosti_invited',
            },
            {
                label:'কতজন সহযোগী সদস্য হয়েছেন',
                name:'prantik_jonogosti_been_associated',
            },
            {
                label:'টার্গেট',
                name:'prantik_jonogosti_target',
            },
        ],
        fields5:[
            {
                label:'কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে',
                name:'vinno_dormalombi_invited',
            },
            {
                label:'কতজন সহযোগী সদস্য হয়েছেন',
                name:'vinno_dormalombi_been_associated',
            },
            {
                label:'টার্গেট',
                name:'vinno_dormalombi_target',
            },
        ],
        fields6:[
            {
                label:'দাওয়াতি কাজে অংশগ্রহণকারী পরিবার সংখ্যা',
                name:'total_attended_family',
            },
            {
                label:'কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে',
                name:'how_many_new_family_invited',
            },
        ]
    }),

    computed: {
        ...mapWritableState(data_store, ['month']),
    },
  methods: {
        dawat_upload: function (endpoint) {
            var value = event.target.value;
            var name = event.target.name;
            var month = new Date(this.$refs.month.value);
            axios.post(`${endpoint}/store-single`, {
                value, name, month
            })
        },
        get_data_by_api: function (endpoint, unique_key) {
            axios.get(`${endpoint}/data?month=${this.month}-01`)
                .then(({ data: object }) => {
                    for (const key in object) {
                        if (Object.hasOwnProperty.call(object, key)) {
                            const value = object[key];
                            let el = document.querySelector(`input[id="${unique_key}${key}"]`);
                            if (el) {
                                el.value = value;
                            }
                        }
                    }
                });
        },
        get_monthly_data: function () {
            let els = document.querySelectorAll('input[type="text"]');
            els = [...els].forEach(e => e.value = '');

            this.get_data_by_api('department1-talimul-quran', 1);
            this.get_data_by_api('department4-different-job-holders-dawat', 4);
            this.get_data_by_api('department5-paribarik-dawat', 5);
            // this.get_data_by_api('dawat4-gono-songjog-and-dawat-ovijan', 4);
        }
    }

}
</script>

<style>

</style>
