import { defineStore } from "pinia";

export const store = defineStore(`comment_store`, {
    state: () => ({
        org_type: null,
        org_type_id: null,
        month_year: null,
        table_name: null,
        column_name: null,
        comment_text: '',
        all_comment: [],
    }),
    // getters: {
    //     $init: () => {
    //         this.set_month(); // Call set_month when the store is initialized
    //     }
    // },
    actions: {
        modal_show: function (
            table_name,
            column_name,
            org_type,
            org_type_id,
            month_year,
        ) {
            let modalElement = new window.bootstrap.Modal(document.getElementById("comment_modal"), {
                keyboard: false,
            });
            // console.log("model show");
            // let params = {
            //     month: month_year,
            //     org_type: org_type,
            //     org_type_id: org_type_id,
            //     table_name: table_name,
            //     column_name: column_name,
            // }

            // console.log("from modal show", params);

            this.get_column_comment_all(
                table_name,
                column_name,
                org_type,
                org_type_id,
                month_year
            )

            modalElement.show();

            this.org_type = org_type;
            this.org_type_id = org_type_id;
            this.month_year = month_year;
            this.table_name = table_name;
            this.column_name = column_name;
        },

        get_column_comment_all: async function (
            table_name,
            column_name,
            org_type,
            org_type_id,
            month_year
        ) {

            let response = await axios.get('/comment/column-comment-all', {
                params: {
                    month: month_year,
                    org_type: org_type,
                    org_type_id: org_type_id,
                    table_name: table_name,
                    column_name: column_name,
                }
            })
            console.log(response);

            if (response.data.status == 'success') {
                this.all_comment = response?.data?.data;
                console.log('all_comment', this.all_comment);

            }

        },
        comment_set: async function (
            comment_text
        ) {
            if (comment_text.trim() === '') {
                console.log('Comment cannot be empty.');
                return;
            }

            // Simulate storing the data or sending it to an API
            let params = {
                month: this.month_year,
                org_type: this.org_type,
                org_type_id: this.org_type_id,
                table_name: this.table_name,
                column_name: this.column_name,
                comment_text: comment_text,
            }
            console.log("comment store", params);

            let response = await axios.post('/comment/store', {
                month: `${this.month_year}-01`,
                org_type: this.org_type,
                org_type_id: this.org_type_id,
                table_name: this.table_name,
                column_name: this.column_name,
                comment: comment_text,
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
        }
    }


})
