<!-- ParentPopupNote.vue -->
<template>
    <div class="parent_popup_note">
        <p>*** {{ label }}</p>
        <div class="line"></div>
        <popup
            :ward_id="ward_id"
            :table_name="table_name"
            :field_title="field_title"
            :ward_table_name="ward_table_name"
            :ward_column_name="ward_column_name"
            :month="month"
        />
    </div>
</template>

<script>
import Popup from './Popup.vue';

export default {
    components: {
        Popup,
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
        ward_table_name: {
            type: String,
            required: true,
        },
        ward_column_name: {
            type: String,
            required: true,
        },
        ward_id: {
            type: Number,
            required: true,
            default: 0,
        },
        month: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },

    },
};
</script>

<style>
</style>
