<template>
    <div>
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>কর্মসূচি বাস্তবায়ন:</h1>
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
            label:'মাসিক সাধারণ সভা - সংখ্যা',
            name:'unit_masik_sadaron_sova_total',
        },
        {
            label:'মাসিক সাধারণ সভা - টার্গেট',
            name:'unit_masik_sadaron_sova_target',
        },
        {
            label:'মাসিক সাধারণ সভা - মোট উপস্থিতি',
            name:'unit_masik_sadaron_sova_uposthiti',
        },
        {
            label:'ব্যক্তিগত ইফতার মাহফিল - সংখ্যা',
            name:'iftar_mahfil_personal_total',
        },
        {
            label:'ব্যক্তিগত ইফতার মাহফিল - টার্গেট',
            name:'iftar_mahfil_personal_target',
        },
        {
            label:'ব্যক্তিগত ইফতার মাহফিল - মোট উপস্থিতি',
            name:'iftar_mahfil_personal_uposthiti',
        },
        {
            label:'সাংগঠনিক ইফতার মাহফিল - সংখ্যা',
            name:'iftar_mahfil_samostic_total',
        },
        {
            label:'সাংগঠনিক ইফতার মাহফিল - টার্গেট',
            name:'iftar_mahfil_samostic_target',
        },
        {
            label:'সাংগঠনিক ইফতার মাহফিল - মোট উপস্থিতি',
            name:'iftar_mahfil_samostic_uposthiti',
        },
        {
            label:'চা চক্র - সংখ্যা',
            name:'cha_chakra_total',
        },
        {
            label:'চা চক্র - টার্গেট',
            name:'cha_chakra_target',
        },
        {
            label:'চা চক্র - মোট উপস্থিতি',
            name:'cha_chakra_uposthiti',
        },
        {
            label:'সামষ্টিক খাওয়া - সংখ্যা',
            name:'samostic_khawa_total',
        },
        {
            label:'সামষ্টিক খাওয়া - টার্গেট',
            name:'samostic_khawa_target',
        },
        {
            label:'সামষ্টিক খাওয়া - মোট উপস্থিতি',
            name:'samostic_khawa_uposthiti',
        },
        {
            label:'শিক্ষা সফর - সংখ্যা',
            name:'sikkha_sofor_total',
        },
        {
            label:'শিক্ষা সফর - টার্গেট',
            name:'sikkha_sofor_target',
        },
        {
            label:'শিক্ষা সফর - মোট উপস্থিতি',
            name:'sikkha_sofor_uposthiti',
        },


    ],
  })

}
</script>

<style>

</style>
