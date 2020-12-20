<template>
    <div class="wrapper">
        <div class="preloader"></div>

        <!-- Main Header Nav -->
        <!-- <dashboard-header-navigation-component></dashboard-header-navigation-component> -->
        <header-navigation-component></header-navigation-component>

        <notifications group="server-response" position="top right" style="margin-top: 92px;" />

        <!-- Main Header Nav For Mobile -->
        <!-- <dashboard-mobile-menu-component></dashboard-mobile-menu-component> -->
        <dashboard-sidebar-component></dashboard-sidebar-component>       

        <!-- Our Dashbord -->
        <!-- <section class="dashbord bgc-f7 pb50">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
                    <div class="col-lg-9 col-xl-10 maxw100flex-992">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dashboard_navigationbar dn db-992">
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
                                        <ul id="myDropdown" class="dropdown-content">
                                            <li class="active"><a href="page-dashboard.html"><span class="flaticon-layers"></span> Dashboard</a></li>
                                            <li><a href="page-message.html"><span class="flaticon-envelope"></span> Message</a></li>
                                            <li><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
                                            <li><a href="page-my-favorites.html"><span class="flaticon-heart"></span> My Favorites</a></li>
                                            <li><a href="page-my-savesearch.html"><span class="flaticon-magnifying-glass"></span> Saved Search</a></li>
                                            <li><a href="page-my-review.html"><span class="flaticon-chat"></span> My Reviews</a></li>
                                            <li><a href="page-my-packages.html"><span class="flaticon-box"></span> My Package</a></li>
                                            <li><a href="page-my-profile.html"><span class="flaticon-user"></span> My Profile</a></li>
                                            <li><a href="page-add-new-property.html"><span class="flaticon-filter-results-button"></span> Add New Listing</a></li>
                                            <li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb10">
                                <div class="breadcrumb_content style2">
                                    <h2 class="breadcrumb_title">Howdy, Ali!</h2>
                                    <p>We are glad to see you again!</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="ff_one">
                                    <div class="icon"><span class="flaticon-home"></span></div>
                                    <div class="detais">
                                        <div class="timer">37</div>
                                        <p>All Properties</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="ff_one style2">
                                    <div class="icon"><span class="flaticon-view"></span></div>
                                    <div class="detais">
                                        <div class="timer">24</div>
                                        <p>Total Views</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="ff_one style3">
                                    <div class="icon"><span class="flaticon-chat"></span></div>
                                    <div class="detais">
                                        <div class="timer">12</div>
                                        <p>Total Visitor Reviews</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                <div class="ff_one style4">
                                    <div class="icon"><span class="flaticon-heart"></span></div>
                                    <div class="detais">
                                        <div class="timer">18</div>
                                        <p>Total Favorites</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="application_statics">
                                    <h4>View Statistics</h4>
                                    <div class="c_container"></div>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="recent_job_activity">
                                    <h4 class="title">Recent Activities</h4>
                                    <div class="grid">
                                        <ul>
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-home"></span></div></li>
                                            <li class="list-inline-item"><p>Your listing <strong>Luxury Family Home</strong> has been approved!.</p></li>
                                        </ul>
                                    </div>
                                    <div class="grid">
                                        <ul>
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-chat"></span></div></li>
                                            <li class="list-inline-item"><p>Kathy Brown left a review  on <strong>Renovated Apartment</strong></p></li>
                                        </ul>
                                    </div>
                                    <div class="grid">
                                        <ul>
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-heart"></span></div></li>
                                            <li class="list-inline-item"><p>Someone favorites your <strong>Gorgeous Villa Bay View</strong> listing!</p></li>
                                        </ul>
                                    </div>
                                    <div class="grid">
                                        <ul>
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-home"></span></div></li>
                                            <li class="list-inline-item"><p>Your listing <strong>Luxury Family Home</strong> has been approved!</p></li>
                                        </ul>
                                    </div>
                                    <div class="grid">
                                        <ul>
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-chat"></span></div></li>
                                            <li class="list-inline-item"><p>Kathy Brown left a review on <strong>Renovated Apartment</strong></p></li>
                                        </ul>
                                    </div>
                                    <div class="grid mb0">
                                        <ul class="pb0 mb0 bb_none">
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-heart"></span></div></li>
                                            <li class="list-inline-item"><p>Someone favorites your <strong>Gorgeous Villa Bay</strong> View listing!</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt50">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="copyright-widget text-center">
                                    <p>© 2020 Find House. Made with love.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- <section class="dashbord bgc-f7 pb50"> -->
            <router-view></router-view>
        <!-- </section> -->

        <a class="scrollToHome" href="#">
            <i class="flaticon-arrows"></i>
        </a>
    </div>
</template>

<script>
    export default {
        components: {
            HeaderNavigationComponent: () => import('../includes/partials/HeaderNavigationComponent.vue'),
            DashboardHeaderNavigationComponent: () => import('../includes/dashboard/partials/DashboardHeaderNavigation.vue'),
            DashboardSidebarComponent: () => import('../includes/dashboard/partials/DashboardSidebarComponent.vue'),
            DashboardMobileMenuComponent: () => import('../includes/dashboard/partials/DashboardMobileMenuComponent.vue'),
        },
        mounted() {
            this.$notify({
                group: 'server-response',
                title: 'Important message',
                text: 'Hello user! This is a notification!'
            })
        },
    }
</script>

<style lang="scss" scoped>

</style>