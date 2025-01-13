<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Edit Bm entry
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmUserEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
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
                        <select name="user_id" class="form-control">
                            <option value="">-- select user --</option>
                            <option v-for="(user, i) in unit_user_all" :key="i" :value="user['id']" 
                                :selected="user['id'] === entry_info.user_id" >
                                {{user["full_name"]}}
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
import { store as bm_user_entry_store} from '../../../stores/BmUserEntryStore'
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
        this.unit_users_list();
    },
    computed:{
        ...mapWritableState(bm_user_entry_store,['unit_user_all'])
    },
    methods:{
        ...mapActions(bm_user_entry_store,{
            unit_users_list:'unit_users_list'
        }),
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    console.log(this.bm_category);
                })
        },
        show_entry : function(){
            axios.get(`/bm-user-entry/show/${this.entry_id}`)
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

            axios.post(`/bm-user-entry/update`,formData)
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
