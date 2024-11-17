<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Bm Category
            <!-- <div class="btn btn-info btn-sm">
                <router-link :to="{name:'CreateUser'}" class="text-dark">Edit</router-link>
            </div> -->
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Title</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{category_info.title}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{{category_info.description}}</td>
                        </tr>
                        <tr>
                            <td>Parent category</td>
                            <td>{{category_info?.parent_category?.title ?? '----'}}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    props:['category_id'],
    data:function(){
        return {
            category_info:[],
        }
    },
    created:function(){
        this.show_category();
    },
    methods:{
        show_category : function(){
            console.log();
            console.log(this.category_id);
            axios.get(`/bm-category/show/${this.category_id}`)
                .then(responce => {
                    this.category_info = responce.data
                })
        }
    }
}
</script>

<style>

</style>
