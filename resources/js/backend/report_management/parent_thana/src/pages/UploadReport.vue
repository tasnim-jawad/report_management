<template>
    <div class="card mb-3" v-if="thana_active_report_month_info">
        <div class="card-body border-bottom-0">
            <label for="" class="form-label">মাস:</label>
            <input
                class="form-control"
                type="month"
                v-model="month"
                name="month"
            />
            <a
                href="#"
                class="btn btn-success mt-2"
                type="button"
                @click="upload_report"
                :disabled="!month || !user_id"
                >রিপোর্ট ফরম</a
            >
        </div>
    </div>
    <div class="card" v-else>
        <div class="card-body">
            <!-- <p>আপনার রিপোর্ট পূরণ করার অনুমতি নেই। রিপোর্ট পূরণ করার অনুমতির জন্য আপনার ঊর্ধ্বতন দায়িত্বশীলের সাথে যোগাযোগ করুন।</p> -->
            <p>রিপোর্ট পুরন করার অনুমতি বন্ধ আছে । আপডেট টেলিগ্রাম / হোয়াটসঅ্যাপ -এ জানিয়ে দেয়া হবে।</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { store as data_store } from "../stores/ReportStore";
import { mapState, mapWritableState } from "pinia";

export default {
    data: function () {
        return {
            // month:"",
            user_id: "",
        };
    },
    created: function () {
        this.user_info();
    },
    computed: {
        ...mapWritableState(data_store, ["month", "thana_active_report_month_info"]),
    },
    methods: {
        upload_report: async function (event) {
            event?.preventDefault();

            if (!this.month) {
                return window.s_warning("Please select a month.", "error");
            }
            try {
                // Check report info
                const { data } = await axios.get("/thana/check-report-info", {
                    params: { month: this.month },
                });
                console.log("from thana mainlayout", data);

                if (data.data) {
                    if (this.user_id) {
                        // Navigate to report upload route
                        return this.$router.push({
                            name: "ThanaReportUploadMonthly",
                            params: {
                                month: this.month,
                                user_id: this.user_id,
                            },
                        });
                    } else {
                        return window.s_warning(
                            "User ID is missing. Please ensure it is provided.",
                            "error"
                        );
                    }
                }

                // Show error for insufficient permissions
                const errMessage =
                    "আপনার রিপোর্ট পূরণ করার অনুমতি নেই। রিপোর্ট পূরণ করার অনুমতির জন্য আপনার ঊর্ধ্বতন দায়িত্বশীলের সাথে যোগাযোগ করুন।";
                window.s_warning(errMessage, "error");
            } catch (error) {
                // Handle unexpected errors
                console.error(
                    "An error occurred while fetching report information:",
                    error
                );
                window.s_warning(
                    "An unexpected error occurred. Please try again.",
                    "error"
                );
            }
        },
        user_info: function () {
            axios
                .get("/user/thana-user-info")
                .then((responce) => {
                    this.user_id = responce?.data?.user?.id;
                })
                .catch((error) => {
                    console.error("Error fetching user info:", error);
                });
        },
    },
};
</script>

<style></style>
