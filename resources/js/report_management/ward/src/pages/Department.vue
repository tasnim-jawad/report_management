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
                <h1 class="fw-bolder">খ) বিভাগ ভিত্তিক তথ্য:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-medium">১. তালিমুল কুরআনের মাধ্যমে দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ব্যক্তিগত উদ্যোগে:</h1>
            </div>
            <div class="card-body">
                <div class="mb-1 border-bottom">
                    <h1 class="font_bng fw-bold">সদস্য (রুকন):</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">কর্মী:</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সামষ্টিক উদ্যোগ:</h1>
            </div>
            <div class="card-body">
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">কুরআন শিক্ষার গ্রুপ:</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">মক্তব:</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">ফোরকানিয়া মাদ্রাসা:</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">মোট কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে:</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields7" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">মোট কতজন সহযোগী সদস্য হয়েছেন:</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields8" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">তা'লিমুল কুরআন : মুয়াল্লিম সংখ্যা :</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields9" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
                <div class="mb-1 border-bottom mt-2">
                    <h1 class="font_bng fw-bold">তা'লিমুল কুরআন : বৃদ্ধি সংখ্যা :</h1>
                </div>
                <form action="">
                    <form-input v-for="(field, index) in fields10" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department1-talimul-quran'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">২. গ্রাম ও মহল্লাভিত্তিক দাওয়াত:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সরকারি হিসাবে:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields11" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department2-moholla-vittik-dawat'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গ্রাম কমিটি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields12" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department2-moholla-vittik-dawat'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মহল্লা কমিটি :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields13" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department2-moholla-vittik-dawat'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিশেষ দাওয়াতের অন্তর্ভুক্ত গ্রাম:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields14" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department2-moholla-vittik-dawat'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিশেষ দাওয়াতের অন্তর্ভুক্ত মহল্লা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields15" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department2-moholla-vittik-dawat'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields16" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-department2-moholla-vittik-dawat'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>রাজনৈতিক ও বিশিষ্ট ব্যক্তিবর্গ:</h1>
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
                <h1 class="fw-semibold">৩. পরিবারভিত্তিক দাওয়াত:</h1>
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
                label:'কতজন কুরআন শিক্ষা প্রদান করেছেন ',
                name:'teacher_rokon',
            },

            {
                label:'কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে ',
                name:'student_rokon',
            },


        ],
        fields2:[
            {
                label:'কতজন কুরআন শিক্ষা প্রদান করেছেন',
                name:'teacher_worker',
            },
            {
                label:'কতজনকে কুরআন শিক্ষা প্রদান করা হয়েছে ',
                name:'student_worker',
            },

        ],
        fields3:[
            {
                label:'মোট সংখ্যা',
                name:'quran_learning_total_group',
            },
            {
                label:'মোট শিক্ষার্থী সংখ্যা',
                name:'quran_learning_total_students',
            },

        ],
        fields4:[
            {
                label:'মোট সংখ্যা',
                name:'total_moktob',
            },
            {
                label:'মোট শিক্ষার্থী সংখ্যা',
                name:'total_moktob_students',
            },

        ],
        fields5:[
            {
                label:'মোট সংখ্যা',
                name:'total_forkania_madrasah',
            },
            {
                label:'মোট শিক্ষার্থী সংখ্যা',
                name:'total_forkania_madrasah_students',
            },

        ],
        fields6:[
            {
                label:'মোট কতজন সহীহ তিলাওয়াত শিখেছেন',
                name:'how_much_learned_sohih_tilawat',
            },
        ],
        fields7:[
            {
                label:'পুরুষ',
                name:'how_much_invited_man',
            },
            {
                label:'মহিলা',
                name:'how_much_invited_woman',
            },
        ],
        fields8:[
            {
                label:'পুরুষ',
                name:'how_much_been_associated_man',
            },
            {
                label:'মহিলা',
                name:'how_much_been_associated_woman',
            },

        ],
        fields9:[
            {
                label:'পুরুষ',
                name:'total_muallim_man',
            },
            {
                label:'মহিলা',
                name:'total_muallim_woman',
            },

        ],
        fields10:[
            {
                label:'পুরুষ',
                name:'total_muallim_increased_man',
            },
            {
                label:'মহিলা',
                name:'total_muallim_increased_woman',
            },

        ],
        fields11:[
            {
                label:'গ্রাম সংখ্যা',
                name:'govment_calculated_village_amount',
            },
            {
                label:'মহল্লা সংখ্যা',
                name:'govment_calculated_moholla_amount',
            },

        ],
        fields12:[
            {
                label:'সংখ্যা',
                name:'total_village_committee',
            },
            {
                label:'বৃদ্ধি',
                name:'total_village_committee_increased',
            },

        ],
        fields13:[
            {
                label:'সংখ্যা',
                name:'total_moholla_committee',
            },
            {
                label:'বৃদ্ধি',
                name:'total_moholla_committee_increased',
            },

        ],
        fields14:[
            {
                label:'সংখ্যা',
                name:'special_dawat_included_village',
            },
            {
                label:'বৃদ্ধি',
                name:'special_dawat_included_village_increased',
            },

        ],
        fields15:[
            {
                label:'সংখ্যা',
                name:'special_dawat_included_moholla',
            },
            {
                label:'বৃদ্ধি',
                name:'special_dawat_included_moholla_increased',
            },

        ],
        fields16:[
            {
                label:'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name:'how_many_been_invited',
            },
            {
                label:'কতজন সহযোগী সদস্য হয়েছেন',
                name:'how_many_associated_created',
            },

        ],
        // fields4:[
        //     {
        //         label:'কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে',
        //         name:'political_and_special_invited',
        //     },
        //     {
        //         label:'কতজন সহযোগী সদস্য হয়েছেন',
        //         name:'political_and_special_been_associated',
        //     },
        //     {
        //         label:'টার্গেট',
        //         name:'political_and_special_target',
        //     },
        // ],
        // fields5:[
        //     {
        //         label:'কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে',
        //         name:'prantik_jonogosti_invited',
        //     },
        //     {
        //         label:'কতজন সহযোগী সদস্য হয়েছেন',
        //         name:'prantik_jonogosti_been_associated',
        //     },
        //     {
        //         label:'টার্গেট',
        //         name:'prantik_jonogosti_target',
        //     },
        // ],
        // fields6:[
        //     {
        //         label:'কতজনের মাঝে দাওয়াত পৌঁছানো হয়েছে',
        //         name:'vinno_dormalombi_invited',
        //     },
        //     {
        //         label:'কতজন সহযোগী সদস্য হয়েছেন',
        //         name:'vinno_dormalombi_been_associated',
        //     },
        //     {
        //         label:'টার্গেট',
        //         name:'vinno_dormalombi_target',
        //     },
        // ],
        // fields7:[
        //     {
        //         label:'দাওয়াতি কাজে অংশগ্রহণকারী পরিবার সংখ্যা',
        //         name:'total_attended_family',
        //     },
        //     {
        //         label:'কতটি নতুন পরিবারে দাওয়াত পৌঁছানো হয়েছে',
        //         name:'how_many_new_family_invited',
        //     },
        // ]
    }),
    created:function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    },
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

            this.get_data_by_api('ward-department1-talimul-quran', 1);
            this.get_data_by_api('ward-department2-moholla-vittik-dawat', 2);
            this.get_data_by_api('department4-different-job-holders-dawat', 4);
            this.get_data_by_api('department5-paribarik-dawat', 5);
            // this.get_data_by_api('dawat4-gono-songjog-and-dawat-ovijan', 4);
        }
    }

}
</script>

<style>

</style>
