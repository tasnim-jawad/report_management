<template>
    <div class="report_app ">
        <div class="report_app_left ">
            <aside>
                <nav class="side_nav">
                    <div class="logo">
                        <img src="https://cdn.freebiesupply.com/logos/large/2x/mi-1-logo-black-and-white.png" alt="">
                    </div>
                    <div class="profile_view">
                        <div class="profile_pic">
                            <div class="circle">
                                <div class="image_body">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXrumPKQMsrYtosDWTVcOvkXleWBlJhdshg2k3qyomSQ&s" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="profile_info">
                            <h5 class="m-0">{{this.user?.user?.full_name}}</h5>
                            <p class="m-0">{{this.user?.responsibility?.resposibilities?.title}}</p>
                            <p class="m-0">unit: {{this.user?.responsibility?.org_unit?.title}}</p>
                            <p class="m-0">ward: {{this.user?.ward?.title}}</p>
                        </div>
                    </div>
                    <ul class="options">
                        <div class="block_title">Pages</div>
                        <li>
                            <router-link :to="{name:'Dashboard'}">
                                <span class="icon_margin"><i class="fa-solid fa-gauge"></i></span>ড্যাশবোর্ড
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Jonoshokti'}">
                                <span class="icon_margin"><i class="fa-solid fa-people-group"></i></span>জনশক্তি
                            </router-link>
                        </li>
                        <!-- <li>
                            <router-link :to="{name:'ReportInfo'}">
                                <span class="icon_margin"><i class="fa-solid fa-gauge"></i></span>Monthly Report Info
                            </router-link>
                        </li> -->
                        <li>
                            <router-link :to="{name:'Dawat'}">
                                <span class="icon_margin"><i class="fa-regular fa-comment"></i></span>দাওয়াত ও তাবলিগ
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Department'}">
                                <span class="icon_margin"><i class="fa-solid fa-puzzle-piece"></i></span>বিভাগ ভিত্তিক তথ্য
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'DawahAndProkashona'}">
                                <span class="icon_margin"><i class="fa-solid fa-book"></i></span>দাওয়াহ্ ও প্রকাশনা
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Kormosuci'}">
                                <span class="icon_margin"><i class="fa-solid fa-handshake"></i></span>কর্মসূচি বাস্তবায়ন
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Songothon'}">
                                <span class="icon_margin"><i class="fa-solid fa-sitemap"></i></span>সংগঠন
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Proshikkhon'}">
                                <span class="icon_margin"><i class="fa-solid fa-chalkboard-user"></i></span>প্ৰশিক্ষণ
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Shomajsheba'}">
                                <span class="icon_margin"><i class="fa-solid fa-share-from-square"></i></span>সমাজ সংস্কার ও সমাজসেবা
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Rastrio'}">
                                <span class="icon_margin"><i class="fa-solid fa-globe"></i></span>রাষ্ট্রীয় সংস্কার ও সংশোধন
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Montobbo'}">
                                <span class="icon_margin"><i class="fa-solid fa-comments"></i></span>মন্তব্য
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmCategoryAll'}">
                                <span class="icon_margin"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>BM Category
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmCategoryUserAll'}">
                                <span class="icon_margin"><i class="fa-solid fa-user-tag"></i></span>BM User's Target
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmEntryAll'}">
                                <span class="icon_margin"><i class="fa-solid fa-dollar-sign"></i></span>BM entry
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmExpenseCategoryAll'}">
                                <span class="icon_margin"><i class="fa-solid fa-layer-group"></i></span>BM Expense Category
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmExpenseAll'}">
                                <span class="icon_margin"><i class="fa-solid fa-circle-dollar-to-slot"></i></span>BM Expense
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmUserReport'}">
                                <span class="icon_margin"><i class="fa-solid fa-user-plus"></i></span>BM User Report
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'BmTotalReport'}">
                                <span class="icon_margin"><i class="fa-solid fa-user-plus"></i></span>BM Total Report
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'PrintReport'}">
                                <span class="icon_margin"><i class="fa-solid fa-print"></i></span>Report Print
                            </router-link>
                        </li>
                    </ul>
                </nav>
            </aside>
        </div>
        <div class="report_app_right ">
            <header class="report_app_right_top ">
                <div class="left ">
                    <a href=""><i class="fa-solid fa-bars"></i></a>
                </div>
                <div class="right">
                    <a class="btn " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#" @click="logout">Logout</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </div>
            </header>
            <main class="route_body ">
                <div class="route_content ">
                    <router-view></router-view>
                </div>
            </main>

        </div>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    data: function(){
        return {
            user:[],
        }
    },
    created: function(){
        let token = localStorage.getItem('token')

        if(!token){
            window.location.href = '/login'
        }
        // this.$router.push({name:`Dashboard`})
        let prevUrl = window.sessionStorage.getItem('prevurl');
        window.location.hash = prevUrl || "#/dashboard";

        this.auth_user();
        // console.log(this.user);
    },
    methods:{
        auth_user: function(){
            axios.get("/user/user_info")
                .then(responce =>{
                    // console.log(responce);
                    this.user = responce.data
                    // console.log(this.user);
                })
        },
        logout: function(){
            // console.log("clicked");
            localStorage.removeItem('token');
            let token = localStorage.getItem('token');
            if(!token){
                window.location.href = '/login'
            }
        }
    }
}
</script>

<style>

</style>
