<template>
    <div class="comment_icon" v-if="number_of_comment">
        <span class="i_icon" @click="modal_show(table_name, column_name)">
            <i class="fa fa-list"></i>
        </span>
        <div class="number_of_comments d-flex justify-content-center text-center">
            <p>{{ number_of_comment }}</p>
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
            number_of_comment: 0,
        };
    },
    created: function () {
        this.table_name_store = this.table_name;
        this.column_name_store = this.column_name;
    },
    computed: {
        ...mapWritableState(comment_store, {
            table_name_store: 'table_name',
            column_name_store: 'column_name',

            org_type_store: 'org_type',
            org_type_id_store: 'org_type_id',
            month_year_store: 'month_year',
            is_data_are_set: 'is_data_are_set',
            all_comment_count: 'all_comment_count',
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
        all_comment_count: function () {
            if (this.all_comment_count && this.table_name && this.column_name) {
                const result = this.all_comment_count.find(
                    (item) => item.table_name === this.table_name && item.column_name === this.column_name
                );

                this.number_of_comment = result.number_of_comment
            }

        }
    },
    methods: {
        ...mapActions(comment_store, {
            modal_show: 'modal_show'
        }),
    }
};
</script>

<style></style>
