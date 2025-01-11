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
                    <!-- <div class="form_input" v-if="field.field_type == 'select' && field.name == 'gender'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select gender --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div> -->
                    <div class="form_input" v-if="field.field_type == 'select' && field.name == 'blood_group'">
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
                            <option v-for="(responsibility, i) in responsibilities" :key="i" :value="responsibility['id']" >{{responsibility["title"]}}</option>
                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'unit_id'">
                        <select type="text" :name="field.name" class="form-control">
                            <option value="">-- select unit --</option>
                            <option v-for="(unit, i) in units" :key="i" :value="unit['id']" >{{unit["title"]}}</option>
                        </select>
                    </div>
                    <div class="form_input" v-else>
                        <input :type="field?.field_type || 'text'" :name="field.name" class="form-control">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3">Create User</button>
            </form>
        </div>
    </div>
</template>

<script>
import FormInput from '../../../components/FormInput.vue'

export default {
    components:{
        FormInput
    },
    data() {
        return {
            responsibilities:[],
            units:[],
            fields1:[
                {
                    label:"Unit",
                    field_type:"select",
                    name:"unit_id",
                },
                {
                    label:"Responsibility",
                    field_type:"select",
                    name:"responsibility_id",
                },
                // {
                //     label:"Role",
                //     name:"role",
                // },
                {
                    label:"Name",
                    name:"full_name",
                    field_type:"text",
                },
                // {
                //     label:"Gender",
                //     field_type:"select",
                //     name:"gender",
                // },
                {
                    label:"Telegram Name",
                    name:"telegram_name",
                    field_type:"text",
                },
                {
                    label:"Telegram id",
                    name:"telegram_id",
                    field_type:"text",
                },
                {
                    label:"Email",
                    name:"email",
                    field_type:"email",
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
                
            ],


        }
    },
    created(){
        this.show_responsibility();
        this.all_units();
    },
    methods:{
        all_units :async function(){
            let response =await axios.get('/ward/unit/all')
            console.log("Response:",response);
            if(response && response.data && response.data.data){
                this.units = response.data.data
                console.log("Units",this.units);
            }
        },
        create_user :async function(event){
            event.preventDefault();
            let formData = new FormData(event.target);
            try {
                let response = await axios.post('/ward/unit-jonoshokti/store', formData);
                if (response.data.status === 'success') {
                    window.toaster('User created successfully', 'success');
                }
            } catch (error) {
                // Handling error response
                if (error.response && error.response.status === 409) {
                    let errMessage = error.response.data.err_message || 'An error occurred';
                    window.toaster(errMessage, 'error');
                    window.s_alert(errMessage, 'error');
                } else {
                    // For other errors (e.g. 500, 422, etc.)
                    window.toaster('An unexpected error occurred', 'error');
                    console.log('Error', error);
                }
            }

        },
        show_responsibility : function(){
            axios.get("/responsibility/all")
                    .then(response => {
                        if (Array.isArray(response.data.data)) {
                            // this.responsibilities = response.data.data.slice(0, 2);   //(শুধু সভাপতি এবং সেক্রেটারি দেখানোর জন্য)
                            this.responsibilities = response.data.data; // (সব দায়িত্ব দেখানোর জন্য) 
                        } else {
                            console.error("Expected an array but got:", typeof response.data);
                        }
                    })
                    .catch(error => {
                        console.error("Error fetching responsibilities:", error);
                    });
        },

    }
}
</script>

<style>

</style>
