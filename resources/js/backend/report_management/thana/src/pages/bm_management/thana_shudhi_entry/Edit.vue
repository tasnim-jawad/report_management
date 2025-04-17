<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Edit Shudhi entry
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ThanaShudhiEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_entry">
                <input type="text" name="id" class="form-control d-none" :value="entry_info.id">
                
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">নাম</label>
                    </div>
                    <div class="form_input">
                        <select name="shudhi_id" class="form-control">
                            <option value="">-- select user --</option>
                            <option v-for="(shudhi, i) in thana_shudhi_all" :key="i" :value="shudhi['id']" 
                                :selected="shudhi['id'] === entry_info.shudhi_id" >
                                {{shudhi["name"]}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">খাত</label>
                    </div>
                    <div class="form_input">
                        <select  name="thana_bm_income_category_id" class="form-control">
                            <option value="">-- select category --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']"
                            :selected="bm_category['id'] === entry_info.thana_bm_income_category_id">{{bm_category["title"]}}</option>

                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">মাস</label>
                    </div>
                    <div class="form_input">
                        <input type="date" name="month" :value="entry_info.month" class="form-control">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Amount</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="amount" :value="entry_info.amount" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Entry</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { store as thana_shudhi_entry_store} from '../../../stores/ThanaShudhiEntryStore'
import { mapActions, mapWritableState } from 'pinia';
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
        this.thana_shudhi_list();
    },
    computed:{
        ...mapWritableState(thana_shudhi_entry_store,['thana_shudhi_all'])
    },
    methods:{
        ...mapActions(thana_shudhi_entry_store,{
            thana_shudhi_list:'thana_shudhi_list'
        }),
        bm_category_list:function(){
            axios.get('/thana-bm-income-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    console.log(this.bm_category);
                })
        },
        show_entry : function(){
            axios.get(`/thana-shudhi-entry/show/${this.entry_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.entry_info = responce.data.data
                        console.log("this.entry_info ",this.entry_info );
                        
                    }
                })
        },
        edit_entry:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            for (const entry of formData.entries()) {
                console.log("edit_entry",entry);
            }

            axios.post(`/thana-shudhi-entry/update`,formData)
                .then(function (response) {
                    window.toaster('unit shudhi Entry Updated successfuly', 'success');
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
