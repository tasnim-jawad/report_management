<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="row gx-0">
            <div class="card mb-3 ">
                <div class="card-header border-bottom-0">
                    মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
                </div>
            </div>
            <div class="px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-bolder">দাওয়াত ও তাবলিগ :</h1>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-bolder">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদানের তথ্য:</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat5_jonoshadharon" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload" :endpoint="'thana-dawat5-jonoshadharon'"
                                :unique_key="5"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">১. ইউনিট নিয়মিত গ্রুপ ভিত্তিক দাওয়াত: (পুরুষ)</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div v-for="(field, index) in dawat1_man" :key="index">
                                <form-input :label="field.label" :name="field.name" :onchange="dawat_upload"
                                    :endpoint="'thana-dawat1-regular-group-wise'" :unique_key="1"></form-input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">১. ইউনিট নিয়মিত গ্রুপ ভিত্তিক দাওয়াত: (মহিলা)</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div v-for="(field, index) in dawat1_woman" :key="index">
                                <form-input :label="field.label" :name="field.name" :onchange="dawat_upload"
                                    :endpoint="'thana-dawat1-regular-group-wise'" :unique_key="1"></form-input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:(পুরুষ)</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat2_jonoshokti_man" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat2-personal-and-target'" :unique_key="2"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h1 class="fw-semibold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:(মহিলা)</h1>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat2_jonoshokti_woman" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat2-personal-and-target'" :unique_key="2"
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
                                :endpoint="'thana-dawat3-general-program-and-others'" :unique_key="3"></form-input>
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
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
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
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
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
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
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
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
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
        dawat5_jonoshadharon: [
            {
                label: 'মোট জনসংখ্যা',
                name: 'total_population',
            },
            {
                label: 'টার্গেট',
                name: 'target',
            },
        ],
        dawat1_man: [
            {
                label: 'কতটি গ্রুপ বের হয়েছে',
                name: 'how_many_groups_are_out_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'number_of_participants_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'how_many_have_been_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছে ',
                name: 'how_many_associate_members_created_man',
            },
        ],
        dawat1_woman: [
            {
                label: 'কতটি গ্রুপ বের হয়েছে',
                name: 'how_many_groups_are_out_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'number_of_participants_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'how_many_have_been_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছে ',
                name: 'how_many_associate_members_created_woman',
            },
        ],
        dawat2_jonoshokti_man: [
            {
                label: 'মোট সদস্য(রুকন) সংখ্যা',
                name: 'total_rokon_man',
            },
            {
                label: 'মোট কর্মী সংখ্যা ',
                name: 'total_worker_man',
            },
        ],
        dawat2_jonoshokti_woman: [
            {
                label: 'মোট সদস্য(রুকন) সংখ্যা',
                name: 'total_rokon_woman',
            },
            {
                label: 'মোট কর্মী সংখ্যা ',
                name: 'total_worker_woman',
            },
        ],
        dawat2_give_dawat_man: [
            {
                label: 'কতজন সদস্য(রুকন) ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
                name: 'how_many_were_give_dawat_rokon_man',
            },
            {
                label: 'কতজন কর্মী ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
                name: 'how_many_were_give_dawat_worker_man',
            },
        ],
        dawat2_give_dawat_woman: [
            {
                label: 'কতজন সদস্য(রুকন) ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
                name: 'how_many_were_give_dawat_rokon_woman',
            },
            {
                label: 'কতজন কর্মী ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
                name: 'how_many_were_give_dawat_worker_woman',
            },
        ],
        dawat2_invited: [
            {
                label: 'পুরুষ',
                name: 'how_many_have_been_invited_man',
            },
            {
                label: 'মহিলা',
                name: 'how_many_have_been_invited_woman',
            },
        ],
        dawat2_associate_created: [
            {
                label: 'পুরুষ',
                name: 'how_many_associate_members_created_man',
            },
            {
                label: 'মহিলা',
                name: 'how_many_associate_members_created_woman',
            },
        ],
        dawat3_give_dawat: [
            {
                label: 'পুরুষ',
                name: 'how_many_were_give_dawat_man',
            },
            {
                label: 'মহিলা',
                name: 'how_many_were_give_dawat_woman',
            },
        ],
        dawat3_associate_created: [
            {
                label: 'পুরুষ',
                name: 'how_many_associate_members_created_man',
            },
            {
                label: 'মহিলা',
                name: 'how_many_associate_members_created_woman',
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
        dawat4_gono_songjog_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'total_gono_songjog_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'total_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'how_many_have_been_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'how_many_associate_members_created_man',
            },
        ],
        dawat4_gono_songjog_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'total_gono_songjog_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'total_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'how_womany_have_been_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'how_womany_associate_members_created_woman',
            },
        ],
        dawat4_jela_mohanogor: [
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
        dawat4_election_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'election_gono_songjog_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'election_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'election_how_many_have_been_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'election_how_many_associate_members_created_man',
            },
        ],
        dawat4_election_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'election_gono_songjog_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'election_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'election_how_many_have_been_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'election_how_many_associate_members_created_woman',
            },
        ],
        dawat4_ulama_peshajibi_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'ulama_peshajibi_gono_songjog_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'ulama_peshajibi_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'ulama_peshajibi_how_many_have_been_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'ulama_peshajibi_how_many_associate_members_created_man',
            },
        ],
        dawat4_ulama_peshajibi_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'ulama_peshajibi_gono_songjog_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'ulama_peshajibi_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'ulama_peshajibi_how_many_have_been_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'ulama_peshajibi_how_many_associate_members_created_woman',
            },
        ],
        dawat4_other: [
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
            console.log("this.month",this.month);
            
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

            this.get_data_by_api('thana-dawat1-regular-group-wise', 1);
            this.get_data_by_api('thana-dawat2-personal-and-target', 2);
            this.get_data_by_api('thana-dawat3-general-program-and-others', 3);
            this.get_data_by_api('thana-dawat4-gono-songjog-and-dawat-ovijan', 4);
            this.get_data_by_api('thana-dawat5-jonoshadharon', 5);
        }
    }

}
</script>

<style></style>
