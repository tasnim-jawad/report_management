<template>
    <div class="unit_info_icon">
        <span class="i_icon" @click="toggle_popup">
            <i class="fa-solid fa-caret-down"></i>
        </span>
        <div class="unit_data_popup" :class="{ active: is_popup_visible }">
            <!-- <span>{{popup_data }}</span> -->
            <table class="table table-striped mb-0">
                <tbody class="">
                    <tr v-for="(ward, index) in ward_wise_data" :key="index">
                        <td>{{ ward.ward_title }}</td>
                        <td>{{ ward.value }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ total ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        popup_data: {
            type: [String, Number],
            required: false,
        },
        table_name: {
            type: String,
            required: true,
        },
        field_title: {
            type: String,
            required: true,
        },
        thana_id: {
            type: Number,
            required: true,
            default: 0,
        },
        month: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            is_popup_visible: false,
            ward_wise_data: [],
            total: null,
        };
    },
    created: function () {},
    methods: {
        toggle_popup() {
            [...document.querySelectorAll(".unit_data_popup")].forEach((i) =>
                i.classList.remove("active")
            );

            this.is_popup_visible = !this.is_popup_visible;

            if (this.is_popup_visible) {
                if (!this.total) {
                    this.get_all_unit_data();
                }
            }
        },

        get_all_unit_data: async function () {
            console.log("this.thana_id", this.thana_id);
            console.log("this.table_name --", this.table_name);
            console.log("this.field_title --", this.field_title);

            let response = await axios.get("/thana/get-all-ward-data", {
                params: {
                    thana_id: this.thana_id,
                    table_name: this.table_name,
                    field_title: this.field_title,
                    month: this.month,
                },
            });
            if (response.data.status == "success") {
                this.ward_wise_data = response?.data?.ward_wise_data;
                this.total = response?.data?.total;
            }
        },
    },
};
</script>

<style>
.unit_info_icon .i_icon {
    background-color: #ffffffa6;
}
.i_icon i{
    width: 7px;
    line-height: 7px;
}
</style>
