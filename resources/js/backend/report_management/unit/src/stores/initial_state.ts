import { anyObject } from '../../../../../../../../common_types/object'
// import setup from '../setup';
export const initialState = {
    /** loading status */
    is_loading: false,
    loading_text: 'loading..',

    /* data store */
    all: {} as anyObject,
    item: {} as anyObject,

    gender:'',
    org_type: '',
    org_type_id: '',


};



