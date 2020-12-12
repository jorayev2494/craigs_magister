<template>
    <div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" ref="btnClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body container pb20">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" ref="login" data-toggle="tab" href="#home"
                                        role="tab" aria-controls="home" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" ref="register" data-toggle="tab" href="#profile"
                                        role="tab" aria-controls="profile" aria-selected="false">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content container" id="myTabContent">                        
                        <register-component @is-registered="clickRegister($event)"></register-component>
                        <login-component @colse-auth-modal="colseAuthModal($event)"></login-component>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            clickRegister(event) { this.$refs['login'].click(); },
            colseAuthModal(event) { this.$refs['btnClose'].click(); },
        },
        components: {
            RegisterComponent: () => import('./RegisterComponent.vue'),
            LoginComponent: () => import('./LoginComponent.vue')
        },
    }
</script>

<style lang="scss" scoped>

</style>