<template>
    <div>
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>১. নিয়মিত গ্রুপ ভিত্তিক দাওয়াত:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields1" :onchange="dawat_upload" :label="field.label" :name="field.name" :key="index"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h1>২. ব্যক্তিগত ও টার্গেটভিত্তিক দাওয়াত:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields2" :label="field.label" :name="field.label" :key="index"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h1>৩. সাধারণ সভা/দাওয়াতি সভা ও অন্যান্য কার্যক্রমের মাধ্যমে দাওয়াত:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields3" :label="field.label" :name="field.label" :key="index"></form-input>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h1>৪. গণসংযোগ ও দাওয়াতি অভিযান পালন:</h1>
            </div>
            <div class="card-body">
                <form action="">
                    <form-input v-for="(field, index) in fields4" :label="field.label" :name="field.label" :key="index"></form-input>
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
            label:'কতটি গ্রুপ বের হয়েছে',
            name:'how_many_groups_are_out',
        },
        {
            label:'অংশগ্রহণকারীর সংখ্যা',
            name:'number_of_participants',
        },
        {
            label:'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
            name:'how_many_have_been_invited',
        },
        {
            label:'কতজন সহযোগী সদস্য হয়েছে ',
            name:'how_many_associate_members_created',
        },
    ],
    fields2:[
        {
            label:'মোট সদস্য(রুকন) সংখ্যা',
            name:'total_rokon',
        },
        {
            label:'মোট কর্মী সংখ্যা ',
            name:'total_worker',
        },
        {
            label:'কতজন সদস্য(রুকন) ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
            name:'how_many_were_give_dawat_rokon',
        },
        {
            label:'কতজন কর্মী ব্যক্তিগতভাবে দাওয়াতি কাজ করেছেন',
            name:'how_many_were_give_dawat_worker',
        },
        {
            label:'কতজনের নিকট দাওয়াত পৌঁছানো হয়েছেন',
            name:'how_many_have_been_invited',
        },
        {
            label:'কতজন সহযোগী সদস্য হয়েছেন',
            name:'how_many_associate_members_created',
        },
    ],
    fields3:[
        {
            label:'মোট কতজনকে দাওয়াত প্রদান করা হয়েছে',
            name:'how_many_were_give_dawat',
        },
        {
            label:'মোট কতজন সহযোগী সদস্য হয়েছেন',
            name:'how_many_associate_members_created',
        },
    ],
    fields4:[
        {
            label:'গণসংযোগ দশক/পক্ষ - মোট গ্রুপ সংখ্যা ',
            name:'total_gono_songjog_group',
        },
        {
            label:'গণসংযোগ দশক/পক্ষ - অংশগ্রহণকারীর সংখ্যা',
            name:'total_attended',
        },
        {
            label:'গণসংযোগ দশক/পক্ষ - কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
            name:'how_many_have_been_invited',
        },
        {
            label:'গণসংযোগ দশক/পক্ষ - কতজন সহযোগী সদস্য হয়েছেন',
            name:'how_many_associate_members_created',
        },
        {
            label:'জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান - মোট গ্রুপ সংখ্যা ',
            name:'jela_mohanogor_declared_gonosonjog_group',
        },
        {
            label:'জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান - অংশগ্রহণকারীর সংখ্যা',
            name:'jela_mohanogor_declared_gonosonjog_attended',
        },
        {
            label:'জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান - কতজনের নিকট দাওয়াত পৌঁছানো হয়েছে',
            name:'jela_mohanogor_declared_gonosonjog_invited',
        },
        {
            label:'জেলা/মহা: ঘোষিত গণসংযোগ/দাওয়াতি অভিযান - কতজন সহযোগী সদস্য হয়েছেন',
            name:'jela_mohanogor_declared_gonosonjog_associated_created',
        },

    ],
  }),
  methods:{
    dawat_upload:function(){
        var value = event.target.value;
        var name = event.target.name;
        console.log(value,name);
        axios.post(`dawat1-regular-group-wise/store-single`,{
            value,name
        })
    }
  }

}
</script>

<style>

</style>
