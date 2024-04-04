<template>
    <div>
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>দাওয়াহ্ ও প্রকাশনা:</h1>
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
            label:'বই বিলিকেন্দ্ৰ সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'বই বিলিকেন্দ্ৰ বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'বই সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'বই বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'বই বিলি/বিক্রি সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'বই বিলি/বিক্রি বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'বইয়ের সফ্ট কপি বিলি (সংগঠন অনুমোদিত) সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'বইয়ের সফ্ট কপি বিলি (সংগঠন অনুমোদিত) বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'দাওয়াতি লিংক বিতরণ (সংগঠন অনুমোদিত) সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'দাওয়াতি লিংক বিতরণ (সংগঠন অনুমোদিত) বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'সোনার বাংলা সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'সোনার বাংলা বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'সংগ্রাম সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'সংগ্রাম বৃদ্ধি',
            name:'how_many_groups_are_out',
        },
        {
            label:'পৃথিবী সংখ্যা',
            name:'how_many_groups_are_out',
        },
        {
            label:'পৃথিবী বৃদ্ধি',
            name:'how_many_groups_are_out',
        },

    ],
  })

}
</script>

<style>

</style>
