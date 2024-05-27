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
                            <h5 class="m-0">Tasnimul Hasan</h5>
                            <p class="m-0">Admin</p>
                        </div>
                    </div>
                    <ul class="options">
                        <div class="block_title">Pages</div>
                        <li>
                            <router-link :to="{name:'Dashboard'}">
                                <span class="icon_margin"><i class="fa-solid fa-gauge"></i></span>Dashboard
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'Home'}">
                                <span class="icon_margin"><i class="fa-solid fa-house"></i></span>Home
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'UnitUserManagement'}">
                                <span class="icon_margin"><i class="fa-solid fa-people-roof"></i></span>Unit User Management
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{name:'UnitList'}">
                                <span class="icon_margin"><i class="fa-solid fa-list-check"></i></span>Unit List
                            </router-link>
                        </li>
                        <!-- <li>
                            <router-link :to="{name:'Task'}">
                                <span class="icon_margin"><i class="fa-solid fa-list-check"></i></span>tasks
                            </router-link>
                        </li> -->
                    </ul>
                </nav>
            </aside>
        </div>
        <div class="report_app_right ">
            <header class="report_app_right_top ">
                <div class="left ">
                    <a href=""><i class="fa-solid fa-bars"></i></a>
                </div>
                <div class="right ">
                    <a class="btn " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="#" @click="logout">Logout</a></li>
                        <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                    </ul>
                </div>
            </header>
            <main class="route_body ">
                <div class="route_content">
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

            // this.auth_user();
            // console.log(this.user);
        },
        methods:{

            // auth_user: function(){
            //     axios.get("/user/user_info")
            //         .then(responce =>{
            //             // console.log(responce);
            //             this.user = responce.data
            //             // console.log(this.user);
            //         })
            // },
            logout: function(){
                if(window.confirm('logout')){
                    localStorage.removeItem('token');
                    document.getElementById('logout-form').submit();
                }
            }
        }
    }
</script>

<style>

</style>
