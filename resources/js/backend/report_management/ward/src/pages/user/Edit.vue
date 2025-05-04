<template>
    <div class="card mb-3" >
        <div class="card-header d-flex justify-content-between align-items-center">
            জনশক্তি তথ্য এডিট করুন
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'UserAll'}" class="text-dark">জনশক্তি তালিকা</router-link>
            </div>
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="edit_user">
                <input type="text" name="id" class="form-control d-none" :value="user_details.id">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Name</label>
                    </div>
                    <div class="form_input" >
                        <input type="text" name="full_name" class="form-control" :value="user_details.full_name">
                    </div>

                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Telegram Name</label>
                    </div>
                    <div class="form_input" >
                        <input type="text" name="telegram_name" class="form-control" :value="user_details.telegram_name">
                    </div>

                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Telegram id</label>
                    </div>
                    <div class="form_input" >
                        <input type="text" name="telegram_id" class="form-control" :value="user_details.telegram_id">
                    </div>

                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Email</label>
                    </div>
                    <div class="form_input" >
                        <input type="text" name="email" class="form-control" :value="user_details.email">
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                    <div class="form_label">
                        <label for="">Blood Group</label>
                    </div>
                    <div class="form_input" >
                        <select type="text" name="blood_group" class="form-control">
                            <option value="">-- select blood group --</option>
                            <option value="O+" :selected="user_details.blood_group == 'O+'">O+</option>
                            <option value="O-" :selected="user_details.blood_group == 'O-'">O-</option>
                            <option value="AB+" :selected="user_details.blood_group == 'AB+'">AB+</option>
                            <option value="AB-" :selected="user_details.blood_group == 'AB-'">AB-</option>
                            <option value="A+" :selected="user_details.blood_group == 'A+'">A+</option>
                            <option value="A-" :selected="user_details.blood_group == 'A-'">A-</option>
                            <option value="B+" :selected="user_details.blood_group == 'B+'">B+</option>
                            <option value="B-" :selected="user_details.blood_group == 'B-'">B-</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-if="user_responsibile.responsibility_id != 1 && user_responsibile.responsibility_id != 2">
                    <div class="form_label">
                        <label for="">Responsibility</label>
                    </div>
                    <div class="form_input">
                        <select type="text" name="responsibility_id" class="form-control" >
                            <option value="">-- select responsibility group --</option>
                            <option v-for="(responsibility, i) in responsibilities" :key="i"
                                    :value="responsibility['id']"
                                    :selected="user_responsibile.responsibility_id == responsibility['id']" >{{responsibility["title"]}}</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">update user</button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user_id'],
    data() {
        return {
            user_details:[],
            responsibilities:[],
            user_responsibile:[],
        }
    },
    created:function(){
        this.show_users();
        this.show_responsibility();
        this.user_responsibility();
    },
    methods:{
        show_users : function(){
            axios.get(`/user/show/${this.user_id}`)
                .then(response => {
                    console.log(response);
                    this.user_details = response.data
                    console.log(this.user_details);
                })
        },
        edit_user : function(event){
            event.preventDefault();
            console.log(event.target);
            let formData = new FormData(event.target);
            console.log(formData);
            axios.post('/ward/user/update',formData)
                .then(function (response) {
                    console.log(response.statusText);
                    window.toaster('user updated successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },
        show_responsibility : function(){
            axios.get("/responsibility/all")
                .then(response => {
                    if (Array.isArray(response.data.data)) {
                        this.responsibilities = response.data.data.slice(2);
                    } else {
                        console.error("Expected an array but got:", typeof response.data);
                    }
                })
        },
        user_responsibility : function(){
            console.log(this.user_id);
            axios.get(`/org-ward-responsible/show-user/${this.user_id}`)
                .then(response => {
                    this.user_responsibile = response.data
                    // console.log(this.user_responsibile);
                })
                .catch(function (error) {
                    // console.log(error.response);
                    window.toaster('user has no responsibility', 'warning');
                });
        },

    }

}
</script>
