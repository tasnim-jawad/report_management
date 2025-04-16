<template>
    <div class="card mb-3 ">
        <div class="card-header border-bottom-0">
            মাস: <input type="month" @change="thana_shudhi_entry_month_wise" v-model="month" ref="month" name="month">
        </div>
    </div>
    <!-- <div class="card mb-3" v-if="month">
        <div class="card-header">
            <h1 class="fw-semibold">বায়তুলমাল</h1>
        </div>
    </div> -->
    <div class="card mb-2" v-if="month">
        <div class="card-header d-flex justify-content-between align-items-center">
            সুধী আয়ের বিবরণ
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ThanaShudhiEntryCreate'}" class="text-dark">সুধী আয় তৈরি করুন</router-link>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex flex-wrap gap-2 mb-2 align-items-center table-responsive" >
                <table class="table table-striped table-bordered text-start">
                    <thead>
                        <tr class="table-dark">
                            <th>Name</th>
                            <th>Category</th>
                            <th>Month</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(entry,index) in unit_shudhi_entry" :key="index">
                            <td>{{entry.shudhi.name}}</td>
                            <td>{{entry.bm_category.title}}</td>
                            <td>{{entry.month}}</td>
                            <td>{{entry.amount}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'ThanaShudhiEntryDetails',params: { entry_id: entry.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2" >
                                        <router-link :to="{name:'ThanaShudhiEntryEdit',params: { entry_id: entry.id }}"  class="text-dark">Edit</router-link>
                                    </div>
                                    <div class="btn btn-danger btn-sm" >
                                        <a @click="delete_entry(entry.id)" class="text-dark">Delete</a>

                                        <form :id="'delete_entry_form_'+entry.id" >
                                            <input type="text" name="id" :value="entry.id" class="d-none">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="total_paid > 0">
                            <td colspan="2" class="text-end">Total</td>
                            <td>{{ total_paid }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- <previous-next
            :prev-route="{ name: 'Rastrio' }"
            :next-route="{ name: 'BmExpenseAll' }"
            :month="month"
        >
    </previous-next> -->
</template>

<script>
import axios from 'axios'
import { store as data_store} from "../../../stores/ReportStore";
import { store as thana_shudhi_entry_store } from "../../../stores/ThanaShudhiEntryStore"
import { mapActions, mapWritableState } from 'pinia';
import PreviousNext from '../../../components/PreviousNext.vue';

export default {
    components:{ PreviousNext },
    data() {
        return {
            
        }
    },
    created:function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    },
    computed: {
        ...mapWritableState(data_store, ['month']),
        ...mapWritableState(thana_shudhi_entry_store, [
            'thana_shudhi_entry',
            'total_paid',
            'is_permitted',
        ]),
    },
    created: function() {
        if (this.month) {
            this.show_thana_shudhi_entry();
        }
    },
    methods:{
        ...mapActions(thana_shudhi_entry_store,{
            show_thana_shudhi_entry:'show_thana_shudhi_entry',
            delete_entry:'delete_entry',
            submit_delete_form:'submit_delete_form',
            thana_shudhi_entry_month_wise:'thana_shudhi_entry_month_wise',
        }),
        
    },
    watch:{
        month:function(){
            this.show_thana_shudhi_entry()
        }
    }

}
</script>

<style>

</style>
