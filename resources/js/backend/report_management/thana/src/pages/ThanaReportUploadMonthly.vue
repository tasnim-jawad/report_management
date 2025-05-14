<template>
    <report-upload-man v-if="gender === 'men'" />
    <report-upload-woman v-if="gender === 'women'" />
</template>

<script>
import axios from "axios";
import ReportUploadMan from "../components/Report_upload_gender/ReportUploadMan.vue";
import ReportUploadWoman from "../components/Report_upload_gender/ReportUploadWoman.vue";
import { store as data_store} from "../stores/ReportStore";
import { mapActions, mapWritableState } from "pinia";

export default {
    props: {
        month: String,
        user_id: [String, Number],
    },
    components: {ReportUploadMan, ReportUploadWoman },
    created: async function () {
        try {
            await this.thana_gender();
        } catch (error) {
            console.error('Error during thana gender check:', error);
        }
    },
    
    methods: {
        ...mapActions(data_store, {
            thana_gender: 'thana_gender'
        }),
    },
    computed: {
        ...mapWritableState(data_store, {
            gender: 'gender',
        }),
    },
};
</script>

<style>
</style>
