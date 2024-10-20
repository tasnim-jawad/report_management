<template>
    <div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            জনশক্তি
            <input v-model="searchQuery" type="text" placeholder="Search by user name" />
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UnitJonoshoktiCreate'}" class="text-dark">Create User</router-link>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="table-dark eng">
                        <th>srl#</th>
                        <th>Name</th>
                        <th>Unit Name</th>
                        <th>Telegram Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user,index) in filtered_users" :key="index">
                        <td>{{index + 1}}</td>
                        <td>{{user['user_name']}}</td>
                        <td>{{user['unit']}}</td>
                        <td>{{user['responsibility']}}</td>
                        <td>
                            <div class="action">
                                <div class="btn btn-success btn-sm me-2">
                                    <router-link :to="{name:'ShowUser',params: { user_id: user.user_id }}"  class="text-dark">show</router-link>
                                </div>
                                <!-- <div class="btn btn-warning btn-sm me-2">
                                    <router-link :to="{name:'EditUser',params: { user_id: user.id }}"  class="text-dark">Edit</router-link>
                                </div> -->
                                <div class="btn btn-info btn-sm me-2">
                                    <router-link :to="{
                                                    name:'UnitJonoshoktiResponsibility',
                                                    params: {
                                                            user_id: user.user_id ,
                                                            unit_id: user.unit_id ,
                                                            responsibility_id: user.responsibility_id || '',
                                                        }
                                                    }"
                                                    class="text-dark">Responsibility</router-link>
                                </div>
                                <!-- <div class="btn btn-danger btn-sm">
                                    <a @click="delete_user(user.id)" class="text-dark">Delete</a>

                                    <form :id="'delete_user_form_'+user.id" >
                                        <input type="text" name="id" :value="user.id" class="d-none">
                                    </form>
                                </div> -->
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
    data:()=>({
        users:{},
        searchQuery: "",
    }),
    created:function(){
        this.show_users();
    },
    methods:{
        show_users : function(){
            axios.get("/ward/unit-jonoshokti/all")
                .then(responce => {
                    this.users = responce.data
                    console.log(this.users);

                })
        },
        delete_user : function(user_id){
            if (window.confirm("Are you sure you want to delete this user?")) {
                this.submit_delete_form(user_id);
            } else {
                window.toaster('user info is safe', 'info');
            }

        },
        submit_delete_form : function(user_id){
            event.preventDefault();
            const formData = new FormData(document.getElementById('delete_user_form_'+user_id));
            axios.post("/user/destroy",formData)
                    .then(responce => {
                        window.toaster('user delete successfuly', 'success');
                        this.show_users();
                    })
                    .catch(error => {
                        console.error(error);
                    });
        }

    },
    computed: {
        filtered_users() {
            // Convert the object to an array if needed and filter by the search query
            const users_array = Array.isArray(this.users) ? this.users : Object.values(this.users);
            return users_array.filter(user =>
                user.user_name.toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }

    }
}
</script>

<style>

</style>
