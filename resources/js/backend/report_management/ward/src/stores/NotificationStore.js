import { defineStore } from "pinia";

export const store = defineStore('notification_store', {
    state: () => ({
        all_notifications: [],
        number_of_notifications: 0,
        notification_list:[],
        notification_list_number:0,
    }),
    actions: {
        get_ward_notification:async function(ward_id) {
            if (ward_id) {
                try {
                    let res = await axios.get("/notification/all-notification-for-ward", { params: { ward_id } });
                    if (res.data.status === 'success') {
                        this.all_notifications = res.data.data;
                        this.number_of_notifications = res.data.data.length;
                    }
                } catch (e) {
                    console.error('Get ward Notification Error', e);
                }
            }
        },
        modal_show: function (ward_id) {

            let modalElement = new window.bootstrap.Modal(document.getElementById("notification_modal"), {
                keyboard: false,
            });

            modalElement.show();
            this.get_ward_notification(ward_id);
        },
        mark_as_seen: async function (notification_id) {
            try {

                let res = await axios.post("/notification-seen/mark-as-seen", { notification_id });
                if (res.data.status === 'success') {
                    // this.get_thana_notification(this.thana_id);
                    if(res.data.status === 'success'){
                        window.toaster(res?.data?.message , 'success');
                    }
                }
            } catch (e) {
                console.error('Mark As Read Error', e);
            }
        },
        see_all_notification:async function(ward_id) {
            if (ward_id) {
                console.log("see all");
                
                try {
                    let res = await axios.get("/notification/all-notification-for-ward", { 
                        params: {
                            ward_id: ward_id, 
                            all: 1,
                        }
                    });
                    console.log("see all",res);
                    
                    if (res.data.status === 'success') {
                        this.notification_list = res.data.data;
                        this.notification_list_number = res.data.data.length;
                    }
                } catch (e) {
                    console.error('Get ward Notification Error', e);
                }
            }
        },
    }
});
