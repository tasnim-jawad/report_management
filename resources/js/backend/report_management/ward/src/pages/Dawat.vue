<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="row gx-0">
            <div class="card mb-3 ">
                <div class="card-header border-bottom-0">
                    মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-bolder">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদানের তথ্য:</h1>
                    </div>
                </div>
                <div class="card mb-3" v-if="month">
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields8" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload" :endpoint="'ward-dawat5-jonoshadharon'"
                                :unique_key="5"></form-input>
                        </form>
                    </div>
                </div>
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">১. নিয়মিত গ্রুপ ভিত্তিক দাওয়াত:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div v-for="(field, index) in fields1" :key="index">
                                <form-input :label="field.label" :name="field.name" :onchange="dawat_upload"
                                    :endpoint="'ward-dawat1-regular-group-wise'" :unique_key="1"></form-input>

                                <!-- for next version -->

                                <!-- <div class="position-relative">
                                    <popup
                                        :ward_id="1"
                                        :table_name="'dawat1_regular_group_wises'"
                                        :field_title="'how_many_groups_are_out'"
                                        :month="month"
                                        >
                                    </popup>
                                </div> -->

                                <!-- for next version -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'ward-dawat2-personal-and-target'" :unique_key="2"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'ward-dawat3-general-program-and-others'" :unique_key="3"></form-input>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">৪. গণসংযোগ ও দাওয়াতি অভিযান পালন:</h1>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1>গণসংযোগ দশক/পক্ষ:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'ward-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1>জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'ward-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1>নির্বাচনী আসনে গণসংযোগ সপ্তাহ:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'ward-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1>অন্যান্য:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in fields7" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'ward-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <previous-next :next-route="{ name: 'Department' }" :month="month"></previous-next>
        </div>
        <note :notes="notes"></note>
    </div>
</template>

<script>
import axios from 'axios';
import FormInput from '../components/FormInput.vue'
import PreviousNext from '../components/PreviousNext.vue';
import Note from '../components/Note.vue';
import Popup from '../components/Popup.vue';
import { store as data_store } from "../stores/ReportStore";
import { mapState, mapWritableState } from 'pinia';
export default {
    components: { FormInput, PreviousNext, Note, Popup },
    data: () => ({
        // month: null,
        fields1: [
            {
                label: 'কতটি গ্রুপ বের হয়েছে',
                name: 'how_many_groups_are_out',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'number_of_participants',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'how_many_have_been_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছে ',
                name: 'how_many_associate_members_created',
            },
        ],
        fields2: [
            {
                label: 'মোট সদস্য(রুকন) সংখ্যা',
                name: 'total_rokon',
            },
            {
                label: 'মোট কর্মী সংখ্যা ',
                name: 'total_worker',
            },
            {
                label: 'কতজন সদস্য(রুকন) ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
                name: 'how_many_were_give_dawat_rokon',
            },
            {
                label: 'কতজন কর্মী ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
                name: 'how_many_were_give_dawat_worker',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছেন',
                name: 'how_many_have_been_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'how_many_associate_members_created',
            },
        ],
        fields3: [
            {
                label: 'মোট কতজনকে দাওয়াত প্রদান করা হয়েছে',
                name: 'how_many_were_give_dawat',
            },
            {
                label: 'মোট কতজন সহযোগী সদস্য হয়েছেন',
                name: 'how_many_associate_members_created',
            },
        ],
        fields4: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'total_gono_songjog_group',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'total_attended',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'how_many_have_been_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'how_many_associate_members_created',
            },


        ],
        fields5: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'jela_mohanogor_declared_gonosonjog_group',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'jela_mohanogor_declared_gonosonjog_attended',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'jela_mohanogor_declared_gonosonjog_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'jela_mohanogor_declared_gonosonjog_associated_created',
            },
        ],
        fields6: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'election_gono_songjog_group',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'election_attended',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'election_how_many_have_been_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'election_how_many_associate_members_created',
            },
        ],
        fields7: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'other_gono_songjog_group',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'other_attended',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'other_how_many_have_been_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'other_how_many_associate_members_created',
            },
        ],
        fields8: [
            {
                label: 'মোট জনসংখ্যা:',
                name: 'total_population',
            },
        ],
        notes: [
            {
                label: 'বিঃদ্রঃ - ১',
                name: 'এখান থেকে শুরু',
            },
            {
                label: 'বিঃদ্রঃ - ২',
                name: 'চলবে',
            },
        ]
    }),
    created: function () {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        if (this.month != null) {
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

            this.get_data_by_api('ward-dawat1-regular-group-wise', 1);
            this.get_data_by_api('ward-dawat2-personal-and-target', 2);
            this.get_data_by_api('ward-dawat3-general-program-and-others', 3);
            this.get_data_by_api('ward-dawat4-gono-songjog-and-dawat-ovijan', 4);
            this.get_data_by_api('ward-dawat5-jonoshadharon', 5);
        }
    }

}
</script>

<style></style>
