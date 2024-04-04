<template>
    <div>
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>রাষ্ট্রীয় সংস্কার ও সংশোধন:</h1>
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
            label:'বিশিষ্ট ব্যক্তিবর্গের সাথে যোগাযোগ সংখ্যা',
            name:'bishishto_bekti_jogajog',
        },
    ],
  })

}
</script>

<style>

</style>
