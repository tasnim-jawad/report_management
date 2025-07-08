import { mapActions, mapWritableState } from "pinia";
import { store } from "..";
import axios from "axios";

async function set_org_type (org_type = null){
    let state = mapWritableState(store, [
        'org_type'
    ]);
    
    
    if (!org_type) {
        try {
            const response = await axios.get('/user/org-type');
            if (response.data.error) {
                console.error("Error fetching org-type:", response.data.error);
                return;
            }
            org_type = response.data.org_type;
        } catch (error) {
            console.error("Error fetching org-type:", error);
            return;
        }
        if (!org_type) return; // Early exit if org_type is still missing
    }
    state.org_type.set(org_type);
}

export default set_org_type;