<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            আয় এডিট করুন
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_entry">
                <input type="text" name="id" class="form-control d-none" :value="entry_info.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <select type="text" name="ward_bm_income_category_id" class="form-control text-center" >
                            <option value="">-- select responsibility group --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']"
                            :selected="bm_category['id'] === entry_info.ward_bm_income_category_id">{{bm_category["title"]}}</option>

                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Amount</label>
                    </div>
                    <div class="form_input">
                        <input type="number" name="amount" :value="entry_info.amount" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Entry</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['entry_id'],
    data:function(){
        return{
            entry_info:[],
            bm_category:[],
        }
    },
    created:function(){
        this.show_entry();
        this.bm_category_list();
    },
    methods:{
        bm_category_list:function(){
            axios.get('/ward-bm-income-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    console.log(this.bm_category);
                })
        },
        show_entry : function(){
            axios.get(`/ward-bm-income/show/${this.entry_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.entry_info = responce.data.data
                        console.log("entry_info",this.entry_info);

                    }
                })
        },
        edit_entry:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            for (const entry of formData.entries()) {
                console.log(entry);
            }
            axios.post(`/ward-bm-income/update`,formData)
                .then(function (response) {
                    window.toaster('BM Entry Updated successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });

        }
    }
}
</script>

<style>

</style>
