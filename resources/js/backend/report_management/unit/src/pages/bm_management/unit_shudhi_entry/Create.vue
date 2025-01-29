<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Create Shudhi Entry
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitShudhiEntryAll'}" class="text-dark">আয়ের বিবরণ</router-link>
            </div>
        </div>
        <div class="card-body">
            <!-- <p class="mb-3" >Target:-  {{users_target}}</p> -->
            <form action="" @submit.prevent="create_entry">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input" v-if="field.field_type == 'select' && field.name == 'shudhi_id'">
                        <select type="text" :name="field.name" class="form-control" v-model="selected_user_id" >
                            <option value="">-- select user --</option>
                            <option v-for="(shudhi, i) in unit_shudhi_all" :key="i" :value="shudhi['id']" >{{shudhi["name"]}}</option>

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
                        <input :type="field.field_type" :name="field.name" class="form-control" v-model="amount">
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
import { store as bm_user_entry_store} from "../../../stores/UnitShudhiEntryStore";
import { mapActions, mapWritableState } from 'pinia';

export default {
    data(){
        return {
            fields1:[
                {
                    label:"নাম",
                    name:"shudhi_id",
                    field_type:"select",
                },
                {
                    label:"খাত",
                    name:"bm_category_id",
                    field_type:"select",
                },
                {
                    label:"তারিখ",
                    name:"month",
                    field_type:"date",
                },
                {
                    label:"টাকার পরিমাণ",
                    name:"amount",
                    field_type:"number",
                },
            ],
            bm_category:[],
            // unit_user_all:[],
            shudhi_target:"",
            selected_shudhi_id:"",
            selected_bm_category_id:"",
            amount: "",

        }
    },
    created:function(){
        this.bm_category_list();
        this.unit_shudhi_list();

        if (!this.month) {
            this.$router.push({ name: "UnitShudhiEntryAll" });
        }
    },

    watch:{
        selected_user_id:function(){
            this.users_target = ""
            this.shudhi_target();
        },
        selected_bm_category_id:function(){
            this.users_target = ""
            this.shudhi_target();
            // this.existing_data();


        }
    },

    computed: {
        ...mapWritableState(data_store, ['month']),
        ...mapWritableState(bm_user_entry_store, ['unit_shudhi_all']),
    },

    methods:{
        ...mapActions(bm_user_entry_store,{
            unit_shudhi_list:'unit_shudhi_list',
        }),
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    // console.log(this.bm_category);

                })
        },
        shudhi_target:function(){
            console.log("shudhi_target is not functional, after update it will work");
            
            // if(this.selected_shudhi_id != "" && this.selected_bm_category_id != ""){
            //     axios.get(`/unit-shudhi/show/${this.selected_user_id}/${this.selected_bm_category_id}`)
            //         .then(response =>{
            //             if(response.data.status == 'success'){
            //                 if (response?.data?.data?.amount) {
            //                     this.users_target = response.data?.data?.amount + " Taka";
            //                 }

            //             }
            //             else if(response?.data?.err_message){
            //                 this.users_target = "Not set yet";
            //             }
            //         })
            // }

        },
        create_entry:function($event){
            $event.preventDefault();
            let e = $event;
            let formData = new FormData($event.target);
            // formData.append('month', this.month);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            axios.post('/unit-shudhi-entry/store',formData)
                .then(function (response) {
                    console.log(response.statusText);
                    window.toaster('New shudhi entry Created successfuly', 'success');
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
