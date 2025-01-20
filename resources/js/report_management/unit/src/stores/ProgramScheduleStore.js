import { defineStore } from "pinia";

export const store = defineStore(`program_delegate_store`, {
    state: () => ({
        all_program_schedule:[],
    }),
    actions: {
        all_unit_program_schedule:async function(){
            try {
                
                let response = await axios.get('/program-schedule/unit-wise-schedule', {
                    params: {
                        org_type: unit
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
                
            } catch (error) {
                console.error('Error fetching programs:', error.message);
            }
        },
        
    }


})
