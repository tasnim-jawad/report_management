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
                <h1>বই বিলিকেন্দ্ৰ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বই:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বই বিলি/বিক্রি:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>বইয়ের সফ্ট কপি বিলি (সংগঠন অনুমোদিত):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>দাওয়াতি লিংক বিতরণ (সংগঠন অনুমোদিত):</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields5" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সোনার বাংলা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields6" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>সংগ্রাম:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields7" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1>পৃথিবী:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields8" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
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
        fields1:[
            // {
            //     label:'সংখ্যা',
            //     name:'unit_book_distribution_center',
            // },
            {
                label:'বৃদ্ধি',
                name:'unit_book_distribution_center_increase',
            },

        ],
        fields2:[
            // {
            //     label:'সংখ্যা',
            //     name:'books_in_pathagar',
            // },
            {
                label:'বৃদ্ধি',
                name:'books_in_pathagar_increase',
            },
        ],
        fields3:[
            {
                label:'সংখ্যা',
                name:'unit_book_distribution',
            },
            // {
            //     label:'বৃদ্ধি',
            //     name:'unit_book_distribution_increase',
            // },
        ],
        fields4:[
            {
                label:'সংখ্যা',
                name:'soft_copy_book_distribution',
            },
            // {
            //     label:'বৃদ্ধি',
            //     name:'soft_copy_book_distribution_increase',
            // },
        ],
        fields5:[
            {
                label:'সংখ্যা',
                name:'dawat_link_distribution',
            },
            // {
            //     label:'বৃদ্ধি',
            //     name:'dawat_link_distribution_increase',
            // },
        ],
        fields6:[
            // {
            //     label:'সংখ্যা',
            //     name:'sonar_bangla',
            // },
            {
                label:'বৃদ্ধি',
                name:'sonar_bangla_increase',
            },
        ],
        fields7:[
            // {
            //     label:'সংখ্যা',
            //     name:'songram',
            // },
            {
                label:'বৃদ্ধি',
                name:'songram_increase',
            },
        ],
        fields8:[
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
            let els = document.querySelectorAll('input[type="number"]');
            els = [...els].forEach(e => e.value = '');

            this.get_data_by_api('dawah-and-prokashona', 1);
        }
    }

}
</script>

<style>

</style>
