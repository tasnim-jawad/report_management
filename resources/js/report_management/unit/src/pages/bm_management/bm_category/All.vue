<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Show All Bm Category
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmCategoryCreate'}" class="text-dark">Create Category</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th >Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(category,index) in categories" :key="index">
                            <td>{{category.title}}</td>
                            <td>{{category.description}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'BmCategoryDetails',params: { category_id: category.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'BmCategoryEdit',params: { category_id: category.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_category(category.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_category_form_'+category.id" >
                                            <input type="text" name="id" :value="category.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            categories:[],
        }
    },

    created:function(){
        this.show_bm_category()
    },
    methods:{
        show_bm_category : function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.categories = responce.data.data
                    console.log(this.categories);

                })
        },
        delete_category : function(category_id){
            if (window.confirm("Are you sure you want to delete this category?")) {
                this.submit_delete_form(category_id);
            } else {
                window.toaster('user info is safe', 'info');
            }

        },
        submit_delete_form : function(category_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_category_form_'+category_id));
            axios.post("/bm-category/destroy",formData)
                    .then(responce => {
                        console.log(responce);
                        window.toaster('category delete successfuly', 'success');
                        this.show_bm_category();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }
    }

}
</script>

<style>

</style>
