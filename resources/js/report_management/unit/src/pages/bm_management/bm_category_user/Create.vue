<template>
    <div class="card">
        <div class="card-header">
            Create Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_category_user">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input" v-if="field.field_type == 'select' && field.name == 'user_id'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select User --</option>
                            <option v-for="(user, i) in unit_user_all" :key="i" :value="user['id']" >{{user["full_name"]}}</option>

                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'bm_category_id'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select Category --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']" >{{bm_category["title"]}}</option>

                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'is_active'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select activity --</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>

                        </select>
                    </div>
                    <div class="form_input" v-else>
                        <input type="text" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Create Category</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
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
                    label:"Amount",
                    name:"amount",
                },
                {
                    label:"Activity",
                    name:"is_active",
                    field_type:"select",
                },
            ],
            bm_category:[],
            unit_user_all:[],

        }
    },
    created:function(){
        this.bm_category_list();
        this.unit_users_list();
    },
    methods:{
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    // console.log(this.bm_category);

                })
        },
        unit_users_list:function(){
            axios.get('/user/show_unit_user')
                .then(responce =>{
                    console.log(responce);
                    this.unit_user_all = responce.data
                    console.log('users' ,this.unit_user_all);
                })
        },
        create_category_user:function(){
            event.preventDefault();
            let e = event;
            let formData = new FormData(event.target);
            for (const entry of formData.entries()) {
                console.log(entry);
            }
            axios.post('/bm-category-user/store',formData)
                .then(function (response) {
                    console.log(response.data.status);
                    if(response.data.status){
                        window.toaster('New BM category user Created successfuly', 'success');
                        e.target.reset();
                    }else{
                        window.toaster('Target already have', 'error');
                        e.target.reset();
                    }


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
