<template>
    <div class="comment_icon">       <!-- unit_info_icon  -->
        <span class="i_icon" @click="toggle_popup">
            <i class="fa fa-list"></i>
        </span>
        <div class="comment_data_popup" :class="{ active: is_popup_visible }"> <!-- unit_data_popup  -->
            <!-- <span>{{popup_data }}</span> -->
            <form action="" @click.prevent="comment_set">
                <label for="comment">Comment</label>
                <textarea name="comment" id="comment" class="bg-gray" v-model="comment_text"></textarea>
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
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        org_type: {
            type: String,
            required: true,
        },
        org_type_id: {
            type: [String, Number],
            required: true,
        },
        month_year: {
            type: String,
            required: true,
        },
        table_name: {
            type: String,
            required: true,
        },
        column_name: {
            type: Number,
            required: true,
            default: 0,
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

    },
    methods: {
        toggle_popup() {

            [...document.querySelectorAll('.comment_data_popup')].forEach(i => i.classList.remove('active'))

            this.is_popup_visible = !this.is_popup_visible;

            if (this.is_popup_visible) {
                this.get_all_comment()
            }
        },

        get_all_comment: async function () {

            let response = await axios.get('/comment/index', {
                params: {
                    month: this.month,
                    org_type: this.org_type,
                    org_type_id: this.org_type_id,
                    table_name: this.table_name,
                    column_name: this.column_name,
                    comment: this.comment,
                }
            })
            console.log(response);

            if (response.data.status == 'success') {
                this.all_comment = response?.data?.data;
                console.log('all_comment'.all_comment);

            }

        },
        comment_set() {
            if (this.comment_text.trim() === '') {
                console.log('Comment cannot be empty.');
                return;
            }

            // Simulate storing the data or sending it to an API
            console.log('Comment:', this.comment_text);

            let response = axios.get('/comment/store', {
                params: {
                    month: this.month,
                    org_type: this.org_type,
                    org_type_id: this.org_type_id,
                    table_name: this.table_name,
                    column_name: this.column_name,
                    comment: this.comment_text,
                }
            })

            // Reset the textarea after submitting
            this.comment_text = '';
        }
    }
};
</script>

<style></style>
