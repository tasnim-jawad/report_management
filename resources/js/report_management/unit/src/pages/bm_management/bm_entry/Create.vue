<template>
    <div class="card">
        <div class="card-header">
            Create Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_entry">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input" v-if="field.field_type == 'select'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select Category --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']" >{{bm_category["title"]}}</option>

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
                    label:"Title",
                    name:"bm_category_id",
                    field_type:"select",
                },
                {
                    label:"Amount",
                    name:"amount",
                },
            ],
            bm_category:[],

        }
    },
    created:function(){
        this.bm_category_list();
    },
    methods:{
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    // console.log(this.bm_category);

                })
        },
        create_entry:function(){
            event.preventDefault();
            let e = event;
            let formData = new FormData(event.target);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            axios.post('/bm-paid/store',formData)
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
