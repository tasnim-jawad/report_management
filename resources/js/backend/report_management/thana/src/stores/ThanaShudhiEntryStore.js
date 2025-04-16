import { defineStore } from "pinia";

export const store = defineStore(`thana_shudhi_entry_store`, {
    state: () => ({
        thana_shudhi_entry:[],
        total_paid:[],
        is_permitted: false,
        thana_shudhi_all:[]
        
    }),
    actions: {
        show_thana_shudhi_entry :async function(){
            let response = await  axios.get('/thana-shudhi-entry/all');

            if(response.data.status == "success"){
                this.thana_shudhi_entry = response?.data?.data?.data;
                console.log("from store thana shudhi entry" ,this.thana_shudhi_entry);
                
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
                const response = await axios.post('/thana-shudhi-entry/destroy', formData);

                window.toaster('Entry deleted successfully', 'success');

                // Refresh the entries list (you can modify this to match your needs)
                this.show_thana_shudhi_entry();
            } catch (error) {
                console.error(error);
            }
        },

        thana_shudhi_list:async function(){
            await axios.get('/thana-shudhi/show-thana-shudhi')
                .then(responce =>{
                    this.thana_shudhi_all = responce.data
                })
        },

        thana_shudhi_entry_month_wise:async function(){
            let month = event.target.value;
            console.log("thana shudhi entry ",month);
            
            
            await axios.get('/thana-shudhi-entry/month-wise-entry-show', {
                params: {
                    month: `${month}-01`
                }
            })
                .then(responce =>{
                    this.thana_shudhi_entry = responce.data.data
                    console.log("month change ",this.thana_shudhi_entry );
                    
                })
        },

    }


})
