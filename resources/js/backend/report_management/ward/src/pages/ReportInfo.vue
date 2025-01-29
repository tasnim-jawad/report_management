<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>Monthly Report Information:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.label" :key="index"></form-input>
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
    fields1:[
        {
            label:'মাস/সন',
            name:'month_year',
        },
        {
            label:'ইউনিটের নাম',
            name:'',
        },
        {
            label:'ওয়ার্ড নং ও নামঃ',
            name:'',
        },
        {
            label:'ইউনিট সভাপতির নাম',
            name:'',
        },
        {
            label:'উপজেলা/থানা',
            name:'',
        },
        {
            label:'ইউনিটের ধরন',
            name:'',
        },
    ],
  })

}
</script>

<style>

</style>
