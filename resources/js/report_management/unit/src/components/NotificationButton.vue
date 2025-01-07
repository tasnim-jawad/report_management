<template>
    <div class="notification_icon">
        <span class="i_icon" @click="modal_show(unit_id)">
            <i class="fa-solid fa-bell"></i>
        </span>
        <div class="number_of_notifications d-flex justify-content-center text-center" v-if="number_of_notifications > 0"> 
            <p>{{ number_of_notifications }}</p>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { store as notification_store } from "../stores/NotificationStore";
import { mapActions, mapWritableState } from "pinia";

export default {
    props: {
        unit_id: {
            type: Number,
            required: true,
            default: 0,
        },
    },
    data() {
        return {
            is_popup_visible: false,
            debounce_timer: null,
        };
    },
    created:async function () {
        if(this.unit_id){
            await this.get_unit_notification(this.unit_id);
            console.log("from notification",this.all_notifications);
            
        }
    },
    computed: {
        ...mapWritableState(notification_store, {
            all_notifications: 'all_notifications',
            number_of_notifications: 'number_of_notifications',
        }),
    },
    watch: {
        unit_id: {
            immediate: true,
            handler(new_unit_id) {
                if (new_unit_id) {
                    this.get_unit_notification(new_unit_id).then(() => {
                        console.log("From notification:", this.all_notifications);
                    });
                }
            },
        },
    },
    methods: {
        ...mapActions(notification_store, {
            get_unit_notification: 'get_unit_notification',
            modal_show: 'modal_show',
        }),
    }
};
</script>

<style></style>
