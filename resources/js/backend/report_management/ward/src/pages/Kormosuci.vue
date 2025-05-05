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
                <h1 class="fw-semibold">ঘ) কর্মসূচি বাস্তবায়ন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে মাসিক সাধারণ সভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দাওয়াতি সভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>আলোচনা সভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সুধী সমাবেশ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সীরাতুন্নবী (সাঃ) মাহফিল:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ঈদ পুনর্মিলনী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দারস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields7" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>তাফসীর:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields8" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দাওয়াতি জনসভা ও ইসলামী মাহফিল:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields9" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইফতার মাহফিল (ব্যক্তিগত) :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields10" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইফতার মাহফিল (সাংগঠনিক)	:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields11" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>চা চক্র :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields12" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সামষ্টিক খাওয়া :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields13" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শিক্ষা সফর :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields14" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কিরাত প্ৰতিযোগিতা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields15" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>হামদ না'ত প্ৰতিযোগিতা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields16" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অন্যান্য :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields17" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'ward-kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <previous-next
                :prev-route="{ name: 'DawahAndProkashona' }"
                :next-route="{ name: 'Songothon' }"
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
                label:'সংখ্যা',
                name:'unit_masik_sadaron_sova_total',
            },
            {
                label:'টার্গেট',
                name:'unit_masik_sadaron_sova_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'unit_masik_sadaron_sova_uposthiti',
            },

        ],
        fields2:[
            {
                label:'সংখ্যা',
                name:'dawati_sova_total',
            },
            {
                label:'টার্গেট',
                name:'dawati_sova_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'dawati_sova_uposthiti',
            },
        ],
        fields3:[
            {
                label:'সংখ্যা',
                name:'alochona_sova_total',
            },
            {
                label:'টার্গেট',
                name:'alochona_sova_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'alochona_sova_uposthiti',
            },
        ],
        fields4:[
            {
                label:'সংখ্যা',
                name:'sudhi_somabesh_total',
            },
            {
                label:'টার্গেট',
                name:'sudhi_somabesh_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'sudhi_somabesh_uposthiti',
            },
        ],
        fields5:[
            {
                label:'সংখ্যা',
                name:'siratunnabi_mahfil_total',
            },
            {
                label:'টার্গেট',
                name:'siratunnabi_mahfil_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'siratunnabi_mahfil_uposthiti',
            },
        ],
        fields6:[
            {
                label:'সংখ্যা',
                name:'eid_reunion_total',
            },
            {
                label:'টার্গেট',
                name:'eid_reunion_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'eid_reunion_uposthiti',
            },
        ],
        fields7:[
            {
                label:'সংখ্যা',
                name:'dars_total',
            },
            {
                label:'টার্গেট',
                name:'dars_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'dars_uposthiti',
            },
        ],
        fields8:[
            {
                label:'সংখ্যা',
                name:'tafsir_total',
            },
            {
                label:'টার্গেট',
                name:'tafsir_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'tafsir_uposthiti',
            },
        ],
        fields9:[
            {
                label:'সংখ্যা',
                name:'dawati_jonosova_total',
            },
            {
                label:'টার্গেট',
                name:'dawati_jonosova_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'dawati_jonosova_uposthiti',
            },
        ],
        fields10:[
            {
                label:'সংখ্যা',
                name:'iftar_mahfil_personal_total',
            },
            {
                label:'টার্গেট',
                name:'iftar_mahfil_personal_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'iftar_mahfil_personal_uposthiti',
            },
        ],
        fields11:[
            {
                label:'সংখ্যা',
                name:'iftar_mahfil_samostic_total',
            },
            {
                label:'টার্গেট',
                name:'iftar_mahfil_samostic_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'iftar_mahfil_samostic_uposthiti',
            },
        ],
        fields12:[
            {
                label:'সংখ্যা',
                name:'cha_chakra_total',
            },
            {
                label:'টার্গেট',
                name:'cha_chakra_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'cha_chakra_uposthiti',
            },
        ],
        fields13:[
            {
                label:'সংখ্যা',
                name:'samostic_khawa_total',
            },
            {
                label:'টার্গেট',
                name:'samostic_khawa_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'samostic_khawa_uposthiti',
            },
        ],
        fields14:[
            {
                label:'সংখ্যা',
                name:'sikkha_sofor_total',
            },
            {
                label:'টার্গেট',
                name:'sikkha_sofor_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'sikkha_sofor_uposthiti',
            },
        ],
        fields15:[
            {
                label:'সংখ্যা',
                name:'kirat_protijogita_total',
            },
            {
                label:'টার্গেট',
                name:'kirat_protijogita_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'kirat_protijogita_uposthiti',
            },
        ],
        fields16:[
            {
                label:'সংখ্যা',
                name:'hamd_nat_protijogita_total',
            },
            {
                label:'টার্গেট',
                name:'hamd_nat_protijogita_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'hamd_nat_protijogita_uposthiti',
            },
        ],
        fields17:[
            {
                label:'সংখ্যা',
                name:'others_total',
            },
            {
                label:'টার্গেট',
                name:'others_target',
            },
            {
                label:'মোট উপস্থিতি',
                name:'others_uposthiti',
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

            this.get_data_by_api('ward-kormosuci-bastobayon', 1);
        }
    }

}
</script>

<style>

</style>
