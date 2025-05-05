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
                <h1 class="fw-semibold">প্রশিক্ষণ:</h1>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">ক) তারবিয়াত (নৈতিক শিক্ষা ও সাংগঠনিক প্রশিক্ষণ):</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে তারবিয়াতী বৈঠক :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in unit_tarbiati_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ডভিত্তিক কর্মী শিক্ষা বৈঠক :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in ward_kormi_sikkha_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ঊর্ধ্বতন সংগঠনের শিক্ষাশিবিরে অংশগ্রহণকারী :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in urdhotono_sikkha_shibir" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ঊর্ধ্বতন সংগঠনের শিক্ষা বৈঠকে অংশগ্রহণকারী :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in urdhotono_sikkha_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গণশিক্ষা বৈঠক :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in gono_sikkha_boithok" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>গণ নৈশ ইবাদত :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in gono_noisho_ibadot" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>আলোচনা চক্র :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in alochona_chokro" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দারসুল কুরআন অনুশীলন :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in darsul_quran" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সহীহ কুরআন তিলাওয়াত অনুশীলন :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sohih_tilawat" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">খ) মানব সম্পদ উন্নয়ন কোর্সসমূহ:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in manob_shompod_unnoyon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-proshikkhon2-manob-shompod-unnoyon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>



        <previous-next
                :prev-route="{ name: 'Songothon' }"
                :next-route="{ name: 'Shomajsheba' }"
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

        unit_tarbiati_boithok:[
            {
                label:'মোট সংখ্যা',
                name:'unit_tarbiati_boithok',
            },
            {
                label:'টার্গেট',
                name:'unit_tarbiati_boithok_target',
            },
            {
                label:'উপস্থিতি',
                name:'unit_tarbiati_boithok_uposthiti',
            },
        ],
        ward_kormi_sikkha_boithok:[
            {
                label:'মোট সংখ্যা',
                name:'ward_kormi_sikkha_boithok',
            },
            {
                label:'টার্গেট',
                name:'ward_kormi_sikkha_boithok_target',
            },
            {
                label:'উপস্থিতি',
                name:'ward_kormi_sikkha_boithok_uposthiti',
            },
        ],
        urdhotono_sikkha_shibir:[
            {
                label:'মোট সংখ্যা',
                name:'urdhotono_sikkha_shibir',
            },
            {
                label:'টার্গেট',
                name:'urdhotono_sikkha_shibir_target',
            },
            {
                label:'উপস্থিতি',
                name:'urdhotono_sikkha_shibir_uposthiti',
            },
        ],
        urdhotono_sikkha_boithok:[
            {
                label:'মোট সংখ্যা',
                name:'urdhotono_sikkha_boithok',
            },
            {
                label:'টার্গেট',
                name:'urdhotono_sikkha_boithok_target',
            },
            {
                label:'উপস্থিতি',
                name:'urdhotono_sikkha_boithok_uposthiti',
            },
        ],
        gono_sikkha_boithok:[
            {
                label:'মোট সংখ্যা',
                name:'gono_sikkha_boithok',
            },
            {
                label:'টার্গেট',
                name:'gono_sikkha_boithok_target',
            },
            {
                label:'উপস্থিতি',
                name:'gono_sikkha_boithok_uposthiti',
            },
        ],
        gono_noisho_ibadot:[
            {
                label:'মোট সংখ্যা',
                name:'gono_noisho_ibadot',
            },
            {
                label:'টার্গেট',
                name:'gono_noisho_ibadot_target',
            },
            {
                label:'উপস্থিতি',
                name:'gono_noisho_ibadot_uposthiti',
            },
        ],
        alochona_chokro:[
            {
                label:'গ্রুপ সংখ্যা',
                name:'alochona_chokro_group',
            },
            {
                label:'অধিবেশন সংখ্যা',
                name:'alochona_chokro_program',
            },
            {
                label:'উপস্থিতি',
                name:'alochona_chokro_uposthiti',
            },
        ],
        darsul_quran:[
            {
                label:'প্রোগ্রাম সংখ্যা',
                name:'darsul_quran_program',
            },
            {
                label:'উপস্থিতি',
                name:'darsul_quran_uposthiti',
            },
        ],
        sohih_tilawat:[
            {
                label:'প্রোগ্রাম সংখ্যা',
                name:'sohih_tilawat_program',
            },
            {
                label:'উপস্থিতি',
                name:'sohih_tilawat_uposthiti',
            },
        ],



        manob_shompod_unnoyon:[
            {
                label:'দাওয়াহ - অংশগ্রহণকারীর সংখ্যা',
                name:'dawah_uposthiti',
            },
            {
                label:'সমাজকর্ম - অংশগ্রহণকারীর সংখ্যা',
                name:'shomajkormo_uposthiti',
            },
            {
                label:'মিডিয়া - অংশগ্রহণকারীর সংখ্যা',
                name:'media_uposthiti',
            },
            {
                label:'আইসিটি - অংশগ্রহণকারীর সংখ্যা',
                name:'ict_uposthiti',
            },
            {
                label:'অফিস - অংশগ্রহণকারীর সংখ্যা',
                name:'office_uposthiti',
            },
            {
                label:'ফিন্যান্সিয়াল ম্যানেজমেন্ট - অংশগ্রহণকারীর সংখ্যা',
                name:'financial_management_uposthiti',
            },
            {
                label:'ইংরেজি ভাষা - অংশগ্রহণকারীর সংখ্যা',
                name:'english_language_uposthiti',
            },
            {
                label:'আরবি ভাষা - অংশগ্রহণকারীর সংখ্যা',
                name:'arabic_language_uposthiti',
            },
            {
                label:'ট্রেডভিত্তিক কারিগরি প্রশিক্ষণ - অংশগ্রহণকারীর সংখ্যা',
                name:'trade_oriented_technical_training_uposthiti',
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

            this.get_data_by_api('ward-proshikkhon1-tarbiat', 1);
            this.get_data_by_api('ward-proshikkhon2-manob-shompod-unnoyon', 2);
        }
    }

}
</script>

<style>

</style>
