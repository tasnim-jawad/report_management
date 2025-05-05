<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0">
                মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>রাজনৈতিক ব্যক্তিবর্গ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rajnoitik_bekti" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio1-political-communication'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রশাসনিক ব্যক্তিবর্গ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in proshoshonik_bekti" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio1-political-communication'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">২. কর্মসূচি বাস্তবায়ন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কেন্দ্র ঘোষিত রাজনৈতিক কর্মসূচি পালন:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in centrally_announced_political_program" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্থানীয়ভাবে ঘোষিত কর্মসূচি : জনসভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in locally_announced_jonoshova" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্থানীয়ভাবে ঘোষিত কর্মসূচি : সমাবেশ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in locally_announced_shomabesh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্থানীয়ভাবে ঘোষিত কর্মসূচি : মিছিল:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in locally_announced_michil" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in others" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৩. জাতীয় ও আন্তর্জাতিক দিবস পালন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্বাধীনতা ও জাতীয় দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shadhinota_o_jatio_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিজয় দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in bijoy_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>আন্তর্জাতিক মাতৃভাষা দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in mattrivasha_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অন্যান্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in others_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কাউন্সিলর:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in councilor_candidate" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মেম্বার:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in member_candidate" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট ভোট কেন্দ্র (জাতীয়):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in national_vote_kendro" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট ভোট কেন্দ্র (স্থানীয়):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in local_vote_kendro" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ভোট কেন্দ্র কমিটি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vote_kendro_committee" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কেন্দ্র/ বুথভিত্তিক ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vote_kendro_vittik_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in election_management" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>


        <previous-next
                :prev-route="{ name: 'Shomajsheba' }"
                :next-route="{ name: 'BmEntryAll' }"
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
        rajnoitik_bekti:[
            {
                label:'মোট কতজন যোগাযোগ করেছেন',
                name:'rajnoitik_bekti_jogajog_koreche_kotojon',
            },
            {
                label:'মোট কতজনের সাথে যোগাযোগ হয়েছে',
                name:'rajnoitik_bekti_jogajog_koreche_kotojonke',
            },
        ],
        proshoshonik_bekti:[
            {
                label:'মোট কতজন যোগাযোগ করেছেন',
                name:'proshoshonik_bekti_jogajog_koreche_kotojon',
            },
            {
                label:'মোট কতজনের সাথে যোগাযোগ হয়েছে',
                name:'proshoshonik_bekti_jogajog_koreche_kotojonke',
            },
        ],

        centrally_announced_political_program:[
            {
                label:'মোট সংখ্যা',
                name:'centrally_announced_political_program',
            },
            {
                label:'উপস্থিতি',
                name:'centrally_announced_political_program_attend',
            },
        ],
        locally_announced_jonoshova:[
            {
                label:'মোট সংখ্যা',
                name:'locally_announced_jonoshova',
            },
            {
                label:'উপস্থিতি',
                name:'locally_announced_jonoshova_attend',
            },
        ],
        locally_announced_shomabesh:[
            {
                label:'মোট সংখ্যা',
                name:'locally_announced_shomabesh',
            },
            {
                label:'উপস্থিতি',
                name:'locally_announced_shomabesh_attend',
            },
        ],
        locally_announced_michil:[
            {
                label:'মোট সংখ্যা',
                name:'locally_announced_michil',
            },
            {
                label:'উপস্থিতি',
                name:'locally_announced_michil_attend',
            },
        ],

        others:[
            {
                label:'পোস্টার বিতরণ',
                name:'poster_bitoron',
            },
            {
                label:'লিফলেট বিতরণ',
                name:'leaflet_bitoron',
            },
            {
                label:'বুকলেট বিতরণ',
                name:'booklet_bitoron',
            },
            {
                label:'স্মারকলিপি বিতরণ',
                name:'sharoklipi_bitoron',
            },
            {
                label:'অন্যান্য',
                name:'others',
            },
        ],



        shadhinota_o_jatio_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'shadhinota_o_jatio_dibosh_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'shadhinota_o_jatio_dibosh_attend',
            },
        ],
        bijoy_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'bijoy_dibosh_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'bijoy_dibosh_attend',
            },
        ],
        mattrivasha_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'mattrivasha_dibosh_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'mattrivasha_dibosh_attend',
            },
        ],
        others_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'others_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'others_attend',
            },
        ],


        councilor_candidate:[
            {
                label:'মোট প্রার্থী সংখ্যা',
                name:'councilor_candidate',
            },
            {
                label:'নির্বাচিত সংখ্যা',
                name:'councilor_candidate_elected',
            },
            {
                label:'দ্বিতীয় অবস্থান',
                name:'councilor_candidate_second_position',
            },
        ],
        member_candidate:[
            {
                label:'মোট প্রার্থী সংখ্যা',
                name:'member_candidate',
            },
            {
                label:'নির্বাচিত সংখ্যা',
                name:'member_candidate_elected',
            },
            {
                label:'দ্বিতীয় অবস্থান',
                name:'member_candidate_second_position',
            },
        ],

        national_vote_kendro:[
            // {
            //     label:'সংখ্যা',
            //     name:'national_vote_kendro',
            // },
            {
                label:'বৃদ্ধি',
                name:'national_vote_kendro_increase',
            },
            {
                label:'টার্গেট',
                name:'national_vote_kendro_target',
            },
        ],
        local_vote_kendro:[
            // {
            //     label:'সংখ্যা',
            //     name:'local_vote_kendro',
            // },
            {
                label:'বৃদ্ধি',
                name:'local_vote_kendro_increase',
            },
            {
                label:'টার্গেট',
                name:'local_vote_kendro_target',
            },
        ],
        vote_kendro_committee:[
            // {
            //     label:'সংখ্যা',
            //     name:'vote_kendro_committee',
            // },
            {
                label:'বৃদ্ধি',
                name:'vote_kendro_committee_increase',
            },
            {
                label:'টার্গেট',
                name:'vote_kendro_committee_target',
            },
        ],
        vote_kendro_vittik_unit:[
            // {
            //     label:'সংখ্যা',
            //     name:'vote_kendro_vittik_unit',
            // },
            {
                label:'বৃদ্ধি',
                name:'vote_kendro_vittik_unit_increase',
            },
            {
                label:'টার্গেট',
                name:'vote_kendro_vittik_unit_target',
            },
        ],
        election_management:[
            {
                label:'নির্বাচন পরিচালনা কমিটির বৈঠক সংখ্যা',
                name:'election_management_committee_meeting',
            },
        ],
    }),
    created:function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        if(this.month != null){
            this.get_monthly_data();
        }
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
            let els = document.querySelectorAll('input[type="number"]');
            els = [...els].forEach(e => e.value = '');

            this.get_data_by_api('ward-rastrio1-political-communication', 1);
            this.get_data_by_api('ward-rastrio2-kormoshuchi-bastobayon', 2);
            this.get_data_by_api('ward-rastrio3-dibosh-palon', 3);
            this.get_data_by_api('ward-rastrio4-election-activitie', 4);
        }
    }

}
</script>

<style>

</style>
