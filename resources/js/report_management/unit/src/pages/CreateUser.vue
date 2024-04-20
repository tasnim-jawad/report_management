<template>
    <div class="card">
        <div class="card-header">
            Create User
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="create_user">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input" v-if="field.field_type == 'select' && field.name == 'gender'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select gender --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'blood_group'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select blood group --</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'responsibility_id'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select responsibility group --</option>
                            <option v-for="(responsibility, i) in responsibilities.data" :key="i" :value="responsibility['id']" >{{responsibility["title"]}}</option>

                        </select>
                    </div>
                    <div class="form_input" v-else>
                        <input type="text" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Create User</button>
            </form>
        </div>
    </div>
</template>

<script>
import FormInput from '../components/FormInput.vue'

export default {
    components:{
        FormInput
    },
    data() {
        return {
            responsibilities:[],
            fields1:[
                // {
                //     label:"Role",
                //     name:"role",
                // },
                {
                    label:"Name",
                    name:"full_name",
                },
                {
                    label:"Gender",
                    field_type:"select",
                    name:"gender",
                },
                {
                    label:"Telegram Name",
                    name:"telegram_name",
                },
                {
                    label:"Telegram id",
                    name:"telegram_id",
                },
                {
                    label:"Email",
                    name:"email",
                },
                {
                    label:"Password",
                    name:"password",
                },
                {
                    label:"Blood Group",
                    field_type:"select",
                    name:"blood_group",
                },
                {
                    label:"Responsibility",
                    field_type:"select",
                    name:"responsibility_id",
                },
            ],


        }
    },
    created(){
        this.show_responsibility();
    },
    methods:{
        // show_users : function(){
        //     axios.get("/user/all")
        //         .then(responce => {
        //             this.users = responce.data
        //         })
        // },
        create_user : function(event){
            event.preventDefault();
            let formData = new FormData(event.target);
            axios.post('/user/store_unit_user',formData)
                .then(function (response) {
                    console.log(response.statusText);
                    window.toaster('user create successfuly', 'success');
                })
                .catch(function (error) {
                    console.log(error.response);
                });
        },
        show_responsibility : function(){
            axios.get("/responsibility/all")
                .then(responce => {
                    this.responsibilities = responce.data
                    console.log(this.responsibilities.data);
                })
        },

    }
}
</script>

<style>

</style>
