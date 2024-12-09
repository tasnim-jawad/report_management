import { defineStore } from "pinia";

export const store = defineStore(`comment_store`, {
    state: () => ({
        org_type: null,
        org_type_id: null,
        month_year: null,
        table_name: null,
        column_name: null,
        is_data_are_set: false,
        comment_text: '',
        all_comment: [],
        all_comment_count: [],
    }),
    actions: {
        modal_show: function (table_name, column_name) {

            let modalElement = new window.bootstrap.Modal(document.getElementById("comment_modal"), {
                keyboard: false,
            });

            modalElement.show();
            this.get_column_comment_all(table_name, column_name);

            this.table_name = table_name;
            this.column_name = column_name;
        },

        get_column_comment_all: async function (table_name, column_name) {
            let response = await axios.get('/comment/column-comment-all', {
                params: {
                    month: this.month_year,
                    org_type: this.org_type,
                    org_type_id: this.org_type_id,
                    table_name: table_name,
                    column_name: column_name,
                }
            })
            console.log(response);

            if (response.data.status == 'success') {
                this.all_comment = [...response?.data?.data];
                console.log('all_comment', this.all_comment);

            }

        },
        comment_set: async function () {
            console.log("store", this.comment_text);

            if (this.comment_text.trim() === '') {
                console.log('Comment cannot be empty.');
                return;
            }

            // Simulate storing the data or sending it to an API
            let response = await axios.post('/comment/store', {
                month: `${this.month_year}-01`,
                org_type: this.org_type,
                org_type_id: this.org_type_id,
                table_name: this.table_name,
                column_name: this.column_name,
                comment: this.comment_text,
            })
            console.log(response);

            if (response.data.status == 'success') {
                console.log();

                this.get_column_comment_all(
                    this.table_name,
                    this.column_name,
                    this.org_type,
                    this.org_type_id,
                    this.month_year
                );
            }

            // Reset the textarea after submitting
            this.comment_text = '';
        },
        comment_count: async function () {
            // let params = {
            //     month: `${this.month_year}-01`,
            //     org_type: this.org_type,
            //     org_type_id: this.org_type_id,
            // }
            // console.log("comment_count", params);


            let response = await axios.get('/comment/count-comment', {
                params: {
                    month: `${this.month_year}-01`,
                    org_type: this.org_type,
                    org_type_id: this.org_type_id,
                }
            })
            console.log(response);

            if (response.data.status == 'success') {
                this.all_comment_count = response.data.data;
            }
        }
    }


})
