<template>
    <div class="card">
        <div class="card-header">
            BM Report
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <div class="d-flex">
                    <div class="d-flex align-items-center me-3">
                        <label class="label_width" for="">Select User</label>
                        <select type="text" class="form-control" v-model="selected_user_id" >
                            <option value="">-- select user --</option>
                            <option v-for="(user, i) in unit_user_all" :key="i" :value="user['id']" >{{user["full_name"]}}</option>

                        </select>
                    </div>
                    <div class="d-flex align-items-center">
                        <label class="label_width" for="">Select Category</label>
                        <select type="text"  class="form-control" v-model="selected_bm_category_id">
                            <option value="">-- select Category --</option>
                            <option v-for="(bm_category, i) in bm_category.data" :key="i" :value="bm_category['id']" >{{bm_category["title"]}}</option>

                        </select>
                    </div>
                </div>

                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th >Title</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr v-for="(category,index) in expense_categories" :key="index">
                            <td>{{category?.title}}</td>
                            <td>{{category?.description}}</td>
                            <td>{{category?.description}}</td>
                        </tr> -->
                        <tr>
                            <td>User</td>
                            <td >{{selected_user?.full_name}}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{selected_bm_category.title}}</td>
                        </tr>
                        <tr>
                            <td>Target</td>
                            <td>{{target}}</td>
                        </tr>
                        <tr>
                            <td>Paid Months</td>
                            <td>{{all_paid_info?.month_count}}</td>
                        </tr>
                        <tr>
                            <td>Total Target</td>
                            <td><span class="text-info">{{total_target}}</span></td>
                        </tr>
                        <tr>
                            <td>Paid</td>
                            <td><span class="text-success">- {{all_paid_info?.total}}</span></td>
                        </tr>
                        <tr>
                            <td>due</td>
                            <td><span class="text-danger">{{total_target - all_paid_info?.total}}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data:function(){
        return {
            selected_user_id:"",
            selected_bm_category_id:"",
            bm_category:[],
            unit_user_all:[],
            all_paid_info:[],
            target:"",
            selected_user:"",
            selected_bm_category:"",
            total_target:"",
            total_month:"",
        }
    },

    created:function(){
        this.bm_category_list();
        this.unit_users_list();
    },

    watch:{
        selected_user_id:function(){
            this.all_paid_info = "";
            this.total_target = 0;
            if(this.selected_user_id){
                this.selected_user = this.unit_user_all.find(user => user.id === this.selected_user_id);
            }else{
                this.selected_user = "";
            }
            this.users_bm_paid_report();

        },
        selected_bm_category_id:function(){
            this.all_paid_info = "";
            this.total_target = 0;
            console.log(this.bm_category);
            if(this.selected_bm_category_id){
                this.selected_bm_category = this.bm_category.data.find(category => category.id === this.selected_bm_category_id);
            }else{
                this.selected_bm_category = "";
            }
            this.users_bm_paid_report();
        },


    },

    methods:{
        bm_category_list:function(){
            axios.get('/bm-category/all')
                .then(responce => {
                    this.bm_category = responce.data
                    // console.log(this.bm_category);

                })
        },
        unit_users_list:function(){
            axios.get('/unit/user/show')
                .then(responce =>{
                    this.unit_user_all = responce.data
                })
        },
        users_bm_paid_report:function(){
            console.log(this.selected_user_id);
            console.log(this.selected_bm_category_id);
            if(this.selected_user_id != "" && this.selected_bm_category_id != ""){
                axios.get(`/bm-paid/bm-paid-report/${this.selected_user_id}/${this.selected_bm_category_id}`)
                    .then(response =>{
                        console.log("paid",response.data);
                        if(response.data.status == 'success'){
                            this.all_paid_info = response.data
                            // console.log("all_paid_info",this.all_paid_info);
                            // console.log("user name",this.all_paid_info?.data[0]?.user?.full_name);
                        }
                        else if(response?.data?.err_message){
                            // console.log(response.data.err_message);
                            this.all_paid_info = "Not set yet";
                        }
                    })

                axios.get(`/bm-category-user/show_target/${this.selected_user_id}/${this.selected_bm_category_id}`)
                    .then(response =>{
                        console.log("target",response.data);
                        if(response.data.status == 'success'){
                            this.target = response.data.data.amount
                            // console.log("target responce",this.target);
                            if(this.target){
                                this.total_target = this.target * this.all_paid_info.month_count
                            }else{
                                this.total_target = 0;
                            }
                        }
                        else if(response?.data?.err_message){
                            // console.log(response.data.err_message);
                            this.target = "Not set yet";
                        }
                    })
            }

        },
    }
}
</script>

<style>

</style>
