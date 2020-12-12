<template>
    <div class="dashboard_sidebar_menu dn-992">
        <ul class="sidebar-menu">
            <li class="header">
                <img src="/client/images/header-logo2.png" alt="header-logo2.png">
            </li>
            <li class="title">
                <span>Main</span>
            </li>
            <li class="treeview">
                <!-- <a href="page-dashboard.html">
                    <i class="flaticon-layers"></i>
                    <span>
                        Dashboard
                    </span>
                </a> -->
                <router-link :to="{ name: 'dashboard' }">Dashboard</router-link>
            </li>
            <li class="treeview">
                <a href="page-message.html">
                    <i class="flaticon-envelope"></i>
                    <span> Message</span>
                </a>
            </li>
            <li class="title">
                <span>Manage Listings</span>
            </li>
            <li class="treeview">
                <a href="page-my-properties.html">
                    <i class="flaticon-home"></i>
                    <span>My Properties</span>
                    <i class="fa fa-angle-down pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i>
                            General Elements
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i>
                            Advanced Elements
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i>
                            Editors
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="page-my-favorites.html">
                    <i class="flaticon-heart"></i>
                    <span> My Favorites</span>
                </a>
            </li>
            <li>
                <!-- <a href="page-my-favorites.html">
                    <i class="flaticon-heart"></i>
                    <span> My Favorites</span>
                </a> -->
                <router-link :to="{ name: 'dashboard-my-announcements' }">
                    <i class="flaticon-heart"></i>
                    <span> My Announcements</span>
                </router-link>
            </li>
            <li>
                <a href="page-my-savesearch.html">
                    <i class="flaticon-magnifying-glass"></i>
                    <span>Saved Search</span>
                </a>
            </li>
            <li class="treeview">
                <a href="page-my-review.html">
                    <i class="flaticon-chat"></i>
                    <span> Reviews</span>
                    <i class="fa fa-angle-down pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i>
                            My Reviews
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i> 
                            Visitor Reviews
                        </a>
                    </li>
                </ul>
            </li>
            <li class="title">
                <span>Manage Account</span>
            </li>
            <li>
                <a href="page-my-packages.html">
                    <i class="flaticon-box"></i>
                    <span>My Package</span>
                </a>
            </li>
            <li>
                <!-- <a href="page-my-profile.html">
                    <i class="flaticon-user"></i>
                    <span>My Profile</span>
                </a> -->

                <router-link :to="{ name: 'dashboard-my-profile' }">
                    <i class="flaticon-user"></i>
                    <span>My Profile</span>
                </router-link>
            </li>
            <li>
                <a href="#" @click.prevent="logout($event)">
                    <i class="flaticon-logout"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        methods: {
            logout(event) {
                this.$store.dispatch('auth/jwtLogout').then((result) => {
                    // this.$router.push({ name: 'index' });
                }).catch((err) => { 
                    // this.$router.push({ name: 'index' });
                });

                this.$router.push({ name: 'index' });
            }
        },
    }

</script>

<style lang="scss" scoped>

</style>
