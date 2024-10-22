<template>
    <div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            জনশক্তি
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UserCreate'}" class="text-dark">Create User</router-link>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr class="table-dark eng">
                        <th>srl#</th>
                        <th>Name</th>
                        <th>Responsibility</th>
                        <th>Telegram Name</th>
                        <th>Blood Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user,index) in sortedUsers" :key="index">
                        <td>{{index + 1}}</td>
                        <td>{{user.full_name}}</td>
                        <td>{{user.org_ward_responsible?.responsibility?.title}}</td>
                        <td>{{user.telegram_name}}</td>
                        <td>{{user.blood_group}}</td>
                        <td>
                            <div class="action">
                                <div class="btn btn-success btn-sm me-2">
                                    <router-link :to="{name:'UserDetails',params: { user_id: user.id }}"  class="text-dark">show</router-link>
                                </div>
                                <div class="btn btn-warning btn-sm me-2">
                                    <router-link :to="{name:'UserEdit',params: { user_id: user.id }}"  class="text-dark">Edit</router-link>
                                </div>
                                <div class="btn btn-danger btn-sm">
                                    <a @click="delete_user(user.id)" class="text-dark">Delete</a>

                                    <form :id="'delete_user_form_'+user.id" >
                                        <input type="text" name="id" :value="user.id" class="d-none">
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
    data:()=>({
        users:[],
    }),
    created:function(){
        this.show_users();
    },
    methods:{
        show_users : function(){
            axios.get("ward/user/show")
                .then(responce => {
                    console.log(responce);

                    this.users = responce.data
                    console.log("responce",this.users);

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
        // sortedUsers:function() {
        //     if (this.users.length < 2) {
        //         return this.users;
        //     }
        //     return this.users.slice().sort((a, b) => {
        //         // Sort users by responsibility_id, with null/undefined at the end
        //         return (a.responsibility_id === null || a.responsibility_id === undefined)
        //         ? 1
        //         : (b.responsibility_id === null || b.responsibility_id === undefined)
        //         ? -1
        //         : a.responsibility_id - b.responsibility_id;
        //     });
        // }


        sortedUsers:function(){
            if (this.users.length < 2) {
                return this.users;
            }
            return this.users.sort((a, b) => {
                const responsibilityA = a.org_ward_responsible?.responsibility_id ?? Infinity;
                const responsibilityB = b.org_ward_responsible?.responsibility_id ?? Infinity;
                return responsibilityA - responsibilityB;
            });
        }

    },
}
</script>

<style>

</style>
