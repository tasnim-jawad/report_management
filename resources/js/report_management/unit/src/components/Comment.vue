<template>
    <div class="comment_icon">
        <span class="i_icon" @click="modal_show(table_name, column_name)">
            <i class="fa fa-list"></i>
        </span>
        <div class="number_of_comments">
            <p>3</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { store as comment_store } from "../stores/CommentStore";
import { mapActions, mapWritableState } from "pinia";

export default {
    props: {
        table_name: {
            type: String,
            required: true,
        },
        column_name: {
            type: String,
            required: true,
        },
    },

    data() {
        return {
            is_popup_visible: false,
            all_comment: [],
            comment_text: '',
            debounce_timer: null,
        };
    },
    created: function () {
        this.table_name_store = this.table_name;
        this.column_name_store = this.column_name;
        // console.log(this.table_name_store, this.column_name_store);
        // setTimeout(() => {
        //     this.count_comment();
        // }, 500);
        // if(this.is_data_are_set){
        //     this.count_comment();
        // }


    },
    computed: {
        ...mapWritableState(comment_store, {
            table_name_store: 'table_name',
            column_name_store: 'column_name',

            org_type_store: 'org_type',
            org_type_id_store: 'org_type_id',
            month_year_store: 'month_year',
            is_data_are_set: 'is_data_are_set',
        }),

        is_ready_to_count: function () {
            return (
                this.org_type_store &&
                this.org_type_id_store &&
                this.month_year_store
            );
        },
    },
    watch: {
        table_name: {
            immediate: true,
            handler(new_value) {
                this.table_name_store = new_value;
            },
        },
        column_name: {
            immediate: true,
            handler(new_value) {
                this.column_name_store = new_value;
            },
        },
        is_data_are_set: function (v) {
                if (
                    v &&
                    this.org_type_store &&
                    this.org_type_id_store &&
                    this.month_year_store
                ) {
                    console.log("Debounced count_comment triggered");
                    this.count_comment();
                }
        },
    },
    methods: {
        ...mapActions(comment_store, {
            modal_show: 'modal_show'
        }),

        count_comment: function () {
            // console.log('count_comment', this.table_name, this.column_name);

            let params = {
                month: this.month_year_store,
                org_type: this.org_type_store,
                org_type_id: this.org_type_id_store,
                table_name: this.table_name,
                column_name: this.column_name,
            }

            console.log("comment component -----", params);

            // let response = await axios.get('/comment/count-comment', {
            //     params: {
            //         month: this.month_year,
            //         org_type: this.org_type,
            //         org_type_id: this.org_type_id,
            //         table_name: table_name,
            //         column_name: column_name,
            //     }
            // })
            // console.log(response);

            // if (response.data.status == 'success') {
            //     this.all_comment = [...response?.data?.data];
            //     console.log('all_comment', this.all_comment);

            // }

        }
    }
};
</script>

<style></style>
