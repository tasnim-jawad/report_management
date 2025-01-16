import { defineStore } from "pinia";

export const store = defineStore(`program_store`, {
    state: () => ({
        all_program_delegate:[],
        unit_user_all:[],
    }),
    actions: {
        all_unit_program_delegate: async function () {
            try {
                let response = await axios.get('/program-delegate/all-program-delegate', {
                    params: {
                        org_type: 'unit'
                    }
                });
        
                if (response.data.status === 'success') {
                    this.all_program = response.data.data.data;
                    
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
