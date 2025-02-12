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
                <h1 class="fw-semibold">সমাজ সংস্কার ও সমাজসেবা:</h1>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in personal_shomajsheba" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-shomajsheba1-personal-social-work'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">২. সামষ্টিক/সেবা টিমের মাধ্যমে সামাজিক কাজ (প্রযোজ্য ক্ষেত্রে):</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in service_teams" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-shomajsheba2-group-social-work'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in group_social_works" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-shomajsheba2-group-social-work'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৩. স্বাস্থ্য ও পরিবার কল্যাণমূলক কাজ:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in health_and_family" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-shomajsheba3-health-and-family-kollan'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৪. প্রাতিষ্ঠানিক উদ্যোগে সামাজিক কাজ:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shamajik_protishthan" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-shomajsheba4-institutional-social-work'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>

        <previous-next
                :prev-route="{ name: 'Proshikkhon' }"
                :next-route="{ name: 'Rastrio' }"
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

//         ১. প্রশিক্ষিত সমাজকর্মী তৈরি (প্রশিক্ষিত সমাজকর্মী বলতে কেন্দ্রীয় মডিউলের আলোকে সমাজকর্ম মাস্টার ট্রেইনার দ্বারা প্রশিক্ষণপ্রাপ্ত জনশক্তিকেই বুঝানো হয়েছে): এ বছর কতজন প্রশিক্ষণ কোর্স সম্পন্ন করেছে
// মোট প্রশিক্ষিত সমাজকর্মী সংখ্যা
// এ বছর কয়টি প্রশিক্ষণ কোর্স হয়েছে
// টার্গেট
// টার্গেট
        // ১. প্রশিক্ষিত সমাজকর্মী তৈরি:
        trained_social_worker:[
            {
                label:'মোট প্রশিক্ষিত সমাজকর্মী সংখ্যা',
                name:'trained_social_worker',
            },
            {
                label:' এ বছর কয়টি প্রশিক্ষণ কোর্স হয়েছে',
                name:'training_courses_this_year_total',
            },
            {
                label:'প্রশিক্ষণ কোর্স টার্গেট',
                name:'training_courses_this_year_target',
            },
            {
                label:'এ বছর কতজন প্রশিক্ষণ কোর্স সম্পন্ন করেছে',
                name:'people_completed_training_courses_this_year_total',
            },
            {
                label:'কোর্স সম্পন্ন কারী টার্গেট',
                name:'people_completed_training_courses_this_year_target',
            },
        ],

        personal_shomajsheba:[
            {
                label:'মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন',
                name:'how_many_people_did',
            },
            {
                label:'মোট সেবাপ্রাপ্ত সংখ্যা',
                name:'service_received_total',
            },
        ],

        service_teams:[
            {
                label:'সাধারণ সেবা টিম সংখ্যা',
                name:'general_service_team',
            },
            {
                label:'টেকনিক্যাল সেবা টিম সংখ্যা',
                name:'technical_service_team',
            },
            {
                label:'স্বেচ্ছাসেবক টিম সংখ্যা',
                name:'volunteer_team',
            },

        ],
        group_social_works:[

            {
                label:'ছোট-ছোট উন্নয়নমূলক কাজ',
                name:'minor_unnoyonmulok_kaj',
            },
            {
                label:'সামাজিক অনুষ্ঠানে অশংগ্রহণ সংখ্যা',
                name:'shamajik_onusthane_ongshogrohon',
            },
            {
                label:'সামাজিক অনুষ্ঠানে সহায়তা প্রদান কতজনকে',
                name:'shamajik_onusthane_shohayota_prodan',
            },
            {
                label:'সামাজিক বিরোধ মীমাংসা',
                name:'shamajik_birodh_mimangsha',
            },
            {
                label:'মানবিক সহায়তা প্রদান (কতজনকে)',
                name:'manobik_shohayota_prodan',
            },
            {
                label:'কর্জে হাসানা প্রদান (কতজনকে )',
                name:'korje_hasana_prodan',
            },
            {
                label:'পরিষ্কার-পরিচ্ছন্নতা অভিযান',
                name:'porishkar_poricchonnota_ovijan',
            },
            {
                label:'মশক নিধন অভিযান',
                name:'moshok_nidhon_ovijan',
            },
            {
                label:'রোগীর পরিচর্যা (কতজনকে)',
                name:'rogir_poricorja',
            },
            {
                label:'চিকিৎসা সহায়তা প্রদান (কতজনকে)',
                name:'medical_shohayota_prodan',
            },
            {
                label:'স্বেচ্ছায় রক্ত দান (কতজন)',
                name:'voluntarily_blood_donation_kotojon',
            },
            {
                label:'স্বেচ্ছায় রক্ত দান (কতজনকে)',
                name:'voluntarily_blood_donation_kotojonke',
            },
            {
                label:'মাতৃত্বকালীন সময়ে সেবা প্রদান (মোট কতজনকে)',
                name:'mattrikalin_sheba_prodan',
            },
            {
                label:'নবজাতককে গিফ্‌ট প্রদান (কতজনকে)',
                name:'nobojatokke_gift_prodan',
            },
            {
                label:'মেডিক্যাল ক্যাম্প (মোট কতটি)',
                name:'medical_camp',
            },
            {
                label:'ভ্রাম্যমান স্কুল চালু',
                name:'vrammoman_school_calu',
            },
            {
                label:'ভ্রাম্যমান মক্তব চালু',
                name:'vrammoman_moktob_calu',
            },



            {
                label:'শিক্ষা সহায়তা প্রদান (মোট কতজনকে)',
                name:'shikkha_shohayota_prodan',
            },
            {
                label:'টেকনিক্যাল সেবা প্রদান (কতজন )',
                name:'technical_services_kotojon',
            },
            {
                label:'টেকনিক্যাল সেবা প্রদান (কতজনকে)',
                name:'technical_services_prodan_kotojonke',
            },
            {
                label:'অনলাইনের মাধ্যমে সেবা প্রদান (কতজনকে)',
                name:'online_services_prodan_kotojonke',
            },
            {
                label:'বৃক্ষরোপন (কতটি)',
                name:'brikkho_ropon',
            },
            {
                label:'জনসচেতনতামূলক প্রোগ্রাম (কতটি)',
                name:'public_awareness_programs',
            },
            {
                label:'দুর্যোগকালীন সহায়তা প্রদান (মোট কতজনকে)',
                name:'durjog_kalin_shohayota_prodan',
            },
            {
                label:'ত্রাণ বিতরণ (কতজনকে)',
                name:'tran_bitoron',
            },
            {
                label:'ভিন্নধর্মাবলম্বীদের সেবা প্রদান (কতজন)',
                name:'vinnodhormabolombider_service_prodan_kotojon',
            },
            {
                label:'ভিন্নধর্মাবলম্বীদের সেবা প্রদান (কতজনকে)',
                name:'vinnodhormabolombider_service_prodan_kotojonke',
            },
            {
                label:'মাইয়্যেতের গোসল (কতজনকে )',
                name:'mayeter_gosol_kotojonke',
            },
            {
                label:'জানাযায় অংশগ্রহণ',
                name:'janajay_ongshogrohon',
            },
            {
                label:'স্বল্প পুঁজিতে কর্মসংস্থানের সহায়তা (কতজনকে)',
                name:'low_capital_employment_kotojonke',
            },
            {
                label:'অন্যান্য',
                name:'others',
            },
        ],






        shomajsheba4_social_institution:[
            {
                label:'মোট সংখ্যা',
                name:'social_institution',
            },
            {
                label:'কতটি সাংগঠনিক থানায়',
                name:'social_institution_in_thana',
            },
            {
                label:'কতটি সাংগঠনিক ওয়ার্ডে',
                name:'social_institution_in_ward',
            },
        ],
        shomajsheba4_institutional_social_work:[
            {
                label:'মোট সংখ্যা',
                name:'institutional_social_work',
            },
            {
                label:'কতটি সাংগঠনিক থানায়',
                name:'institutional_social_work_in_thana',
            },
            {
                label:'কতটি সাংগঠনিক ওয়ার্ডে',
                name:'institutional_social_work_in_ward',
            },
        ],
        shomajsheba4_new_social_institutions:[
            {
                label:'মোট সংখ্যা',
                name:'new_social_institutions',
            },
            {
                label:'কতটি সাংগঠনিক থানায়',
                name:'new_social_institutions_in_thana',
            },
            {
                label:'কতটি সাংগঠনিক ওয়ার্ডে',
                name:'new_social_institutions_in_ward',
            },
        ],


        // ৫. স্বাস্থ্য ও পরিবার কল্যাণমূলক কাজ
        health_and_family:[
            {
                label:'স্বাস্থ্যকর্মী তৈরি সংখ্যা',
                name:'served_people',
            },
            {
                label:'নার্স তৈরি সংখ্যা',
                name:'served_people',
            },
            {
                label:'ধাত্রী তৈরি সংখ্যা',
                name:'served_people',
            },
            {
                label:'প্যারেন্টিং প্রশিক্ষণ প্রোগ্রাম সংখ্যা',
                name:'served_people',
            },
            {
                label:'স্বাস্থ্য শিক্ষামূলক প্রশিক্ষণ প্রোগ্রাম সংখ্যা',
                name:'served_people',
            },
            {
                label:'মোট অংশগ্রহণকারীর সংখ্যা',
                name:'health_worker_training_programs_attendance',
            },
            {
                label:'কতজন স্বাস্থ্যসেবা কাজে অংশগ্রহণ করেছেন',
                name:'participated_in_health_care_work',
            },
            {
                label:'সেবাপ্রাপ্ত সংখ্যা',
                name:'served_people',
            },

        ],

        // ৬. শিক্ষা ও গবেষণামূলক কার্যক্রম: 
        shomajsheba6_education_and_research:[
            {
                label:'আদর্শ শিক্ষক তৈরি',
                name:'ideal_teacher_produced',
            },
            {
                label:'শিক্ষা সেমিনার',
                name:'shikkha_seminar',
            },
            {
                label:'আলোচনা সভা',
                name:'alochona_shova',
            },
            {
                label:'অন্যান্য',
                name:'other',
            },

        ],

        // ৭. সামাজিক কাজের জন্য মোট আয়ের কত শতাংশ ব্যয় হয়েছে :
        shomajsheba7_expenses:[
            {
                label:'কত শতাংশ',
                name:'percentage_of_expense',
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
            let els = document.querySelectorAll('input[type="text"]');
            els = [...els].forEach(e => e.value = '');

            this.get_data_by_api('ward-shomajsheba1-personal-social-work', 1);
            this.get_data_by_api('ward-shomajsheba2-group-social-work', 2);
            this.get_data_by_api('ward-shomajsheba3-health-and-family-kollan', 3);
            this.get_data_by_api('ward-shomajsheba4-institutional-social-work', 4);
        }
    }

}
</script>

<style>

</style>
