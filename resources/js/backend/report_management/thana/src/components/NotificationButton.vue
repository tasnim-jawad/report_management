<template>
    <div class="notification_icon">
        <span class="i_icon" @click="modal_show(thana_id)">
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
        thana_id: {
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
        if(this.thana_id){
            await this.get_thana_notification(this.thana_id);
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
        thana_id: {
            immediate: true,
            handler(new_thana_id) {
                if (new_thana_id) {
                    this.get_thana_notification(new_thana_id).then(() => {
                        console.log("From notification:", this.all_notifications);
                    });
                }
            },
        },
    },
    methods: {
        ...mapActions(notification_store, {
            get_thana_notification: 'get_thana_notification',
            modal_show: 'modal_show',
        }),
    }
};
</script>

<style>
.notification_icon{
    position: relative;
}
.notification_icon .i_icon{
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3px;
        background-color: var(--color3);
        position: relative;
        z-index: 999;
        border-radius: 5px;
        color: white;
    }
.number_of_notifications{

    position: absolute;
    line-height: 11px;
    width: 11px;
    font-size: 9px;
    background-color: #ff0c0c;
    border-radius: 50%;
    color: white;
    top: -8px;
    right: -7px;
    z-index: 999;
}
</style>
