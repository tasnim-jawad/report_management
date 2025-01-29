<template>
    <div class="max_with_550_auto">
        <!-- <h1 class="dofa_heading">দাওয়াত ও তাবলিগ</h1> -->
        <div class="card mb-3">
            <div class="card-header">
                <h1>All Notification: total <span class="">{{ notification_list_number }}</span></h1>
            </div>
            <div class="card-body">
                <div class="notification_container">
                    <notification-dropdown v-for="notification in notification_list" :notification="notification" :key="notification.id"></notification-dropdown>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {store as notification_store} from "../stores/NotificationStore";
import {mapActions, mapWritableState} from "pinia";
import NotificationDropdown from "../components/NotificationDropdown.vue";
export default {
  components: { NotificationDropdown },
  data: ()=>({
    
  }),
  created:async function () {
    console.log("from notification",this.notification_list);

    const unit_id = this.$route.params.unit_id;
    await this.see_all_notification(unit_id);
  },

  methods: {
    ...mapActions(notification_store, {
        see_all_notification: 'see_all_notification',
    }),
  },

  computed: {
    ...mapWritableState(notification_store, {
        notification_list: 'notification_list',
        notification_list_number: 'notification_list_number',
    }),
  },


}
</script>

<style>

</style>
