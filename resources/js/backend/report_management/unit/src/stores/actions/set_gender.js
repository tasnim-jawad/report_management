import { mapActions, mapWritableState } from "pinia";
import { store } from "..";
import axios from "axios";

async function set_gender(org_type, org_type_id) {
    let state = mapWritableState(store, [
        "gender", 
        "org_type", 
        "org_type_id"
    ]);

    org_type = org_type || state.org_type.get();
    org_type_id = org_type_id || state.org_type_id.get();

    if (!org_type || !org_type_id) return; // Early exit if still missing

    try {
        const response = await axios.get(`/gender`, {
            params: { org_type, org_type_id },
        });
        state.gender.set(response.data.gender);
    } catch (error) {
        console.error("Failed to fetch gender:", error);
    }
}

export default set_gender;
