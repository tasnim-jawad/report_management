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
                            <router-link :to="{name:'Task'}">
                                <span class="icon_margin"><i class="fa-solid fa-list-check"></i></span>tasks
                            </router-link>
                        </li>
                        <li>
                            <a href=""><span class="icon_margin"><i class="fa-solid fa-house"></i></span>Home</a>
                        </li>
                        <li>
                            <a href=""><span class="icon_margin"><i class="fa-solid fa-user"></i></span>Profile</a>
                        </li>
                        <li>
                            <a href=""><span class="icon_margin"><i class="fa-solid fa-list-check"></i></span>tasks</a>
                        </li>
                        <li>
                            <a href=""><span class="icon_margin"><i class="fa-solid fa-flag-checkered"></i></span>tasks</a>
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
                <div class="right ">
                    <a href=""><i class="fa-solid fa-ellipsis-vertical"></i></a>
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
export default {


}
</script>

<style>

</style>
