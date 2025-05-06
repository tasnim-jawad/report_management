<template>
    <parent-upload v-if="is_parent_ward" />
    <general-upload v-else />
</template>

<script>
import axios from "axios";
import ParentUpload from "../components/report_upload_input/ParentUpload.vue";
import GeneralUpload from "../components/report_upload_input/GeneralUpload.vue";
import { store as data_store} from "../stores/ReportStore";
import { mapActions, mapWritableState } from "pinia";

export default {
    components: {ParentUpload, GeneralUpload },
    created: async function () {
        try {
            await this.is_ward_is_parent();
        } catch (error) {
            console.error('Error during parent check:', error);
        }
    },
    
    methods: {
        ...mapActions(data_store, {
            is_ward_is_parent: 'is_ward_is_parent'
        }),
    },
    computed: {
        ...mapWritableState(data_store, {
            is_parent_ward: 'is_parent_ward',
        }),
    },
};
</script>

<style>
</style>
