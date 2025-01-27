import { defineStore } from "pinia";

export const store = defineStore(`custom_store`, {
    state: () => ({
        month: null,
        loading: true,
    }),
    getters: {
        $init: () => {
            this.set_month(); // Call set_month when the store is initialized
        }
    },
    actions: {
        set_month() {
            // const currentDate = new Date();
            // const currentMonth = currentDate.getMonth() + 1;
            // const currentYear = currentDate.getFullYear();

            // this.month = `${currentYear}-${currentMonth}`;
            // console.log(this.month); // Example: "2024-10"

            const currentYear = moment().format("YYYY");
            const currentMonth = moment().format("MM");

            let seted_month = `${currentYear}-${currentMonth}`;
            this.month = seted_month; // Already in "YYYY-MM" format
            console.log("from store",this.month);
            
        },
        user_info:function(){
            axios.get("/user/thana-user-info")
                .then(responce =>{
                    this.user_info = responce.data
                })
        },
    }


})
