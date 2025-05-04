<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            ব্যক্তিগত ধার্য এডিট করুন
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmCategoryUserAll'}" class="text-dark">সকল ব্যক্তিগত ধার্যের তালিকা</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_category_user">
                <input type="text" name="id" class="form-control d-none" :value="category_user.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <select type="text" name="bm_category_id" class="form-control">
                            <option value="">-- select responsibility group --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']"
                            :selected="bm_category['id'] === category_user.bm_category_id">{{bm_category["title"]}}</option>

                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Amount</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="amount" :value="category_user.amount" class="form-control">
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
    props:['category_user_id'],
    data:function(){
        return{
            category_user:[],
            bm_category:[],
        }
    },
    created:function(){
        this.show_category_user();
        this.bm_category_list();
    },
    methods:{
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    console.log(this.bm_category);
                })
        },
        show_category_user : function(){
            axios.get(`/bm-category-user/show/${this.category_user_id}`)
                .then(responce => {
                    if(responce.data.status == "success"){
                        this.category_user = responce.data.data
                    }
                })
        },
        edit_category_user:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            // for (const entry of formData.entries()) {
            //     console.log(entry);
            // }
            if(window.confirm("Are you sure you want to Edit this Category User?")){
                axios.post(`/bm-category-user/update`,formData)
                    .then(function (response) {
                        window.toaster('BM Entry Updated successfuly', 'success');
                    })
                    .catch(function (error) {
                        console.log(error.response);
                    });
            }

        }
    }
}
</script>

<style>

</style>
