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
                <h1>প্ৰশিক্ষণ :</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.name" :key="index"
                    :onchange="dawat_upload" :endpoint="'proshikkhon1-tarbiat'" :unique_key="1"></form-input>
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
                label:'তারবিয়াতী বৈঠক (সহীহ কুরআন অনুশীলন/মাসয়ালা-মাসায়েল/ দারসে কুরআন/ দারসে হাদীস / সামষ্টিক পাঠ/বিষয়ভিত্তিক আলোচনা) - সংখ্যা',
                name:'tarbiati_boithok_total',
            },
            {
                label:'তারবিয়াতী বৈঠক (সহীহ কুরআন অনুশীলন/মাসয়ালা-মাসায়েল/ দারসে কুরআন/ দারসে হাদীস / সামষ্টিক পাঠ/বিষয়ভিত্তিক আলোচনা) - টার্গেট',
                name:'tarbiati_boithok_target',
            },
            {
                label:'তারবিয়াতী বৈঠক (সহীহ কুরআন অনুশীলন/মাসয়ালা-মাসায়েল/ দারসে কুরআন/ দারসে হাদীস / সামষ্টিক পাঠ/বিষয়ভিত্তিক আলোচনা) - উপস্থিতি',
                name:'tarbiati_boithok_uposthiti',
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

            this.get_data_by_api('proshikkhon1-tarbiat', 1);
        }
    }

}
</script>

<style>

</style>
