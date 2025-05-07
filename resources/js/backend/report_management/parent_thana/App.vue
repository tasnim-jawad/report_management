<template lang="">
    <template v-if="is_parent">
        <router-view></router-view>
    </template>
</template>
<script>
import { mapState, mapActions } from "pinia";
import { use_auth_store } from "../../store/auth_store";
import { store as data_store } from "./src/stores/ReportStore";
export default {
    data: () => ({}),
    computed: {
        ...mapState(use_auth_store, {
            is_auth: "is_auth",
            auth_info: "auth_info",
        }),
        ...mapState(data_store, {
            is_parent: "is_parent",
        }),
    },
    methods: {
        ...mapActions(use_auth_store, {
            check_is_auth: "check_is_auth",
        }),
        ...mapActions(data_store, {
            is_parent_check: "is_parent_check",
        }),
    },
    created: async function () {
        await this.is_parent_check();
        if(!this.is_parent){
            await this.check_is_auth();
        }
    },
};
</script>
<style lang=""></style>
