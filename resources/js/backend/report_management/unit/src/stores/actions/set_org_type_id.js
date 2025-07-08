import { mapActions, mapWritableState } from "pinia";
import { store } from "..";
import axios from "axios";

async function set_org_type_id (org_type_id = null){
    let state = mapWritableState(store, [
        'org_type_id'
    ]);
    
    
    if (!org_type_id) {
        try {
            const response = await axios.get('/user/org-type-id');
            if (response.data.error) {
                console.error("Error fetching org-type:", response.data.error);
                return;
            }
            org_type_id = response.data.org_type_id;
        } catch (error) {
            console.error("Error fetching org-type:", error);
            return;
        }
        if (!org_type_id) return; // Early exit if org_type_id is still missing
    }
    // console.log("org_type_id", org_type_id);
    state.org_type_id.set(org_type_id);
}

export default set_org_type_id;