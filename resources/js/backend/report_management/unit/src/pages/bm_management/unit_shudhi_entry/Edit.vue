<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            সুধী আয় এডিট করুন
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitShudhiEntryAll'}" class="text-dark">সুধী আয়ের বিবরণ</router-link>
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
                            <option v-for="(shudhi, i) in unit_shudhi_all" :key="i" :value="shudhi['id']" 
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
                        <select  name="bm_category_id" class="form-control">
                            <option value="">-- select category --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']"
                            :selected="bm_category['id'] === entry_info.bm_category_id">{{bm_category["title"]}}</option>

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
import { store as unit_shudhi_entry_store} from '../../../stores/UnitShudhiEntryStore'
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
        this.unit_shudhi_list();
    },
    computed:{
        ...mapWritableState(unit_shudhi_entry_store,['unit_shudhi_all'])
    },
    methods:{
        ...mapActions(unit_shudhi_entry_store,{
            unit_shudhi_list:'unit_shudhi_list'
        }),
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    console.log(this.bm_category);
                })
        },
        show_entry : function(){
            axios.get(`/unit-shudhi-entry/show/${this.entry_id}`)
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

            axios.post(`/unit-shudhi-entry/update`,formData)
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
