<template>
    <div class="max_with_550_auto">
        <!-- <h3 class="dofa_heading">দাওয়াত ও তাবলিগ</h3> -->
        <div class="row gx-0">
            <div class="card mb-3 ">
                <div class="card-header border-bottom-0">
                    মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
                </div>
            </div>
            <div class="px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-bolder">দাওয়াত ও তাবলিগ :</h3>
                    </div>
                </div>
            </div>
            <div class="px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-bolder">ক) জনসাধারণের মাঝে সর্বমোট দাওয়াত প্রদানের তথ্য:</h3>
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
                        <h3 class="fw-semibold">১. ইউনিট নিয়মিত গ্রুপ ভিত্তিক দাওয়াত: (পুরুষ)</h3>
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
                        <h3 class="fw-semibold">১. ইউনিট নিয়মিত গ্রুপ ভিত্তিক দাওয়াত: (মহিলা)</h3>
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
                        <h3 class="fw-semibold">২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:(পুরুষ)</h3>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">মোট জনশক্তি সংখ্যা</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat2_jonoshokti" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat2-personal-and-target'" :unique_key="2"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat2_dawati_worke_did" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat2-personal-and-target'" :unique_key="2"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat2_invited" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat2-personal-and-target'" :unique_key="2"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">কতজন সহযোগী সদস্য হয়েছেন</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat2_associate_created" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat2-personal-and-target'" :unique_key="2"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>


            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত:</h3>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat3_invited" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat3-general-program-and-others'" :unique_key="3"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">কতজন সহযোগী সদস্য হয়েছেন</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat3_associate_created" :label="field.label" :name="field.name"
                                :onchange="dawat_upload" :endpoint="'thana-dawat3-general-program-and-others'" :unique_key="3"
                                :key="index"></form-input>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">৪. গণসংযোগ ও দাওয়াতি অভিযান পালন:</h3>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">গণসংযোগ দশক (পুরুষ):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_gono_songjog_doshok_man" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">গণসংযোগ দশক (মহিলা):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_gono_songjog_doshok_woman" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">গণসংযোগ পক্ষ (পুরুষ):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_gono_songjog_pokkho_man" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">গণসংযোগ পক্ষ (মহিলা):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_gono_songjog_pokkho_woman" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>


            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">জেলা ঘোষিত গণসংযোগ ও দাওয়াতি অভিযান:</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_jela_declared" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3 class="fw-semibold">মহানগরী ঘোষিত গণসংযোগ ও দাওয়াতি অভিযান:</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_mohanogor_declared" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>

            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>নির্বাচনী আসনে গণসংযোগ সপ্তাহ (পুরুষ):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_election_man" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>নির্বাচনী আসনে গণসংযোগ সপ্তাহ (মহিলা):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_election_woman" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>

            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>উলামা গণসংযোগ সপ্তাহ (পুরুষ):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_ulama_man" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>উলামা গণসংযোগ সপ্তাহ (মহিলা):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_ulama_woman" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>

            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>পেশাজীবী গণসংযোগ সপ্তাহ (পুরুষ):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_peshajibi_man" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>
            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>পেশাজীবী গণসংযোগ সপ্তাহ (মহিলা):</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_peshajibi_woman" :label="field.label" :name="field.name"
                                :key="index" :onchange="dawat_upload"
                                :endpoint="'thana-dawat4-gono-songjog-and-dawat-ovijan'" :unique_key="4"></form-input>
                        </form>
                    </div>
                </div>
            </div>

            <div class=" px-2">
                <div class="card mb-3" v-if="month">
                    <div class="card-header">
                        <h3>অন্যান্য:</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <form-input v-for="(field, index) in dawat4_other" :label="field.label" :name="field.name"
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
        // মোট জনশক্তি সংখ্যা
        dawat2_jonoshokti: [
            {
                label: 'মোট সদস্য(রুকন) সংখ্যা (পুরুষ)',
                name: 'total_rokon_man',
            },
            {
                label: 'মোট সদস্য(রুকন) সংখ্যা (মহিলা)',
                name: 'total_rokon_woman',
            },
            {
                label: 'মোট কর্মী সংখ্যা (পুরুষ)',
                name: 'total_worker_man',
            },
            {
                label: 'মোট কর্মী সংখ্যা (মহিলা)',
                name: 'total_worker_woman',
            },
        ],

        // কতজন ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন
        dawat2_dawati_worke_did: [
            {
                label: 'সদস্য(রুকন)(পুরুষ)',
                name: 'how_many_were_give_dawat_rokon_man',
            },
            {
                label: 'সদস্য(রুকন)(মহিলা)',
                name: 'how_many_were_give_dawat_rokon_woman',
            },
            {
                label: 'কর্মী (পুরুষ)',
                name: 'how_many_were_give_dawat_worker_man',
            },
            {
                label: 'কর্মী (মহিলা)',
                name: 'how_many_were_give_dawat_worker_woman',
            },
        ],

        // কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে
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
        // কতজন সহযোগী সদস্য হয়েছেন
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
        // 3-কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে
        dawat3_invited: [
            {
                label: 'পুরুষ',
                name: 'how_many_were_give_dawat_man',
            },
            {
                label: 'মহিলা',
                name: 'how_many_were_give_dawat_woman',
            },
        ],
        // 3-কতজন সহযোগী সদস্য হয়েছেন
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


        dawat4_gono_songjog_doshok_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'gono_songjog_doshok_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'gono_songjog_doshok_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'gono_songjog_doshok_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'gono_songjog_doshok_associate_members_created_man',
            },

        ],
        dawat4_gono_songjog_doshok_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'gono_songjog_doshok_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'gono_songjog_doshok_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'gono_songjog_doshok_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'gono_songjog_doshok_associate_members_created_woman',
            },

        ],
        dawat4_gono_songjog_pokkho_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'gono_songjog_pokkho_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'gono_songjog_pokkho_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'gono_songjog_pokkho_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'gono_songjog_pokkho_associate_members_created_man',
            },

        ],
        dawat4_gono_songjog_pokkho_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'gono_songjog_pokkho_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'gono_songjog_pokkho_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'gono_songjog_pokkho_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'gono_songjog_pokkho_associate_members_created_woman',
            },

        ],
        dawat4_jela_declared: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'jela_declared_gonosonjog_dawati_ovi_group',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'jela_declared_gonosonjog_dawati_ovi_attended',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'jela_declared_gonosonjog_dawati_ovi_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'jela_declared_gonosonjog_dawati_ovi_associated_created',
            },
        ],
        dawat4_mohanogor_declared: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'mohanogor_declared_gonosonjog_dawati_ovi_group',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'mohanogor_declared_gonosonjog_dawati_ovi_attended',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'mohanogor_declared_gonosonjog_dawati_ovi_invited',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'mohanogor_declared_gonosonjog_dawati_ovi_associated_created',
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

        dawat4_ulama_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'ulama_gono_songjog_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'ulama_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'ulama_how_many_have_been_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'ulama_how_many_associate_members_created_man',
            },
        ],
        dawat4_ulama_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'ulama_gono_songjog_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'ulama_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'ulama_how_many_have_been_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'ulama_how_many_associate_members_created_woman',
            },
        ],
        dawat4_peshajibi_man: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'peshajibi_gono_songjog_group_man',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'peshajibi_attended_man',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'peshajibi_how_many_have_been_invited_man',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'peshajibi_how_many_associate_members_created_man',
            },
        ],
        dawat4_peshajibi_woman: [
            {
                label: 'মোট গ্রুপ সংখ্যা ',
                name: 'peshajibi_gono_songjog_group_woman',
            },
            {
                label: 'অংশগ্রহণকারীর সংখ্যা',
                name: 'peshajibi_attended_woman',
            },
            {
                label: 'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
                name: 'peshajibi_how_many_have_been_invited_woman',
            },
            {
                label: 'কতজন সহযোগী সদস্য হয়েছেন',
                name: 'peshajibi_how_many_associate_members_created_woman',
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
                name: 'এখান থেকে রিপোর্ট পুড়ন শুরু হবে',
            },
            {
                label: 'বিঃদ্রঃ - ২',
                name: 'Next এবং Previous বাটন দিয়ে সিরিয়ালি আগের এবং পরের পেইজে যেতে পারবেন। ',
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
