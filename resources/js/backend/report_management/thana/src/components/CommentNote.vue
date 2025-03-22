<!-- ParentPopupNote.vue -->
<template>
    <div class="parent_popup_note">
        <p>*** {{ label }}</p>
        <div class="line"></div>
        <comment
            :table_name="table_name"
            :column_name="field_title"
        />
    </div>
</template>

<script>
import Popup from './Popup.vue';
import Comment from './Comment.vue';

export default {
    components: {
        Popup,
        Comment
    },
    props: {
        table_name: {
            type: String,
            required: true,
        },
        field_title: {
            type: String,
            required: true,
        },
        // ward_id: {
        //     type: Number,
        //     required: true,
        //     default: 0,
        // },
        // month: {
        //     type: String,
        //     required: true,
        // },
        label: {
            type: String,
            required: true,
        },

    },
};
</script>

<style>
</style>
