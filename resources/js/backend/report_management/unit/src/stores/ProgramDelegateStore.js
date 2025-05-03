import { defineStore } from "pinia";

export const store = defineStore(`program_delegate_store`, {
    state: () => ({
        all_program_delegate:[],
        program_delegates:[],
        count_delegates:[],
        unit_user_all:[],
    }),
    actions: {
        program_wise_delegate:async function(program_id){
            try {
                if(program_id != ""){
                    let response = await axios.get('/program-delegate/program-wise-delegate', {
                        params: {
                            program_id: program_id
                        }
                    });
                    // console.log(response.data);
                    
                    if (response.data.status == 'success') {
                        this.program_delegates = response.data.data;
                        this.count_delegates[program_id] = {
                            program_delegate_number: response.data.number_of_delegate
                        };
                    } else {
                        this.program_delegates=[];
                        console.warn('No data found in response:', response.data);
                    }
                }else{
                    console.warn('program is not selected yeat');
                }
            } catch (error) {
                console.error('Error fetching programs:', error.message);
            }
        },
        all_org_type_program_delegate: async function (org_type) {
            try {
                let response = await axios.get('/program-delegate/all-program-delegate', {
                    params: {
                        org_type: org_type
                    }
                });
        
                if (response.data.status === 'success') {
                    this.all_program_delegate = response.data.data.data;
                    
                } else {
                    console.warn('No data found in response:', response.data);
                }
            } catch (error) {
                console.error('Error fetching programs:', error.message);
            }
        },
        
        unit_users_list:function(){
            axios.get('/unit/user/show')
                .then(responce =>{
                    this.unit_user_all = responce.data
                })
        },

        previous_delegate:async function(program_id){
            let response = await axios.get('/program-delegate/')
        }
        
    }


})
