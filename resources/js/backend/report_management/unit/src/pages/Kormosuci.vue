<template>
    <div  class="max_with_550_auto">
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
                <h1>মাসিক সাধারণ সভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ব্যক্তিগত ইফতার মাহফিল:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সাংগঠনিক ইফতার মাহফিল:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>চা চক্র:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সামষ্টিক খাওয়া:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'kormosuci-bastobayon'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>শিক্ষা সফর:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'kormosuci-bastobayon'" :unique_key="1"></form-input>
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
        fields3:[
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
        fields4:[
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
        fields5:[
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
        fields6:[
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

            this.get_data_by_api('kormosuci-bastobayon', 1);
        }
    }

}
</script>

<style>

</style>
