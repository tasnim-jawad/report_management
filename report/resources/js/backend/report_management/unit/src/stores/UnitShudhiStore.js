import { defineStore } from "pinia";

export const store = defineStore(`unit_shudhi_store`, {
    state: () => ({
        all_shudhi:[],
    }),
    actions: {
        all_unit_shudhi :async function(org_type = 'unit'){
            let response = await  axios.get('/unit-shudhi/all-unit-shudhi',{
                params: {
                    org_type: org_type,
                }
            });
            
            if (Array.isArray(response?.data?.data) && response.data.data.length > 0) {
                console.log(response.data.data);
                this.all_shudhi = response.data.data;
            } else {
                console.warn('No data found in response');
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
                const response = await axios.post('/bm-user-entry/destroy', formData);

                window.toaster('Entry deleted successfully', 'success');

                // Refresh the entries list (you can modify this to match your needs)
                this.show_bm_user_entry();
            } catch (error) {
                console.error(error);
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
