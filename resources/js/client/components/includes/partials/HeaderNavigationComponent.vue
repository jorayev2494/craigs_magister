<template>
    <header class="header-nav menu_style_home_one style2 home3 navbar-scrolltofixed stricky main-menu">
        <div class="container-fluid p0">
            <!-- Ace Responsive Menu -->
            <nav>
                <!-- Menu Toggle btn-->
                <div class="menu-toggle">
                    <img class="nav_logo_img img-fluid" src="/client/images/header-logo.png" alt="header-logo.png">
                    <button type="button" id="menu-btn">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <a href="#" class="navbar_brand float-left dn-smd">
                    <img class="logo1 img-fluid" src="/client/images/header-logo2.png" alt="header-logo.png">
                    <img class="logo2 img-fluid" src="/client/images/header-logo2.png" alt="header-logo2.png">
                    <span>FindHouse</span>
                </a>
                <!-- Responsive Menu Structure-->
                <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                    <li>
                        <a href="#">
                            <router-link :to="{ name: 'index' }">
                                Vue Home
                            </router-link>
                            <!-- <span class="title">Home</span> -->
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <router-link class="title" :to="{ name: 'announcements' }">
                                Vue Announcements
                            </router-link>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="#">
                            <span class="title">Property</span>
                        </a>
                    </li> -->
                    
                    <!-- <li>
                        <a href="#">
                            <span class="title">Pages</span>
                        </a>
                    </li> -->

                    <li>
                        <a href="#">
                            <router-link :to="{ name: 'blogs' }">Vue Blog</router-link>
                            <!-- <span class="title">Blog</span> -->
                        </a>
                    </li>

                    <!-- <li class="last">
                        <a href="page-contact.html">
                            <span class="title">Contact</span>
                        </a>
                    </li> -->

                    <!-- <li class="user_setting">
                        <div class="dropdown">
                            <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                                <img class="rounded-circle" src="/client/images/team/e1.png" alt="e1.png">
                                <span class="dn-1199">Ali Tufan</span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="user_set_header">
                                    <img class="float-left" src="/client/images/team/e1.png" alt="e1.png">
                                    <p>Ali Tufan <br>
                                        <span class="address">alitufan@gmail.com</span>
                                    </p>
                                </div>
                                <div class="user_setting_content">
                                    <a class="dropdown-item active" href="#">My Profile</a>
                                    <a class="dropdown-item" href="#">Messages</a>
                                    <a class="dropdown-item" href="#">Purchase history</a>
                                    <a class="dropdown-item" href="#">Help</a>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <header-navigation-profile-component></header-navigation-profile-component>
                    

                    <!-- <li class="list-inline-item add_listing home2">
                        <a href="#">
                            
                            <span class="flaticon-plus"></span>
                            <span class="dn-lg">Create Listing</span>
                        </a>
                    </li> -->

                    <li class="list-inline-item add_listing home2">
                        <router-link :to="{name: 'dashboard-add-new-announcement'}">
                            <a href="#">
                                <span class="flaticon-plus"></span>
                                <span class="dn-lg">Create Listing</span>
                            </a>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
    export default {
        components: {
            HeaderNavigationProfileComponent: () => import('./HeaderNavigationProfileComponent.vue'),
        },
    }
</script>

<style lang="scss" scoped>

</style>