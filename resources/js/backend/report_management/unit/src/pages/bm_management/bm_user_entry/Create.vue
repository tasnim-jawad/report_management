<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Create Bm Entry
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmUserEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
            </div>
        </div>
        <div class="card-body">
            <p class="mb-3" >Target:-  {{users_target}}</p>
            <form action="" @submit.prevent="create_entry">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input" v-if="field.field_type == 'select' && field.name == 'user_id'">
                        <select type="text" :name="field.name" class="form-control" v-model="selected_user_id" >
                            <option value="">-- select user --</option>
                            <option v-for="(user, i) in unit_user_all" :key="i" :value="user['id']" >{{user["full_name"]}}</option>

                        </select>
                    </div>

                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'bm_category_id'">
                        <select type="text" :name="field.name" class="form-control" v-model="selected_bm_category_id">
                            <option value="">-- select Category --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']" >{{bm_category["title"]}}</option>

                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.name == 'month'">
                        <input type="date" :name="field.name" class="form-control">
                    </div>
                    <div class="form_input" v-else>
                        <input type="text" :name="field.name" class="form-control" v-model="amount">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Create Entry</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { watch } from 'vue';
import { store as data_store} from "../../../stores/ReportStore";
import { store as bm_user_entry_store} from "../../../stores/BmUserEntryStore";
import { mapActions, mapWritableState } from 'pinia';

export default {
    data(){
        return {
            fields1:[
                {
                    label:"User",
                    name:"user_id",
                    field_type:"select",
                },
                {
                    label:"Title",
                    name:"bm_category_id",
                    field_type:"select",
                },
                {
                    label:"Date",
                    name:"month",
                    field_type:"date",
                },
                {
                    label:"Amount",
                    name:"amount",
                },
            ],
            bm_category:[],
            // unit_user_all:[],
            users_target:"",
            selected_user_id:"",
            selected_bm_category_id:"",
            amount: "",

        }
    },
    created:function(){
        this.bm_category_list();
        this.unit_users_list();

        if (!this.month) {
            this.$router.push({ name: "BmUserEntryAll" });
        }
    },

    watch:{
        selected_user_id:function(){
            this.users_target = ""
            this.user_target();
        },
        selected_bm_category_id:function(){
            this.users_target = ""
            this.user_target();
            // this.existing_data();


        }
    },

    computed: {
        ...mapWritableState(data_store, ['month']),
        ...mapWritableState(bm_user_entry_store, ['unit_user_all']),
    },

    methods:{
        ...mapActions(bm_user_entry_store,{
            unit_users_list:'unit_users_list',
        }),
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    // console.log(this.bm_category);

                })
        },
        // unit_users_list:function(){
        //     axios.get('/user/show_unit_user')
        //         .then(responce =>{
        //             this.unit_user_all = responce.data
        //         })
        // },
        user_target:function(){
            if(this.selected_user_id != "" && this.selected_bm_category_id != ""){
                axios.get(`/bm-category-user/show_target/${this.selected_user_id}/${this.selected_bm_category_id}`)
                    .then(response =>{
                        if(response.data.status == 'success'){
                            if (response?.data?.data?.amount) {
                                this.users_target = response.data?.data?.amount + " Taka";
                            }

                        }
                        else if(response?.data?.err_message){
                            this.users_target = "Not set yet";
                        }
                    })
            }

        },
        // existing_data :async function(){
        //     let response = await  axios.get('/bm-paid/existing-data',{
        //                         params: {
        //                             category_id: this.selected_bm_category_id,
        //                         }
        //                     });

        //     if(response.data.status == "success"){
        //         this.amount = response.data.amount;
        //     }
        // },
        create_entry:function($event){
            $event.preventDefault();
            let e = $event;
            let formData = new FormData($event.target);
            // formData.append('month', this.month);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            axios.post('/bm-user-entry/store',formData)
                .then(function (response) {
                    console.log(response.statusText);
                    window.toaster('New BM entry Created successfuly', 'success');
                    e.target.reset();

                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },

    }
}
</script>

<style>

</style>
