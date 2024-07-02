<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            Show All Bm Entry
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'BmEntryCreate'}" class="text-dark">Create Entry</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Name</th>
                            <th>Category</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(entry,index) in bm_entry" :key="index">
                            <td>{{entry.user.full_name}}</td>
                            <td>{{entry.bm_category.title}}</td>
                            <td>{{ new Date(entry.month).toLocaleString('default', { month: 'long' }) +' ' + new Date(entry.month).getFullYear().toString().slice(-2)}}</td>
                            <td>{{entry.amount}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'BmEntryDetails',params: { entry_id: entry.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'BmEntryEdit',params: { entry_id: entry.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm">
                                        <a @click="delete_entry(entry.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_entry_form_'+entry.id" >
                                            <input type="text" name="id" :value="entry.id" class="d-none">
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
            bm_entry:[],
        }
    },

    created:function(){
        this.show_bm_entry()
    },
    methods:{
        show_bm_entry : function(){
            axios.get('/bm-paid/single-unit')
                .then(response => {
                    this.bm_entry = response.data
                    console.log(this.bm_entry);

                })
        },
        delete_entry : function(entry_id){
            if (window.confirm("Are you sure you want to delete this Entry?")) {
                this.submit_delete_form(entry_id);
            } else {
                window.toaster('Entry is safe', 'info');
            }

        },
        submit_delete_form : function(entry_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_entry_form_'+entry_id));
            axios.post("/bm-paid/destroy",formData)
                    .then(response => {
                        // console.log(response);
                        window.toaster('Entry delete successfuly', 'success');
                        this.show_bm_entry();
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
