import { defineStore } from "pinia";

export const store = defineStore(`custom_store`, {
    state: () => ({
        month: null,
        loading: true,
    }),
    actions: {
        async set_month(payload) {

        }
    }


})
