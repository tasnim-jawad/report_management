<template>
    <div class="unit_info_icon" >
        <span class="i_icon" @click="toggle_popup">
            <i class="fa fa-list" ></i>
        </span>
        <div v-if="number_of_comment" class="number_of_comments d-flex justify-content-center text-center">
            <p>{{ number_of_comment }}</p>
        </div>
        <div class="unit_data_popup text-center" :class="{active:is_popup_visible}">
            <p class="bg-primary text-white">ইউনিটের মাসিক কাজ</p>
            <table class="table table-striped mb-0">
                <tbody class="">
                    <tr v-for="(unit,index) in unit_wise_data" :key="index">
                        <td>{{ unit.unit_title }}</td>
                        <td>{{ unit.value }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ total ?? 0}}</td>
                    </tr>
                </tbody>
            </table>
            <p class="bg-primary text-white">মন্তব্য</p>
            <div class="comment_list text-start px-1">
                <!-- <div class="single_comment border rounded p-1 mb-2 bg-light">
                    <p class="fw-bold mb-1 font_size_12">মুহাম্মাদঃ</p>
                    <p class="ps-3 mb-0 font_size_12">তুমি একটা ভালো চেলায়ে দফে দফজএস</p>
                </div> -->
                <div class="single_comment border rounded p-1 mb-2 bg-light" v-for="(comment, index) in all_comment_store" :key="index">
                    <p class="fw-bold mb-1 font_size_12">{{ comment?.user?.full_name }}:</p>
                    <p class="ps-3 mb-0 font_size_12">-> {{ comment?.comment }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { store as comment_store } from "../stores/CommentStore";
import { mapActions, mapWritableState } from "pinia";

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
        ward_table_name: {
            type: String,
            required: true,
        },
        ward_column_name: {
            type: String,
            required: true,
        },
        ward_id: {
            type: Number,
            required: true,
            default: 0,
        },
        month: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            is_popup_visible: false,
            unit_wise_data:[],
            total:null,
            number_of_comment: 0,
        };
    },
    // mounted:function(){
    // },
    // created:function(){
    // },
    methods: {
        ...mapActions(comment_store, {
            get_column_comment_all: 'get_column_comment_all'
        }),
        
        toggle_popup() {

            [...document.querySelectorAll('.unit_data_popup')].forEach(i=>i.classList.remove('active'))

            this.is_popup_visible = !this.is_popup_visible;

            if(this.is_popup_visible){
                if(!this.total){
                    this.get_all_unit_data()

                }
            }
        },

        get_all_unit_data:async function() {
            console.log("this.ward_id",this.ward_id);

            let response = await axios.get('/ward/get-all-unit-data',{
                params: {
                    ward_id: this.ward_id,
                    table_name: this.table_name,
                    field_title: this.field_title,
                    month: this.month,
                }
            })
            if(response.data.status == 'success'){
                this.unit_wise_data = response?.data?.unit_wise_data;
                this.total = response?.data?.total;
            }

            if(this.month){
                console.log("get_column_comment_all",this.month);
                
                this.month_year_store = this.month;
                this.org_type_store = 'ward';
                this.org_type_id_store = this.ward_id;
                if(this.ward_table_name != "none" && this.ward_column_name != "none"){
                    this.get_column_comment_all(this.ward_table_name, this.ward_column_name);
                }
                // this.get_column_comment_all(this.ward_table_name, this.ward_column_name);
            }

        },
        
    },
    computed: {
        ...mapWritableState(comment_store, {
            org_type_store: 'org_type',
            org_type_id_store: 'org_type_id',
            month_year_store: 'month_year',
            comment_text_store: 'comment_text',
            all_comment_store: 'all_comment',
            all_comment_count: 'all_comment_count',
        }),

        is_ready_to_count: function () {
            return (
                this.org_type_store &&
                this.org_type_id_store &&
                this.month_year_store
            );
        },
    },

    watch: {
        // table_name: {
        //     immediate: true,
        //     handler(new_value) {
        //         this.table_name_store = new_value;
        //     },
        // },
        // field_title: {
        //     immediate: true,
        //     handler(new_value) {
        //         this.column_name_store = new_value;
        //     },
        // },
        all_comment_count: function () {
            if (this.all_comment_count && this.ward_table_name && this.ward_column_name) {

                // console.log("all_comment_count",this.all_comment_count);
                // console.log("this.table_name",this.ward_table_name);
                // console.log("this.field_title",this.field_title);
                
                const result = this.all_comment_count.find(
                    (item) => item.table_name === this.ward_table_name && item.column_name === this.ward_column_name
                );
                console.log(result);
                
                this.number_of_comment = result ? result.number_of_comment : 0;
            } else {
                this.number_of_comment = 0;
            }

        }
    },


};
</script>

<style>
.font_size_12{
    font-size: 12px;
}
</style>
