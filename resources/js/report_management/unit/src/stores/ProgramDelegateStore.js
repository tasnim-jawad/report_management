import { defineStore } from "pinia";

export const store = defineStore(`program_delegate_store`, {
    state: () => ({
        all_program_delegate:[],
        unit_user_all:[],
    }),
    actions: {
        program_wise_delegate:async function(program_id){
            try {
                let response = await axios.get('/program-delegate/all-program-delegate', {
                    params: {
                        program_id: program_id
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
        all_unit_program_delegate: async function () {
            try {
                let response = await axios.get('/program-delegate/all-program-delegate', {
                    params: {
                        org_type: 'unit'
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
            axios.get('/user/show_unit_user')
                .then(responce =>{
                    this.unit_user_all = responce.data
                })
        },
        
    }


})
