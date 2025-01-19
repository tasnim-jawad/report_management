<template>
    <div class="card">
        <div class="card-header">
            নতুন ডেলিগেট নির্ধারণ করুন
        </div>
        <div class="card-body">
            <form action="">
                <div class="d-flex flex-wrap gap-2 mb-2 align-items-center">
                    <div class="d-flex align-items-center me-3">
                        <label class="label_width" for="">Select program</label>
                        <select class="form-control" name="program_id" id="program_id" v-model="selected_program">
                            <option value="">-- select program --</option>
                            <option v-for="(program, i) in all_program" :key="i" :value="program.id"  >{{program.title}}</option>
                        </select>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="text-center">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>srl#</th>
                                    <th>Delegate Name</th>
                                    <th>is Present</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in row_data" :key="index">
                                    <td>
                                        <a class="btn btn-sm btn-outline-danger" @click.prevent="delete_row(index)">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                    <td >{{ index + 1 }}</td>
                                    <td>
                                        <select class="form-control" name="user_id" v-model="row.user_id" :class="{ error: errors[index] && errors[index].user_id }">
                                            <option value="">-- select --</option>
                                            <option v-for="(user, i) in unit_user_all" :key="i" :value="user.id" 
                                            :disabled="already_selected_users.includes(user.id) && row.user_id !== user.id"
                                            >
                                                {{user.full_name}}
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="is_present" v-model="row.is_present">
                                            <option value="">-- select user --</option>
                                            <option value="0" >no</option>
                                            <option value="1" >yes</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="time" v-model="row.time" class="form-control" :class="{ error: errors[index] && errors[index].time }">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-end">
                        <a class="btn btn-sm btn-outline-primary" @click.prevent="add_row"> Add new delegate forthis program</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-3" @click.prevent="validate_data">নিশ্চিত করুন</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { store as data_store} from "../../../stores/ReportStore"
import { store as program_delegate_store} from "../../../stores/ProgramDelegateStore"
import { store as program_store} from "../../../stores/ProgramStore"
import { mapActions, mapWritableState } from 'pinia';
export default {
    data(){
        return {
            selected_program:"",
            row_data_object:{
                'user_id': null,
                'is_present': 0,
                'time': null,
            },
            row_data:[],
            errors: [],
        }
    },
    created:function(){
        this.all_unit_program();
        this.unit_users_list();
    },
    computed:{
        ...mapWritableState(program_store, [
            'all_program',
        ]),
        ...mapWritableState(program_delegate_store, [
            'unit_user_all',
            'all_program_delegate',
            'program_delegates',
        ]),
        already_selected_users() {
            return this.row_data?.map(row => row.user_id) || [];
        }
    },
    watch:{
        selected_program:async function(v){
            await this.program_wise_delegate(v)
            console.log('program_delegates',this.program_delegates);

            this.row_data = [];
            this.program_delegates.forEach((element) => {
                console.log(element.user_id);
                this.row_data.push({
                    user_id: element.user_id,
                    is_present: element.is_present,
                    time: element.time,
                });
            });

            
        }
    },
    methods:{
        ...mapActions(program_store,{
            all_unit_program:'all_unit_program'
        }),
        ...mapActions(program_delegate_store,{
            unit_users_list:'unit_users_list',
            program_wise_delegate:'program_wise_delegate',
        }),
        add_row:function(){
            this.row_data.push({...this.row_data_object})
        },
        delete_row(index) {
            this.row_data.splice(index, 1);
        },
        validate_data: function() {
            this.errors = [];
            let valid = true;

            this.row_data.forEach((row, index) => {
                let rowErrors = {};

                if (!row.user_id ) {
                    console.log(row.title, "row  =---". row,index);

                    rowErrors.user_id = 'user id is required';
                    valid = false;
                }

                if (!row.time) {
                    rowErrors.time = 'time is required';
                    valid = false;
                }

                this.errors[index] = rowErrors;


                //------ program_id error handaling ------\\
                let program_id_input = document.getElementById("program_id");
                if(!program_id_input.value){
                    program_id_input.classList.add("error");
                    valid = false;
                }else{
                    if (program_id_input.classList.contains("error")) {
                        program_id_input.classList.remove("error");
                    }
                }
                //------ date error handaling ------\\

            });
            console.log(this.errors);

            if (valid) {
                this.submitData();
            }
        },
        submitData: async function() {
            let program_id = document.getElementById("program_id").value;

            // let response = await this.import({
            //     'program_id': program_id,
            //     'data': this.row_data,
            // })

            let response = await axios.post('/program-delegate/store',{
                'program_id': program_id,
                'delegates': this.row_data,
            })
            console.log("response",response);
            
            if(response.data.status == 'success'){
                this.$router.push({ name: 'ProgramDelegateAllProgram'});
                window.toaster(
                    'Delegates updated successfully!',
                    'success',
                );
            }
        },

        // create_program_delegate:function(){
        //     event.preventDefault();
        //     let e = event;
        //     let formData = new FormData(event.target);
        //     formData.append('program_id', this.value);
        //     formData.append('org_type', 'unit');

        //     for (const entry of formData.entries()) {
        //         console.log(entry);
        //     }
        //     axios.post('/unit-shudhi/store',formData)
        //         .then(function (response) {
        //             console.log(response.data.status);
        //             if(response.data.status){
        //                 window.toaster('New Shudhi Created successfuly', 'success');
        //                 e.target.reset();
        //             }else{
        //                 window.toaster('Something is wrong', 'error');
        //                 e.target.reset();
        //             }
        //         })
        //         .catch(function (error) {
        //             console.log(error.response);
        //         });
        // },

    }
}
</script>

<style>
.error{
    background-color: #fed6d6;
    border: 1px solid red;
}
</style>
