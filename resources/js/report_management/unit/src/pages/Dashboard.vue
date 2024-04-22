<template>
    <div class="card">
        <div class="card-header">
            All Unit User
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th class="bg-red">Name</th>
                            <th>Resposibility</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(unit_user,index) in user_details" :key="index">
                            <td>{{unit_user.full_name}}</td>
                            <td>{{unit_user.org_unit_responsible[0].responsibility.title}}</td>
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
            axios.get(`/user/show_unit_user`)
                .then(responce => {
                    console.log(responce.data);
                    this.user_details = responce.data
                    console.log(this.user_details[0].full_name);

                })
        },

    }
}
</script>

<style>

</style>
