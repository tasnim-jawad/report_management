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
                <h1 class="fw-semibold">গ) দাওয়াহ্ ও প্রকাশনা:</h1>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পাঠাগার:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_pathagar" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অনলাইন লাইব্রেরি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_online_library" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পাঠাগারে বই:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_books_in_pathagar" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>অনলাইন লাইব্রেরিতে বই:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_books_in_online_library" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বই বিলি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_book_distribution" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে বই বিলিকেন্দ্র:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_unit_book_distribution_center" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ইউনিটে বই বিলি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_unit_book_distribution" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ডে বই বিক্রয় কেন্দ্র:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_ward_book_sales_center" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>ওয়ার্ডে বই বিক্রয়:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_ward_book_sales" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বইয়ের সফট কপি বিলি (সংগঠন অনুমোদিত):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_soft_copy_book_distribution" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দাওয়াতি লিংক বিতরণ (সংগঠন অনুমোদিত):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_dawat_link_distribution" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সোনার বাংলা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_sonar_bangla" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সংগ্রাম:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_songram" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পৃথিবী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in dp_prithibi" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'thana-dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <previous-next
                :prev-route="{ name: 'Department' }"
                :next-route="{ name: 'Kormosuci' }"
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
        dp_pathagar:[
            {
                label:'বৃদ্ধি',
                name:'total_pathagar_increase',
            },
            {
                label:'টার্গেট',
                name:'total_pathagar_target',
            },

        ],
        dp_online_library:[
            {
                label:'বৃদ্ধি',
                name:'total_online_library_increase',
            },
            {
                label:'টার্গেট',
                name:'total_online_library_target',
            },
        ],
        dp_books_in_pathagar:[
        
            {
                label:'বৃদ্ধি',
                name:'books_in_pathagar_increase',
            },
            {
                label:'টার্গেট',
                name:'books_in_pathagar_target',
            },
        ],
        dp_books_in_online_library:[
            {
                label:'বৃদ্ধি',
                name:'books_in_online_library_increase',
            },
            {
                label:'টার্গেট',
                name:'books_in_online_library_target',
            },
        ],
        dp_book_distribution:[
            {
                label:'সংখ্যা',
                name:'book_distribution',
            },
        ],
        dp_unit_book_distribution_center:[
            // {
            //     label:'সংখ্যা',
            //     name:'unit_book_distribution_center',
            // },
            {
                label:'বৃদ্ধি',
                name:'unit_book_distribution_center_increase',
            },
            {
                label:'টার্গেট',
                name:'unit_book_distribution_center_target',
            },
        ],
        dp_unit_book_distribution:[
            {
                label:'সংখ্যা',
                name:'unit_book_distribution',
            },
            {
                label:'টার্গেট',
                name:'unit_book_distribution_target',
            },
        ],
        dp_ward_book_sales_center:[
            // {
            //     label:'সংখ্যা',
            //     name:'ward_book_sales_center',
            // },
            {
                label:'বৃদ্ধি',
                name:'ward_book_sales_center_increase',
            },
        ],
        dp_ward_book_sales:[
            {
                label:'সংখ্যা',
                name:'ward_book_sales',
            },
            // {
            //     label:'বৃদ্ধি',
            //     name:'ward_book_sales',
            // },
        ],
        dp_soft_copy_book_distribution:[
            {
                label:'সংখ্যা',
                name:'soft_copy_book_distribution',
            },
            // {
            //     label:'বৃদ্ধি',
            //     name:'soft_copy_book_distribution_increase',
            // },
        ],
        dp_dawat_link_distribution:[
            {
                label:'সংখ্যা',
                name:'dawat_link_distribution',
            },
            // {
            //     label:'বৃদ্ধি',
            //     name:'dawat_link_distribution_increase',
            // },
        ],
        dp_sonar_bangla:[
            // {
            //     label:'সংখ্যা',
            //     name:'sonar_bangla',
            // },
            {
                label:'বৃদ্ধি',
                name:'sonar_bangla_increase',
            },
        ],
        dp_songram:[
            // {
            //     label:'সংখ্যা',
            //     name:'songram',
            // },
            {
                label:'বৃদ্ধি',
                name:'songram_increase',
            },
        ],
        dp_prithibi:[
            // {
            //     label:'সংখ্যা',
            //     name:'prithibi',
            // },
            {
                label:'বৃদ্ধি',
                name:'prithibi_increase',
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

            this.get_data_by_api('thana-dawah-and-prokashona', 1);
        }
    }

}
</script>

<style>

</style>
