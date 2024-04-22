<template>
    <div class="card">
        <div class="card-header">
            Create Bm Category
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_category">
                <input type="text" name="id" class="form-control d-none" :value="category_info.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Title</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="title" class="form-control" :value="category_info.title">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Description</label>
                    </div>
                    <div class="form_input">
                        <input type="text" name="description" :value="category_info.description" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Edit Category</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['category_id'],
    data:function(){
        return{
            category_info:[],
        }
    },
    created:function(){
        this.show_category();
    },
    methods:{
        show_category : function(){
            axios.get(`/bm-category/show/${this.category_id}`)
                .then(responce => {
                    this.category_info = responce.data
                })
        },
        edit_category:function(){
            event.preventDefault();
            let formData = new FormData(event.target);
            axios.post(`/bm-category/update`,formData)
                .then(function (response) {
                    window.toaster('BM Category Updated successfuly', 'success');
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
