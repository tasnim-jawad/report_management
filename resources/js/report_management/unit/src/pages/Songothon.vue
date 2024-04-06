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
                <h1>১. জনশক্তি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'songothon1-jonosokti'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>২. সহযোগী সদস্য ও ভিন্নধর্মাবলম্বী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
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
    </div>
</template>

<script>
import FormInput from '../components/FormInput.vue'
export default {
    components: { FormInput },
    data: ()=>({
        month: null,
        fields1:[
            {
                label:'সদস্য (রুকন) বিগত মাসের সংখ্যা',
                name:'rokon_previous',
            },
            {
                label:'সদস্য (রুকন) বর্তমান সংখ্যা',
                name:'rokon_present',
            },
            {
                label:'সদস্য (রুকন) বৃদ্ধি',
                name:'rokon_briddhi',
            },
            {
                label:'সদস্য (রুকন) ঘাটতি',
                name:'rokon_gatti',
            },
            {
                label:'সদস্য (রুকন) টার্গেট',
                name:'rokon_target',
            },
            {
                label:'কর্মী বিগত মাসের সংখ্যা',
                name:'worker_previous',
            },
            {
                label:'কর্মী বর্তমান সংখ্যা',
                name:'worker_present',
            },
            {
                label:'কর্মী বৃদ্ধি',
                name:'worker_briddhi',
            },
            {
                label:'কর্মী ঘাটতি',
                name:'worker_gatti',
            },
            {
                label:'কর্মী টার্গেট',
                name:'worker_target',
            },


        ],
        fields2:[
            {
                label:'সহযোগী সদস্য বিগত মাসের সংখ্যা',
                name:'associate_member_previous',
            },
            {
                label:'সহযোগী সদস্য বর্তমান সংখ্যা',
                name:'associate_member_present',
            },
            {
                label:'সহযোগী সদস্য বৃদ্ধি',
                name:'associate_member_briddhi',
            },
            {
                label:'সহযোগী সদস্য টার্গেট',
                name:'associate_member_target',
            },
            {
                label:'ভিন্নধর্মাবলম্বী কর্মী বিগত মাসের সংখ্যা',
                name:'vinno_dormalombi_worker_previous',
            },
            {
                label:'ভিন্নধর্মাবলম্বী কর্মী বর্তমান সংখ্যা',
                name:'vinno_dormalombi_worker_present',
            },
            {
                label:'ভিন্নধর্মাবলম্বী কর্মী বৃদ্ধি',
                name:'vinno_dormalombi_worker_briddhi',
            },
            {
                label:'ভিন্নধর্মাবলম্বী কর্মী টার্গেট',
                name:'vinno_dormalombi_worker_target',
            },
            {
                label:'ভিন্নধর্মাবলম্বী সহযোগী সদস্য বিগত মাসের সংখ্যা',
                name:'vinno_dormalombi_associate_member_previous',
            },
            {
                label:'ভিন্নধর্মাবলম্বী সহযোগী সদস্য বর্তমান সংখ্যা',
                name:'vinno_dormalombi_associate_member_present',
            },
            {
                label:'ভিন্নধর্মাবলম্বী সহযোগী সদস্য বৃদ্ধি',
                name:'vinno_dormalombi_associate_member_briddhi',
            },
            {
                label:'ভিন্নধর্মাবলম্বী সহযোগী সদস্য টার্গেট',
                name:'vinno_dormalombi_associate_member_target',
            },


        ],
        fields3:[
            {
                label:'মাসিক কর্মী বৈঠক সংখ্যা',
                name:'unit_kormi_boithok_total',
            },
            {
                label:'মাসিক কর্মী বৈঠক মোট উপস্থিতি',
                name:'unit_kormi_boithok_uposthiti',
            },
        ],
        fields4:[
            {
                label:'পারিবারিক ইউনিট সংখ্যা',
                name:'paribarik_unit_total',
            },
            {
                label:'পারিবারিক ইউনিট মোট উপস্থিতি',
                name:'paribarik_unit_uposthiti',
            },
            {
                label:'পারিবারিক ইউনিট বৃদ্ধি',
                name:'paribarik_unit_target',
            },
        ],
        fields5:[
            {
                label:'ঊর্ধ্বতন দায়িত্বশীলদের সফর সংখ্যা',
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
