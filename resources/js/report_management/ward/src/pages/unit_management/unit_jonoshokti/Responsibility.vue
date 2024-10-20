<template>
    <div class="card">
        <div class="card-header">
            Create User
        </div>
        <div class="card-body">
            <form action="" @submit.prevent="set_responsibility">
                <input type="hidden" name="user_id" :value="user_id">

                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center" v-for="(field, index) in fields1" :key="index">
                    <div class="form_label">
                        <label for="">{{field.label}}</label>
                    </div>
                    <div class="form_input" v-if="field.field_type == 'select' && field.name == 'responsibility_id'">
                        <select type="text" :name="field.name" class="form-control" v-model="selected_responsibility_id">
                            <option value="">-- select responsibility --</option>
                            <option v-for="(responsibility, i) in responsibilities" :key="i" :value="responsibility['id']" >{{responsibility["title"]}}</option>
                        </select>
                    </div>
                    <div class="form_input" v-else-if="field.field_type == 'select' && field.name == 'unit_id'">
                        <select type="text" :name="field.name" class="form-control" v-model="selected_unit_id">
                            <option value="">-- select responsibility group --</option>
                            <option v-for="(unit, i) in units" :key="i" :value="unit['id']" >{{unit["title"]}}</option>
                        </select>
                    </div>
                    <div class="form_input" v-else>
                        <input type="text" class="form-control" :name="field.name" :value="user_details.full_name" disabled>
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
    props: ['user_id','unit_id','responsibility_id'],
    components:{
        FormInput
    },
    data() {
        return {
            user_details:[],
            responsibilities:[],
            units:[],
            selected_unit_id: "",
            selected_responsibility_id: "",
            fields1:[
                {
                    label:"Name",
                    name:"name",
                },
                {
                    label:"Responsibility",
                    field_type:"select",
                    name:"responsibility_id",
                },
                {
                    label:"Unit",
                    field_type:"select",
                    name:"unit_id",
                },
            ],


        }
    },
    created(){
        this.show_users();
        this.show_responsibility();
        this.all_units();

        this.selected_unit_id = this.unit_id;
        this.selected_responsibility_id = (this.responsibility_id == 1 || this.responsibility_id == 2) ? this.responsibility_id : "";
    },
    methods:{
        show_users : function(){
            axios.get(`/user/show/${this.user_id}`)
                .then(response => {
                    this.user_details = response.data
                })
        },

        all_units :async function(){
            let response =await axios.get('/ward/unit/all')
            if(response && response.data && response.data.data){
                this.units = response.data.data
            }
        },
        set_responsibility :async function(event){
            event.preventDefault();
            let formData = new FormData(event.target);
            try {
                let response = await axios.post('/ward/unit-jonoshokti/set-responsibility', formData);
                console.log('response', response);
                console.log('response.data', response.data);
                console.log('response.data.status', response.data.status);

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
                            this.responsibilities = response.data.data.slice(0, 2);
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
