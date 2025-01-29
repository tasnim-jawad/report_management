import { defineStore } from "pinia";

export const store = defineStore(`unit_shudhi_entry_store`, {
    state: () => ({
        unit_shudhi_entry:[],
        total_paid:[],
        is_permitted: false,
        unit_shudhi_all:[]
        
    }),
    actions: {
        show_unit_shudhi_entry :async function(){
            let response = await  axios.get('/unit-shudhi-entry/all');

            if(response.data.status == "success"){
                this.unit_shudhi_entry = response?.data?.data?.data;
                console.log("from store unit shudhi entry" ,this.unit_shudhi_entry);
                
            }
        },

        delete_entry : function(entry_id){
            if (window.confirm("Are you sure you want to delete this Entry?")) {
                this.submit_delete_form(entry_id);
            } else {
                window.toaster('Entry is safe', 'info');
            }

        },

        submit_delete_form :async function(entry_id){
            try {
                const form = document.getElementById('delete_entry_form_' + entry_id);
                console.log("from from",form);
                
                if (!form) {
                    console.error('Form not found!');
                    return;
                }

                const formData = new FormData(form);
                const response = await axios.post('/unit-shudhi-entry/destroy', formData);

                window.toaster('Entry deleted successfully', 'success');

                // Refresh the entries list (you can modify this to match your needs)
                this.show_unit_shudhi_entry();
            } catch (error) {
                console.error(error);
            }
        },

        unit_shudhi_list:async function(){
            await axios.get('/unit-shudhi/show-unit-shudhi')
                .then(responce =>{
                    this.unit_shudhi_all = responce.data
                })
        },

        unit_shudhi_entry_month_wise:async function(){
            let month = event.target.value;
            console.log("unit shudhi entry ",month);
            
            
            await axios.get('/unit-shudhi-entry/month-wise-entry-show', {
                params: {
                    month: `${month}-01`
                }
            })
                .then(responce =>{
                    this.unit_shudhi_entry = responce.data.data
                    console.log("month change ",this.unit_shudhi_entry );
                    
                })
        },

    }


})
