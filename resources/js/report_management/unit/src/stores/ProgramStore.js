import { defineStore } from "pinia";

export const store = defineStore(`program_store`, {
    state: () => ({
        all_program:[],
    }),
    actions: {
        all_unit_program: async function () {
            try {
                let response = await axios.get('/program/all-program', {
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
    }


})
