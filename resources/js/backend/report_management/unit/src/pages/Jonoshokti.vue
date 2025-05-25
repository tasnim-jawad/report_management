<template>
    <div>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                জনশক্তি
                <div class="btn btn-info btn-sm">
                    <router-link :to="{name:'CreateUser'}" class="text-dark">Create User</router-link>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr class="table-dark eng">
                            <th>srl#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>responsibility</th>
                            <th>Blood Group</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user,index) in sortedUsers" :key="index">
                            <td>{{index + 1}}</td>
                            <td>{{user.full_name}}</td>
                            <td>{{user.gender}}</td>
                            <td>{{user.org_unit_responsible[0]?.responsibility?.title}}</td>
                            <td>{{user.blood_group}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'ShowUser',params: { user_id: user.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2">
                                        <router-link :to="{name:'EditUser',params: { user_id: user.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm" v-if="user.org_unit_responsible[0]?.responsibility?.id !== 1">
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
            axios.get("/unit/user/show")
                .then(responce => {
                    this.users = responce.data
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
        sortedUsers:function(){
            if (this.users.length < 2) {
                return this.users;
            }
            console.log('sort',this.users);

            return this.users?.sort((a, b) => {
                // console.log('only a',a);
                // console.log('only b',b);
                // console.log('a',a.org_unit_responsible?.responsibility_id);
                // console.log('b',b.org_unit_responsible?.responsibility_id);
                const responsibilityA = a.org_unit_responsible[0]?.responsibility_id ?? Infinity;
                const responsibilityB = b.org_unit_responsible[0]?.responsibility_id ?? Infinity;
                // console.log("ss",responsibilityA ,responsibilityB,responsibilityA - responsibilityB);

                return responsibilityA - responsibilityB;
            });
        }

    },
}
</script>

<style>

</style>
