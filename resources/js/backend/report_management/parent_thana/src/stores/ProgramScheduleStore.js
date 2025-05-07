import { defineStore } from "pinia";

export const store = defineStore(`program_schedule_store`, {
    state: () => ({
        all_program_schedule:[],
    }),
    actions: {
        all_org_type_program_schedule:async function(org_type){
            try {
                
                let response = await axios.get('/program-schedule/org-type-wise-schedule', {
                    params: {
                        org_type: org_type
                    }
                });
                // console.log(response.data);
                
                if (response.data.status == 'success') {
                    this.all_program_schedule = response.data.data;

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
