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
                <h1 class="fw-semibold">ঘ) সংগঠন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>১. জনশক্তি - সদস্য (রুকন)::</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rokon" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon1-jonosokti'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>১. জনশক্তি - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon1-jonosokti'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>২. সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shohojogi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon2-associate-member'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>২. ভিন্নধর্মাবলম্বী - কর্মী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vinno_dormalombi_kormi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon2-associate-member'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>২. ভিন্নধর্মাবলম্বী - সহযোগী সদস্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vinno_dormalombi_shohojogi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon2-associate-member'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>৩. মাসিক কর্মী বৈঠক:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon9-sangothonik-boithok'" :unique_key="9"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>৪. পারিবারিক ইউনিট:</h1>
            </div>
            <div class="card-body" v-if="month">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon5-dawat-and-paribarik-unit'" :unique_key="5"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>৫. ঊর্ধ্বতন দায়িত্বশীলদের সফর:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon7-sofor'" :unique_key="7"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>৬. ইয়ানত দাতা বৃদ্ধি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon8-iyanot-data'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>
        <previous-next
                :prev-route="{ name: 'Kormosuci' }"
                :next-route="{ name: 'Proshikkhon' }"
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
        // month: null,
        rokon:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'rokon_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'rokon_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'rokon_briddhi',
            },
            {
                label:'ঘাটতি',
                name:'rokon_gatti',
            },
            {
                label:'টার্গেট',
                name:'rokon_target',
            },
        ],
        kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'worker_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'worker_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'worker_briddhi',
            },
            {
                label:'ঘাটতি',
                name:'worker_gatti',
            },
            {
                label:'টার্গেট',
                name:'worker_target',
            },


        ],
        shohojogi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'associate_member_briddhi',
            },
            {
                label:'টার্গেট',
                name:'associate_member_target',
            },
        ],
        vinno_dormalombi_kormi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'vinno_dormalombi_worker_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'vinno_dormalombi_worker_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'vinno_dormalombi_worker_briddhi',
            },
            {
                label:'টার্গেট',
                name:'vinno_dormalombi_worker_target',
            },
        ],
        vinno_dormalombi_shohojogi:[
            // {
            //     label:'বিগত মাসের সংখ্যা',
            //     name:'vinno_dormalombi_associate_member_previous',
            // },
            // {
            //     label:'বর্তমান সংখ্যা',
            //     name:'vinno_dormalombi_associate_member_present',
            // },
            {
                label:'বৃদ্ধি',
                name:'vinno_dormalombi_associate_member_briddhi',
            },
            {
                label:'টার্গেট',
                name:'vinno_dormalombi_associate_member_target',
            },

        ],
        fields3:[
            {
                label:'সংখ্যা',
                name:'unit_kormi_boithok_total',
            },
            {
                label:'মোট উপস্থিতি',
                name:'unit_kormi_boithok_uposthiti',
            },
        ],
        fields4:[
            {
                label:'সংখ্যা',
                name:'paribarik_unit_total',
            },
            {
                label:'বৃদ্ধি',
                name:'paribarik_unit_increase',
            },
            {
                label:'টার্গেট',
                name:'paribarik_unit_target',
            },
        ],
        fields5:[
            {
                label:'সংখ্যা',
                name:'upper_leader_sofor',
            },
        ],
        fields6:[
            {
                label:'সহযোগী সদস্য সংখ্যা',
                name:'associate_member_total',
            },
            {
                label:'সহযোগী সদস্য টাকার পরিমাণ',
                name:'associate_member_total_iyanot_amounts',
            },
            {
                label:'সুধী সংখ্যা',
                name:'sudhi_total',
            },
            {
                label:'সুধী টাকার পরিমাণ',
                name:'sudi_total_iyanot_amounts',
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

            this.get_data_by_api('songothon1-jonosokti', 1);
            this.get_data_by_api('songothon2-associate-member', 2);
            this.get_data_by_api('songothon9-sangothonik-boithok', 9);
            this.get_data_by_api('songothon5-dawat-and-paribarik-unit', 5);
            this.get_data_by_api('songothon7-sofor', 7);
            this.get_data_by_api('songothon8-iyanot-data', 8);
        }
    }

}
</script>

<style>

</style>
