<template>
    <div class="card mb-3 ">
        <div class="card-header border-bottom-0">
            মাস: <input type="month" @change="get_monthly_data" v-model="month" ref="month" name="month">
        </div>
    </div>
    <div class="card mb-3" v-if="month">
            <div class="card-header">
                <h1 class="fw-semibold">বায়তুলমাল</h1>
            </div>
        </div>
    <div class="card mb-2" v-if="month">
        <div class="card-header d-flex justify-content-between align-items-center">
            ব্যক্তিগত আয়ের বিবরণ
            <div class="btn btn-info btn-sm">
                <router-link :to="{name:'ThanaBmUserEntryCreate'}" class="text-dark">Create Entry</router-link>
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
                        <tr v-for="(entry,index) in bm_user_entry" :key="index">
                            <td>{{entry.user.full_name}}</td>
                            <td>{{entry.thana_bm_income_category.title}}</td>
                            <td>{{entry.month}}</td>
                            <td>{{entry.amount}}</td>
                            <td>
                                <div class="action">
                                    <div class="btn btn-success btn-sm me-2">
                                        <router-link :to="{name:'ThanaBmUserEntryDetails',params: { entry_id: entry.id }}"  class="text-dark">show</router-link>
                                    </div>
                                    <div class="btn btn-warning btn-sm me-2" >
                                        <router-link :to="{name:'ThanaBmUserEntryEdit',params: { entry_id: entry.id }}"  class="text-dark">Edit</router-link>
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
import { store as thana_bm_user_entry_store } from "../../../stores/ThanaBmUserEntryStore"
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
        ...mapWritableState(thana_bm_user_entry_store, [
            'bm_user_entry',
            'total_paid',
            'is_permitted'
        ]),
    },
    created: function() {
        if (this.month) {
            this.show_bm_user_entry();
        }
    },
    methods:{
        ...mapActions(thana_bm_user_entry_store,{
            show_bm_user_entry:'show_bm_user_entry',
            delete_entry:'delete_entry',
            submit_delete_form:'submit_delete_form',
        }),
        
    },
    watch:{
        month:function(){
            this.show_bm_user_entry()
        }
    }

}
</script>

<style>

</style>
