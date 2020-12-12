<template>
    <section class="dashbord bgc-f7 pb50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
                <div class="col-lg-9 col-xl-10 maxw100flex-992">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard_navigationbar dn db-992">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">
                                        <i class="fa fa-bars pr10"></i> 
                                        Dashboard Navigation
                                    </button>
                                    <ul id="myDropdown" class="dropdown-content">
                                        <li>
                                            <a href="page-dashboard.html">
                                                <span class="flaticon-layers"></span>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-message.html">
                                                <span class="flaticon-envelope"></span>
                                                Message
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-my-properties.html">
                                                <span class="flaticon-home"></span>
                                                My Properties
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-my-favorites.html">
                                                <span class="flaticon-heart"></span>
                                                My Favorites
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-my-savesearch.html">
                                                <span class="flaticon-magnifying-glass"></span>
                                                Saved Search
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-my-review.html">
                                                <span class="flaticon-chat"></span>
                                                My Reviews
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-my-packages.html">
                                                <span class="flaticon-box"></span>
                                                My Package
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="page-my-profile.html">
                                                <span class="flaticon-user"></span>
                                                My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-add-new-property.html">
                                                <span class="flaticon-filter-results-button"></span>
                                                Add New Listing
                                            </a>
                                        </li>
                                        <li>
                                            <a href="page-login.html">
                                                <span class="flaticon-logout"></span>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mb10">
                            <div class="breadcrumb_content style2">
                                <h2 class="breadcrumb_title">My Profile</h2>
                                <p>We are glad to see you again!</p>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <profile-information-component :auth-user-data="authUserData"></profile-information-component>

                            <!-- <profile-social-media-component :auth-user-data="authUserData"></profile-social-media-component> -->

                            <profile-change-password-component :auth-user-data="authUserData"></profile-change-password-component>
                        </div>
                    </div>
                    
                    <div class="row mt10">
                        <div class="col-lg-12">
                            <div class="copyright-widget text-center">
                                <p>© 2020 Find House. Made with love.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        methods: {
            
        },
        computed: {
            ...mapGetters({
                authUserData: 'auth/GET_USER_DATA'
            })
        },
        components: {
            ProfileInformationComponent: () => import('../../includes/dashboard/profile/ProfileInformationComponent.vue'),
            ProfileSocialMediaComponent: () => import('../../includes/dashboard/profile/ProfileSocialMediaComponent.vue'),
            ProfileChangePasswordComponent: () => import('../../includes/dashboard/profile/ProfileChangePasswordComponent.vue'),
        },
    }
</script>

<style scoped>
    /* .avatar {
        background-image: url(authUserData);
    } */

    /* .wrap-custom-file label {
        z-index: 1;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        overflow: hidden;
        cursor: pointer;
        background-image: url(../images/team/upload_photo.jpg);
        border-radius: 5px;
        -webkit-transition: -webkit-transform 0.4s;
        transition: -webkit-transform 0.4s;
        transition: transform 0.4s;
        transition: transform 0.4s, -webkit-transform 0.4s;
    } */
</style>