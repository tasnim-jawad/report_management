<template>
    <div class="comment_icon">
        <span class="i_icon" @click="modal_show(table_name , column_name)">
            <i class="fa fa-list"></i>
        </span>
        <!-- <div class="comment_data_popup" :class="{ active: is_popup_visible }">

            <form action="" @click.prevent="comment_set">
                <label for="comment" class="form-label fs-6">Add Comment</label>
                <textarea name="comment" id="comment" class="form-control" v-model="comment_text"></textarea>
                <button type="button" class="btn btn-sm btn-success m-2">comment</button>
            </form>
            <table class="table table-striped mb-0">
                <tbody class="">
                    <tr v-for="(comment, index) in all_comment" :key="index">
                        <td>{{ comment?.user?.full_name }}</td>
                        <td>{{ comment?.comment }}</td>
                    </tr>
                </tbody>
            </table>
        </div> -->
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
        };
    },
    created: function () {
        this.table_name_store = this.table_name;
        this.column_name_store = this.column_name;

        console.log(this.table_name_store, this.column_name_store);

    },
    computed: {
        ...mapWritableState(comment_store, {
            table_name_store: 'table_name',
            column_name_store: 'column_name',
        }),
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
    },
    methods: {
        ...mapActions(comment_store, {
            modal_show: 'modal_show'
        }),
    }
};
</script>

<style></style>
