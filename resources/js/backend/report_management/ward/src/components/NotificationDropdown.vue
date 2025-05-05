<template>
    <div class="notification_card">
        <div class="notification_header" :class="{'notification_seen_bg': notification.is_seen}" @click="toggleDropdown(notification?.id)">
            <p class="notification_title"> {{ notification?.title }}</p>
            <div class="icon">
                <i :class="isOpen ? 'fa-solid fa-angle-up' : 'fa-solid fa-angle-down'"></i>
            </div>
        </div>
        <div :class="{'notification_body': true, 'show': isOpen}">
            <p class="notifier">Notifier: {{ notification?.notifier?.full_name }}</p>
            <p class="notification_description">{{ notification?.description }}</p>
            <!-- <p class="notification_time" v-if="!notification.is_seen">{{ notification?.created_at }}</p> -->
        </div>

    </div>
</template>

<script>
import axios from 'axios';
import { store as notification_store } from "../stores/NotificationStore";
import { mapActions, mapWritableState } from "pinia";

export default {
    props: {
        notification: {
            type: Object,
            required: true,
            default: {},
        },
    },
    data() {
        return {
            isOpen: false

        };
    },
    created:async function () {
        if(this.ward_id){
            await this.get_ward_notification(this.ward_id);
            console.log("from notification",this.all_notifications);
            
        }
    },
    computed: {
    },
    watch: {
    },
    methods: {
        ...mapActions(notification_store, {
            mark_as_seen: 'mark_as_seen',
        }),
        toggleDropdown(notification_id) {
            this.isOpen = !this.isOpen;
            console.log(this.isOpen);
            if (this.isOpen) {
                if(notification_id){
                    console.log("seen",notification_id);
                    
                    this.mark_as_seen(notification_id);
                }
            }
            
        }
    }
};
</script>

<style>
.notification_card {
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 10px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.notification_header {
    background-color: #f7f7f7;
    padding: 12px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #ddd;
}

.notification_header:hover {
    background-color: #eaeaea;
}

.notification_title {
    font-size: 16px;
    font-weight: bold;
    margin: 0;
}

.icon i {
    font-size: 18px;
}

.notification_body {
    background-color: #fff;
    padding: 0 12px;
    max-height: 0;
    opacity: 0;
    overflow: hidden;
    transition: height 0.3s ease, opacity 0.3s ease, padding 0.3s ease; 
}

.notification_body p {
    margin: 0;
    padding: 8px 0;
}

.notification_body.show {
    max-height: 500px;
    opacity: 1;
    padding: 12px;
}

</style>
