<template lang="">
    <template v-if="is_auth">
        <router-view></router-view>
    </template>
</template>
<script>
import { mapState,mapActions } from 'pinia';
import { use_auth_store} from '../../store/auth_store'
export default {
    data: ()=>({
    }),
    computed:{
        ...mapState(use_auth_store,{
            is_auth: 'is_auth',
        })
    },
    methods:{
        ...mapActions(use_auth_store, {
            check_is_auth: 'check_is_auth'
        }),
    },
    created:async function(){
        let user = await this.check_is_auth();
        // console.log("is_auth",user);
        // console.log("user",user);
    },
}
</script>
<style lang="">

</style>
