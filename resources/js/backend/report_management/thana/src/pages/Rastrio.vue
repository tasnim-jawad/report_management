<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header border-bottom-0">
                মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">রাষ্ট্রীয় সংস্কার ও সংশোধন:</h1>
            </div>
        </div>
        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">১. রাজনৈতিক ও প্রশাসনিক যোগাযোগ:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>রাজনৈতিক ব্যক্তিবর্গ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rajnoitik_bekti" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio1-political-communication'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>প্রশাসনিক ব্যক্তিবর্গ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in proshoshonik_bekti" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio1-political-communication'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">২. কর্মসূচি বাস্তবায়ন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কেন্দ্র ঘোষিত রাজনৈতিক কর্মসূচি পালন:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in centrally_announced_political_program" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্থানীয়ভাবে ঘোষিত কর্মসূচি : জনসভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in locally_announced_jonoshova" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্থানীয়ভাবে ঘোষিত কর্মসূচি : সমাবেশ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in locally_announced_shomabesh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্থানীয়ভাবে ঘোষিত কর্মসূচি : মিছিল:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in locally_announced_michil" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in others" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio2-kormoshuchi-bastobayon'" :unique_key="2"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৩. জাতীয় ও আন্তর্জাতিক দিবস পালন:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>স্বাধীনতা ও জাতীয় দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shadhinota_o_jatio_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বিজয় দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in bijoy_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অন্যান্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in others_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>আন্তর্জাতিক মাতৃভাষা দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in mattrivasha_dibosh" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>আন্তর্জাতিক নারী দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in international_womens_day" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মে দিবস:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in may_day" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio3-dibosh-palon'" :unique_key="3"></form-input>
                </form>
            </div>
        </div>


        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সিটি কর্পোরেশন:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in city_corporation" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পৌরসভা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in pouroshova" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উপজেলা পরিষদ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in upojela" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিয়ন পরিষদ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in union" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>



        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট ভোট কেন্দ্র (জাতীয়):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in national_vote_kendro" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মোট ভোট কেন্দ্র (স্থানীয়):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in local_vote_kendro" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ভোট কেন্দ্র কমিটি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vote_kendro_committee" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কেন্দ্র ভিত্তিক ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in vote_kendro_vittik_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বুথ ভিত্তিক ইউনিট:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in booth_vittik_unit" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in election_management_committee_meeting" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio4-election-activitie'" :unique_key="4"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৫. প্রচার ও মিডিয়া:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in broadcast_and_media" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio5-broadcast-and-media'" :unique_key="5"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৬. মানবাধিকার :</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rastrio6_human_rights" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio6-human-right'" :unique_key="6"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>মানবাধিকার কর্মী তৈরি :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in human_rights_activist_produced" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio6-human-right'" :unique_key="6"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৭. শিল্প ও বাণিজ্য: :</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ব্যবসায়ী সমিতি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in business_association" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio7-industry-and-trade'" :unique_key="7"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বাজার কমিটি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in market_committee" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio7-industry-and-trade'" :unique_key="7"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অন্যান্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rastrio7_other" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio7-industry-and-trade'" :unique_key="7"></form-input>
                </form>
            </div>
        </div>



        <div class="card mb-1" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">৮. উদ্যোক্তা তৈরি:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>কৃষি উদ্যোক্তা তৈরি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in krishi_uddogta_toiri" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio8-entrepreneurial-development'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উদ্যোক্তা তৈরি (সেবা):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in sheba_uddogta_toiri" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio8-entrepreneurial-development'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উদ্যোক্তা তৈরি (শিল্প):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in shilpo_uddogta_toiri" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio8-entrepreneurial-development'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উদ্যোক্তা তৈরি (ব্যবসা-বাণিজ্য):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in banijjo_uddogta_toiri" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio8-entrepreneurial-development'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>উদ্যোক্তা তৈরি (অন্যান্য):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in other_uddogta_toiri" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio8-entrepreneurial-development'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>

        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অন্যান্য:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in rastrio8_other" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-rastrio8-entrepreneurial-development'" :unique_key="8"></form-input>
                </form>
            </div>
        </div>

        <previous-next
                :prev-route="{ name: 'Shomajsheba' }"
                :next-route="{ name: 'Montobbo' }"
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
        rajnoitik_bekti:[
            {
                label:'মোট কতজন যোগাযোগ করেছেন',
                name:'rajnoitik_bekti_jogajog_koreche_kotojon',
            },
            {
                label:'মোট কতজনের সাথে যোগাযোগ হয়েছে',
                name:'rajnoitik_bekti_jogajog_koreche_kotojonke',
            },
        ],
        proshoshonik_bekti:[
            {
                label:'মোট কতজন যোগাযোগ করেছেন',
                name:'proshoshonik_bekti_jogajog_koreche_kotojon',
            },
            {
                label:'মোট কতজনের সাথে যোগাযোগ হয়েছে',
                name:'proshoshonik_bekti_jogajog_koreche_kotojonke',
            },
        ],

        centrally_announced_political_program:[
            {
                label:'মোট সংখ্যা',
                name:'centrally_announced_political_program',
            },
            // {
            //     label:'উপস্থিতি',
            //     name:'centrally_announced_political_program_attend',
            // },
        ],
        locally_announced_jonoshova:[
            {
                label:'মোট সংখ্যা',
                name:'locally_announced_jonoshova',
            },
            {
                label:'উপস্থিতি',
                name:'locally_announced_jonoshova_attend',
            },
        ],
        locally_announced_shomabesh:[
            {
                label:'মোট সংখ্যা',
                name:'locally_announced_shomabesh',
            },
            {
                label:'উপস্থিতি',
                name:'locally_announced_shomabesh_attend',
            },
        ],
        locally_announced_michil:[
            {
                label:'মোট সংখ্যা',
                name:'locally_announced_michil',
            },
            {
                label:'উপস্থিতি',
                name:'locally_announced_michil_attend',
            },
        ],

        others:[
            {
                label:'পোস্টার বিতরণ',
                name:'poster_bitoron',
            },
            {
                label:'লিফলেট বিতরণ',
                name:'leaflet_bitoron',
            },
            {
                label:'বুকলেট বিতরণ',
                name:'booklet_bitoron',
            },
            {
                label:'স্মারকলিপি বিতরণ',
                name:'sharoklipi_bitoron',
            },
            {
                label:'অন্যান্য',
                name:'others',
            },
        ],



        shadhinota_o_jatio_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'shadhinota_o_jatio_dibosh_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'shadhinota_o_jatio_dibosh_attend',
            },
        ],
        bijoy_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'bijoy_dibosh_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'bijoy_dibosh_attend',
            },
        ],
        others_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'others_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'others_attend',
            },
        ],
        mattrivasha_dibosh:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'mattrivasha_dibosh_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'mattrivasha_dibosh_attend',
            },
        ],
        international_womens_day:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'international_womens_day_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'international_womens_day_attend',
            },
        ],
        may_day:[
            {
                label:'মোট প্রোগ্রাম সংখ্যা',
                name:'may_day_total_programs',
            },
            {
                label:'উপস্থিতি',
                name:'may_day_attend',
            },
        ],

        //৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:

        city_corporation:[
            {
                label:'মোট সংখ্যা',
                name:'city_corporation_total',
            },
            {
                label:'মোট প্রার্থী সংখ্যা',
                name:'city_corporation_total_candidate',
            },
            {
                label:'অংশগ্রহণ সংখ্যা',
                name:'city_corporation_total_candidate_participated',
            },
            {
                label:'নির্বাচিত মেয়র সংখ্যা',
                name:'city_corporation_mayor_candidate_elected',
            },
            {
                label:'নির্বাচিত চেয়ারম্যান সংখ্যা',
                name:'city_corporation_chairman_candidate_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (পু) ',
                name:'city_corporation_vice_chairman_candidate_man_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (ম) ',
                name:'city_corporation_vice_chairman_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (পু)',
                name:'city_corporation_councilor_candidate_man_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (ম)',
                name:'city_corporation_councilor_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (পু)',
                name:'city_corporation_member_candidate_man_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (ম)',
                name:'city_corporation_member_candidate_woman_elected',
            },
            {
                label:'দ্বিতীয় অবস্থান (পু)',
                name:'city_corporation_member_candidate_man_second_position',
            },
            {
                label:'দ্বিতীয় অবস্থান (ম)',
                name:'city_corporation_member_candidate_woman_second_position',
            },
          
        ],
        pouroshova:[
            {
                label:'মোট সংখ্যা',
                name:'pouroshova_total',
            },
            {
                label:'মোট প্রার্থী সংখ্যা',
                name:'pouroshova_total_candidate',
            },
            {
                label:'অংশগ্রহণ সংখ্যা',
                name:'pouroshova_total_candidate_participated',
            },
            {
                label:'নির্বাচিত মেয়র সংখ্যা',
                name:'pouroshova_mayor_candidate_elected',
            },
            {
                label:'নির্বাচিত চেয়ারম্যান সংখ্যা',
                name:'pouroshova_chairman_candidate_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (পু) ',
                name:'pouroshova_vice_chairman_candidate_man_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (ম) ',
                name:'pouroshova_vice_chairman_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (পু)',
                name:'pouroshova_councilor_candidate_man_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (ম)',
                name:'pouroshova_councilor_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (পু)',
                name:'pouroshova_member_candidate_man_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (ম)',
                name:'pouroshova_member_candidate_woman_elected',
            },
            {
                label:'দ্বিতীয় অবস্থান (পু)',
                name:'pouroshova_member_candidate_man_second_position',
            },
            {
                label:'দ্বিতীয় অবস্থান (ম)',
                name:'pouroshova_member_candidate_woman_second_position',
            },
          
        ],
        upojela:[
            {
                label:'মোট সংখ্যা',
                name:'upojela_total',
            },
            {
                label:'মোট প্রার্থী সংখ্যা',
                name:'upojela_total_candidate',
            },
            {
                label:'অংশগ্রহণ সংখ্যা',
                name:'upojela_total_candidate_participated',
            },
            {
                label:'নির্বাচিত মেয়র সংখ্যা',
                name:'upojela_mayor_candidate_elected',
            },
            {
                label:'নির্বাচিত চেয়ারম্যান সংখ্যা',
                name:'upojela_chairman_candidate_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (পু) ',
                name:'upojela_vice_chairman_candidate_man_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (ম) ',
                name:'upojela_vice_chairman_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (পু)',
                name:'upojela_councilor_candidate_man_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (ম)',
                name:'upojela_councilor_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (পু)',
                name:'upojela_member_candidate_man_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (ম)',
                name:'upojela_member_candidate_woman_elected',
            },
            {
                label:'দ্বিতীয় অবস্থান (পু)',
                name:'upojela_member_candidate_man_second_position',
            },
            {
                label:'দ্বিতীয় অবস্থান (ম)',
                name:'upojela_member_candidate_woman_second_position',
            },
          
        ],
        union:[
            {
                label:'মোট সংখ্যা',
                name:'union_total',
            },
            {
                label:'মোট প্রার্থী সংখ্যা',
                name:'union_total_candidate',
            },
            {
                label:'অংশগ্রহণ সংখ্যা',
                name:'union_total_candidate_participated',
            },
            {
                label:'নির্বাচিত মেয়র সংখ্যা',
                name:'union_mayor_candidate_elected',
            },
            {
                label:'নির্বাচিত চেয়ারম্যান সংখ্যা',
                name:'union_chairman_candidate_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (পু) ',
                name:'union_vice_chairman_candidate_man_elected',
            },
            {
                label:'নির্বাচিত ভাইস-চেয়ারম্যান সংখ্যা (ম) ',
                name:'union_vice_chairman_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (পু)',
                name:'union_councilor_candidate_man_elected',
            },
            {
                label:'নির্বাচিত কাউন্সিলর সংখ্যা (ম)',
                name:'union_councilor_candidate_woman_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (পু)',
                name:'union_member_candidate_man_elected',
            },
            {
                label:'নির্বাচিত মেম্বার সংখ্যা (ম)',
                name:'union_member_candidate_woman_elected',
            },
            {
                label:'দ্বিতীয় অবস্থান (পু)',
                name:'union_member_candidate_man_second_position',
            },
            {
                label:'দ্বিতীয় অবস্থান (ম)',
                name:'union_member_candidate_woman_second_position',
            },
          
        ],


        national_vote_kendro:[
            {
                label:'সংখ্যা',
                name:'national_vote_kendro',
            },
            {
                label:'বৃদ্ধি',
                name:'national_vote_kendro_increase',
            },
            {
                label:'টার্গেট',
                name:'national_vote_kendro_target',
            },
        ],
        local_vote_kendro:[
            {
                label:'সংখ্যা',
                name:'local_vote_kendro',
            },
            {
                label:'বৃদ্ধি',
                name:'local_vote_kendro_increase',
            },
            {
                label:'টার্গেট',
                name:'local_vote_kendro_target',
            },
        ],
        vote_kendro_committee:[
            {
                label:'সংখ্যা',
                name:'vote_kendro_committee',
            },
            {
                label:'বৃদ্ধি',
                name:'vote_kendro_committee_increase',
            },
            {
                label:'টার্গেট',
                name:'vote_kendro_committee_target',
            },
        ],
        vote_kendro_vittik_unit:[
            {
                label:'সংখ্যা',
                name:'vote_kendro_vittik_unit',
            },
            {
                label:'বৃদ্ধি',
                name:'vote_kendro_vittik_unit_increase',
            },
            {
                label:'টার্গেট',
                name:'vote_kendro_vittik_unit_target',
            },
        ],
        booth_vittik_unit:[
            {
                label:'সংখ্যা',
                name:'booth_vittik_unit',
            },
            {
                label:'বৃদ্ধি',
                name:'booth_vittik_unit_increase',
            },
            {
                label:'টার্গেট',
                name:'booth_vittik_unit_target',
            },
        ],

        election_management_committee_meeting:[
            {
                label:'উপজেলা ভিত্তিক',
                name:'upojela_vittik_election_management_committee_meeting',
            },
            {
                label:'থানা ভিত্তিক',
                name:'thana_vittik_election_management_committee_meeting',
            },
            {
                label:'পৌরসভা ভিত্তিক',
                name:'pouroshova_vittik_election_management_committee_meeting',
            },
            {
                label:'ইউনিয়ন ভিত্তিক',
                name:'union_vittik_election_management_committee_meeting',
            },
            {
                label:'ওয়ার্ড ভিত্তিক',
                name:'ward_vittik_election_management_committee_meeting',
            },
        ],


        //৫. প্রচার ও মিডিয়া:
        broadcast_and_media:[
            {
                label:'প্রেস বিজ্ঞপ্তি সংখ্যা',
                name:'press_release',
            },
            {
                label:'বিবৃতি সংখ্যা',
                name:'bibriti',
            },
            {
                label:'প্রতিবাদ লিপি সংখ্যা',
                name:'protibad_lipi',
            },
            {
                label:'সামাজিক যোগাযোগ মাধ্যমে পোস্ট সংখ্যা',
                name:'social_media_post',
            },
            {
                label:'লাইভ প্রোগ্রাম সংখ্যা',
                name:'social_media_live_program',
            },
        ],




        // ৬. মানবাধিকার
        rastrio6_human_rights:[
            {
                label:'মানবাধিকার সংগঠন প্রতিষ্ঠার সংখ্যা',
                name:'human_rights_organizations_established',
            },
            {
                label:'জাতীয় মানবাধিকার সংস্থার স্থানীয় শাখা চালুকরণ সংখ্যা',
                name:'national_human_rights_organizations_local_branches_launched',
            },
            {
                label:'আন্তর্জাতিক মানবাধিকার সংস্থার স্থানীয় শাখা চালুকরণ সংখ্যা',
                name:'international_human_rights_organizations_local_branches_launched',
            },
        ],

        // মানবাধিকার কর্মী তৈরি
        human_rights_activist_produced:[
            {
                label:'সংখ্যা',
                name:'human_rights_activist_produced_total',
            },
            {
                label:'বৃদ্ধি',
                name:'human_rights_activist_produced_increase',
            },
            {
                label:'টার্গেট',
                name:'human_rights_activist_produced_target',
            },
        ],


        // ৭. শিল্প ও বাণিজ্য:
        business_association:[
            {
                label:'নির্বাচন সংখ্যা',
                name:'business_association_election',
            },
            {
                label:'মোট পদ সংখ্যা',
                name:'business_association_number_of_post',
            },
            {
                label:'অংশগ্রহণকৃত পদ সংখ্যা',
                name:'business_association_participated',
            },
            {
                label:'নির্বাচিত পদ সংখ্যা',
                name:'business_association_elected',
            },
        ],
        market_committee:[
            {
                label:'নির্বাচন সংখ্যা',
                name:'market_committee_election',
            },
            {
                label:'মোট পদ সংখ্যা',
                name:'market_committee_number_of_post',
            },
            {
                label:'অংশগ্রহণকৃত পদ সংখ্যা',
                name:'market_committee_participated',
            },
            {
                label:'নির্বাচিত পদ সংখ্যা',
                name:'market_committee_elected',
            },
        ],
        rastrio7_other:[
            {
                label:'নির্বাচন সংখ্যা',
                name:'other_election',
            },
            {
                label:'মোট পদ সংখ্যা',
                name:'other_number_of_post',
            },
            {
                label:'অংশগ্রহণকৃত পদ সংখ্যা',
                name:'other_participated',
            },
            {
                label:'নির্বাচিত পদ সংখ্যা',
                name:'other_elected',
            },
        ],


        // ৮. উদ্যোক্তা তৈরি:
        // বিবরণ
        // কৃষি উদ্যোক্তা তৈরি
        // উদ্যোক্তা তৈরি (সেবা, শিল্প, ব্যবসা-বাণিজ্য ও অন্যান্য)
        // অন্যান্য
        // সংখ্যা
        // টার্গেট



        krishi_uddogta_toiri:[
            {
                label:'সংখ্যা',
                name:'krishi_uddogta_toiri_total',
            },
            {
                label:'বৃদ্ধি',
                name:'krishi_uddogta_toiri_increase',
            },
            {
                label:'টার্গেট',
                name:'krishi_uddogta_toiri_target',
            },
        ],
        sheba_uddogta_toiri:[
            {
                label:'সংখ্যা',
                name:'sheba_uddogta_toiri_total',
            },
            {
                label:'বৃদ্ধি',
                name:'sheba_uddogta_toiri_increase',
            },
            {
                label:'টার্গেট',
                name:'sheba_uddogta_toiri_target',
            },
        ],
        shilpo_uddogta_toiri:[
            {
                label:'সংখ্যা',
                name:'shilpo_uddogta_toiri_total',
            },
            {
                label:'বৃদ্ধি',
                name:'shilpo_uddogta_toiri_increase',
            },
            {
                label:'টার্গেট',
                name:'shilpo_uddogta_toiri_target',
            },
        ],
        banijjo_uddogta_toiri:[
            {
                label:'সংখ্যা',
                name:'banijjo_uddogta_toiri_total',
            },
            {
                label:'বৃদ্ধি',
                name:'banijjo_uddogta_toiri_increase',
            },
            {
                label:'টার্গেট',
                name:'banijjo_uddogta_toiri_target',
            },
        ],
        other_uddogta_toiri:[
            {
                label:'সংখ্যা',
                name:'other_uddogta_toiri_total',
            },
            {
                label:'বৃদ্ধি',
                name:'other_uddogta_toiri_increase',
            },
            {
                label:'টার্গেট',
                name:'other_uddogta_toiri_target',
            },
        ],
        rastrio8_other:[
            {
                label:'সংখ্যা',
                name:'other_total',
            },
            {
                label:'বৃদ্ধি',
                name:'other_increase',
            },
            {
                label:'টার্গেট',
                name:'other_target',
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

            this.get_data_by_api('thana-rastrio1-political-communication', 1);
            this.get_data_by_api('thana-rastrio2-kormoshuchi-bastobayon', 2);
            this.get_data_by_api('thana-rastrio3-dibosh-palon', 3);
            this.get_data_by_api('thana-rastrio4-election-activitie', 4);
            this.get_data_by_api('thana-rastrio5-broadcast-and-media',5);
            this.get_data_by_api('thana-rastrio6-human-right', 6);
            this.get_data_by_api('thana-rastrio7-industry-and-trade', 7);
            this.get_data_by_api('thana-rastrio8-entrepreneurial-development', 8);
        }
    }

}
</script>

<style>

</style>
