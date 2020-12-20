<template>
    <div>
        <!-- <div class="preloader"></div> -->
        <!-- Main Header Nav -->
        <header-navigation-component></header-navigation-component>
        <!-- <ws-debug-component></ws-debug-component> -->
        <notifications group="server-response" position="top right" style="margin-top: 92px;" />
        
        <!-- #region Modals -->
        <modal-login-and-register-component></modal-login-and-register-component>
        <!-- #endregion End Modals -->

        <!-- Content -->
        <router-view></router-view>

        <!-- Our Footer -->
        <section class="footer_one home3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg col-xl">
                        <div class="footer_about_widget home3">
                            <h4>About Site</h4>
                            <p>We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you
                                love. So let’s do this, together.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg col-xl">
                        <div class="footer_qlink_widget home3">
                            <h4>Quick Links</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">User’s Guide</a></li>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Press Info</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg col-xl">
                        <div class="footer_contact_widget home3">
                            <h4>Contact Us</h4>
                            <ul class="list-unstyled">
                                <li><a href="#"><span class="__cf_email__"
                                            data-cfemail="d8b1b6beb798beb1b6bcb0b7adabbdf6bbb7b5">[email&#160;protected]</span></a>
                                </li>
                                <li><a href="#">Collins Street West, Victoria</a></li>
                                <li><a href="#">8007, Australia.</a></li>
                                <li><a href="#">+1 246-345-0699</a></li>
                                <li><a href="#">+1 246-345-0695</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg col-xl">
                        <div class="footer_social_widget home3">
                            <h4>Follow us</h4>
                            <ul class="mb30">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg col-xl">
                        <div class="footer_social_widget home3">
                            <h4>Subscribe</h4>
                            <form class="footer_mailchimp_form home3">
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                        <input type="email" class="form-control mb-2" id="inlineFormInput"
                                            placeholder="Your email">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary mb-2"><i
                                                class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Footer Bottom Area -->
        <section class="footer_middle_area home3 pt30 pb30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="footer_menu_widget home3">
                            <ul>
                                <li class="list-inline-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Listing</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Property</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Pages</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Blog</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="copyright-widget home3 text-right">
                            <p>© 2020 Find House. Made with love.</p>
                        </div>
                    </div>
                </div>
            </div>

            <a class="scrollToHome text-thm3" href="#">
                <i class="flaticon-arrows"></i>
            </a>
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                testText: 'This is Data text',
            }
        },
        components: {
            HeaderNavigationComponent: () => import('../includes/partials/HeaderNavigationComponent.vue'),
            ModalLoginAndRegisterComponent: () => import('../includes/Modals/auth/ModalLoginAndRegisterComponent.vue'),
        },
    }
</script>

<style>

</style>