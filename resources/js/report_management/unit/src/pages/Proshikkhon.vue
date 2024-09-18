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
                <h1>সহীহ কুরআন অনুশীলন :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মাসয়ালা-মাসায়েল :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দারসে কুরআন :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দারসে হাদীস :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সামষ্টিক পাঠ :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিষয়ভিত্তিক আলোচনা :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
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
        fields1:[
            {
                label:'সংখ্যা',
                name:'sohi_quran_onushilon',
            },
            {
                label:'টার্গেট',
                name:'sohi_quran_onushilon_target',
            },
            {
                label:'উপস্থিতি',
                name:'sohi_quran_onushilon_uposthiti',
            },
        ],
        fields2:[
            {
                label:'সংখ্যা',
                name:'masala_masayel',
            },
            {
                label:'টার্গেট',
                name:'masala_masayel_target',
            },
            {
                label:'উপস্থিতি',
                name:'masala_masayel_uposthiti',
            },
        ],
        fields3:[
            {
                label:'সংখ্যা',
                name:'darsul_quran',
            },
            {
                label:'টার্গেট',
                name:'darsul_quran_target',
            },
            {
                label:'উপস্থিতি',
                name:'darsul_quran_uposthiti',
            },
        ],
        fields4:[
            {
                label:'সংখ্যা',
                name:'darsul_hadis',
            },
            {
                label:'টার্গেট',
                name:'darsul_hadis_target',
            },
            {
                label:'উপস্থিতি',
                name:'darsul_hadis_uposthiti',
            },
        ],
        fields5:[
            {
                label:'সংখ্যা',
                name:'samostik_path',
            },
            {
                label:'টার্গেট',
                name:'samostik_path_target',
            },
            {
                label:'উপস্থিতি',
                name:'samostik_path_uposthiti',
            },
        ],
        fields6:[
            {
                label:'সংখ্যা',
                name:'bishoy_vittik_onushilon',
            },
            {
                label:'টার্গেট',
                name:'bishoy_vittik_onushilon_target',
            },
            {
                label:'উপস্থিতি',
                name:'bishoy_vittik_onushilon_uposthiti',
            },
        ],
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

            this.get_data_by_api('proshikkhon1-tarbiat', 1);
        }
    }

}
</script>

<style>

</style>
