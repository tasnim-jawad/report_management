<template>
    <report-upload-man v-if="gender === 'men'" />
    <report-upload-woman v-if="gender === 'women'" />
</template>

<script>
import axios from "axios";
import ReportUploadMan from "../components/Report_upload_gender/ReportUploadMan.vue";
import ReportUploadWoman from "../components/Report_upload_gender/ReportUploadWoman.vue";
import { store } from "../stores";
import { mapActions, mapWritableState } from "pinia";

export default {
    props: {
        month: String,
        user_id: [String, Number],
    },
    components: {ReportUploadMan, ReportUploadWoman },
    created: async function () {
        await this.set_org_type();
        await this.set_org_type_id();
        await this.set_gender();
    },
    
    methods: {
        ...mapActions(store, {
            set_org_type: 'set_org_type',
            set_org_type_id: 'set_org_type_id',
            set_gender: 'set_gender',
        }),
    },
    computed: {
        ...mapWritableState(store, {
            gender: 'gender',
        }),
    },
};
</script>

<style>
</style>
