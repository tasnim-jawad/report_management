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
                <h1>দাওয়াহ্ ও প্রকাশনা:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'dawah-and-prokashona'" :unique_key="1"></form-input>
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
        month:null,
        fields1:[
            {
                label:'বই বিলিকেন্দ্ৰ সংখ্যা',
                name:'unit_book_distribution_center',
            },
            {
                label:'বই বিলিকেন্দ্ৰ বৃদ্ধি',
                name:'unit_book_distribution_center_increase',
            },
            {
                label:'বই সংখ্যা',
                name:'books_in_pathagar',
            },
            {
                label:'বই বৃদ্ধি',
                name:'books_in_pathagar_increase',
            },
            {
                label:'বই বিলি/বিক্রি সংখ্যা',
                name:'unit_book_distribution',
            },
            {
                label:'বই বিলি/বিক্রি বৃদ্ধি',
                name:'unit_book_distribution_increase',
            },
            {
                label:'বইয়ের সফ্ট কপি বিলি (সংগঠন অনুমোদিত) সংখ্যা',
                name:'soft_copy_book_distribution',
            },
            {
                label:'বইয়ের সফ্ট কপি বিলি (সংগঠন অনুমোদিত) বৃদ্ধি',
                name:'soft_copy_book_distribution_increase',
            },
            {
                label:'দাওয়াতি লিংক বিতরণ (সংগঠন অনুমোদিত) সংখ্যা',
                name:'dawat_link_distribution',
            },
            {
                label:'দাওয়াতি লিংক বিতরণ (সংগঠন অনুমোদিত) বৃদ্ধি',
                name:'dawat_link_distribution_increase',
            },
            {
                label:'সোনার বাংলা সংখ্যা',
                name:'sonar_bangla',
            },
            {
                label:'সোনার বাংলা বৃদ্ধি',
                name:'sonar_bangla_increase',
            },
            {
                label:'সংগ্রাম সংখ্যা',
                name:'songram',
            },
            {
                label:'সংগ্রাম বৃদ্ধি',
                name:'songram_increase',
            },
            {
                label:'পৃথিবী সংখ্যা',
                name:'prithibi',
            },
            {
                label:'পৃথিবী বৃদ্ধি',
                name:'prithibi_increase',
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

            this.get_data_by_api('dawah-and-prokashona', 1);
        }
    }

}
</script>

<style>

</style>
