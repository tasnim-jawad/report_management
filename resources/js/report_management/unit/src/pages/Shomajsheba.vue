<template>
    <div>
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>১. ব্যক্তিগত উদ্যোগে সামাজিক কাজ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :label="field.label" :name="field.label" :key="index"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h1>২. ইউনিটের উদ্যোগে সামাজিক কাজ:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.label" :key="index"></form-input>
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
            label:'মোট কতজন ব্যক্তিগত উদ্যোগে সামাজিক কাজ করেছেন',
            name:'how_many_people_did',
        },
        {
            label:'মোট সেবাপ্রাপ্ত সংখ্যা',
            name:'service_received_total',
        },


    ],
    fields2:[
        {
            label:'সামাজিক অনুষ্ঠানে অংশগ্রহন',
            name:'shamajik_onusthane_ongshogrohon',
        },
        {
            label:'সামাজিক অনুষ্ঠানে সহায়তা প্রদান',
            name:'shamajik_onusthane_shohayota_prodan',
        },
        {
            label:'সামাজিক বিরোধ মীমাংসা',
            name:'shamajik_birodh_mimangsha',
        },
        {
            label:'মানবিক সহায়তা প্রদান (কতজনকে)',
            name:'manobik_shohayota_prodan',
        },
        {
            label:'কর্জে হাসানা প্রদান (কতজনকে)',
            name:'korje_hasana_prodan',
        },
        {
            label:'রোগীর পরিচর্যা প্রদান (কতজনকে) ',
            name:'rogir_poricorja',
        },
        {
            label:'চিকিৎসা সহায়তা প্রদান (কতজনকে) ',
            name:'medical_shohayota_prodan',
        },
        {
            label:'নবজাতককে গিফ্ট প্রদান (কতজনকে)',
            name:'nobojatokke_gift_prodan',
        },
        {
            label:'স্বেচ্ছায় রক্ত দান (কতজন) ',
            name:'voluntarily_blood_donation_kotojon',
        },
        {
            label:'স্বেচ্ছায় রক্ত দান (কতজনকে) ',
            name:'voluntarily_blood_donation_kotojonke',
        },
        {
            label:'মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজন)',
            name:'matrikalin_sheba_prodan_kotojon',
        },
        {
            label:'মাতৃত্বকালীন সময়ে সেবা প্রদান (কতজনকে) ',
            name:'matrikalin_sheba_prodan_kotojonke',
        },
    ],

  })

}
</script>

<style>

</style>
