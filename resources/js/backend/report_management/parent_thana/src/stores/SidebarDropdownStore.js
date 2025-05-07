import { defineStore } from "pinia";

export const store = defineStore('sidebar_dropdown_store', {
    state: () => ({
        active_dropdown: null,
    }),
    actions: {
        set_active_dropdown(name) {
            console.log("name from store ,", name);
            
            this.active_dropdown = name;
        },
    }
});
