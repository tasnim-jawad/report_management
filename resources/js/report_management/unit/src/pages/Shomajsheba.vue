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
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'shomajsheba1-personal-social-work'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>২. ইউনিটের উদ্যোগে সামাজিক কাজ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'shomajsheba2-unit-social-work'" :unique_key="2"></form-input>
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
        fields1:[
            {
                label:'মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন',
                name:'how_many_people_did',
            },
            {
                label:'মোট সেবাপ্রাপ্ত সংখ্যা',
                name:'service_received_total',
            },


        ],
        fields2:[
            {
                label:'সামাজিক অনুষ্ঠানে অংশগ্রহন',
                name:'shamajik_onusthane_ongshogrohon',
            },
            {
                label:'সামাজিক অনুষ্ঠানে সহায়তা প্রদান',
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
                label:'কর্জে হাসানা প্রদান (কতজনকে)',
                name:'korje_hasana_prodan',
            },
            {
                label:'রোগীর পরিচর্যা প্রদান (কতজনকে) ',
                name:'rogir_poricorja',
            },
            {
                label:'চিকিৎসা সহায়তা প্রদান (কতজনকে) ',
                name:'medical_shohayota_prodan',
            },
            {
                label:'নবজাতককে গিফ্ট প্রদান (কতজনকে)',
                name:'nobojatokke_gift_prodan',
            },
            {
                label:'স্বেচ্ছায় রক্ত দান (কতজন)',
                name:'voluntarily_blood_donation_kotojon',
            },
            {
                label:'স্বেচ্ছায় রক্ত দান (কতজনকে) ',
                name:'voluntarily_blood_donation_kotojonke',
            },
            {
                label:'মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন)',
                name:'matrikalin_sheba_prodan_kotojon',
            },
            {
                label:'মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজনকে) ',
                name:'matrikalin_sheba_prodan_kotojonke',
            },
            {
                label:'মাইয়্যেতের গোসল (কতজনকে)',
                name:'mayeter_gosol',
            },
            {
                label:'অন্যান্য',
                name:'others',
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

            this.get_data_by_api('shomajsheba1-personal-social-work', 1);
            this.get_data_by_api('shomajsheba2-unit-social-work', 2);
        }
    }

}
</script>

<style>

</style>
