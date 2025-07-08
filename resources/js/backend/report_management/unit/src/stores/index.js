import { defineStore } from "pinia";
import { initialState } from "./initial_state";


/** actions */
import set_gender from "./actions/set_gender";
import set_org_type from "./actions/set_org_type";
import set_org_type_id from "./actions/set_org_type_id";

export const store = defineStore('custom_report_store', {
    state: () => initialState,
    getters: {},
    actions: {


        /* actions */
        set_gender,
        set_org_type,
        set_org_type_id,
    },
});


