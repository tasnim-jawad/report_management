<template>
    <div class="card">
        <div class="card-header">
            Show User
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th class="bg-red">Title</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{user_details.full_name}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{user_details.gender}}</td>
                        </tr>
                        <tr>
                            <td>telegram_name</td>
                            <td>{{user_details.telegram_name}}</td>
                        </tr>
                        <tr>
                            <td>telegram_id</td>
                            <td>{{user_details.telegram_id}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{user_details.email}}</td>
                        </tr>
                        <tr>
                            <td>blood_group</td>
                            <td>{{user_details.blood_group}}</td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td v-if="user_details.status == 1">Active</td>
                            <td v-if="user_details.status == 0">Deactive</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props: ['user_id'],
    data() {
        return {
            user_details:[],
        }
    },
    created:function(){
        this.show_users();
    },
    methods:{
        show_users : function(){
            // Accessing user_id prop
            // console.log(this.user_id);
            // console.log(this.$props.user_id);
            // Accessing user_id route parameter
            // const userId = this.$route.params.user_id;
            // console.log(userId);

            axios.get(`/user/show/${this.user_id}`)
                .then(responce => {
                    console.log(responce);
                    this.user_details = responce.data
                    console.log(this.user_details);
                })
        },

    }
}
</script>

<style>

</style>
