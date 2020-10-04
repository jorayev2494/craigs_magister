<!-- =========================================================================================
    File Name: ResetPassword.vue
    Description: Reset Password Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img">
        <div class="vx-col sm:w-3/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center">
            <vx-card>
                <div slot="no-body" class="full-page-bg-color">
                    <div class="vx-row">
                        <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                            <img src="@assets/images/pages/reset-password.png" alt="login" class="mx-auto">
                        </div>
                        <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center  d-theme-dark-bg">
                            <div class="p-8">
                                <div class="vx-card__title mb-8">
                                    <h4 class="mb-4">{{ $t('reset_password') }}</h4>
                                    <p>{{ $t('please_enter_your_new_password') }}</p>
                                </div>

                                <vs-input type="password" v-validate="'required|min:6|max:10'" data-vv-validate-on="blur" :label-placeholder="$t('password')" v-model="password" class="w-full mb-6" />
                                <vs-input type="password" v-validate="'min:6|max:10|confirmed:password'" data-vv-validate-on="blur" :label-placeholder="$t('password_confirm')" v-model="password_confirmation" class="w-full mb-8" />

                                <div class="flex flex-wrap justify-between flex-col-reverse sm:flex-row">
                                    <vs-button type="border" :to="{ name: 'admin-page-login' }" class="w-full sm:w-auto mb-8 sm:mb-auto mt-3 sm:mt-auto">{{ $t('go_back_to_login') }}</vs-button>
                                    <vs-button class="w-full sm:w-auto" @click="resetPassword()">{{ $t('reset') }}</vs-button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            password: '',
            password_confirmation: '',
            token: ''
        }
    },
    methods: {
        checkLogin() {
            // If user is already logged in notify
            if (this.$store.state.auth.isUserLoggedIn()) {
                // Close animation if passed as payload
                this.$vs.loading.close();

                this.$vs.notify({
                    title: 'Login Attempt',
                    text: 'You are already logged in!',
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'warning'
                })

                return false
            }
            return true
        },

        resetPassword() {
            if (!this.checkLogin()) return;

            // Loading
            this.$vs.loading()

            const payload = {
                data : {
                    password: this.password,
                    passwordConfirmation: this.password_confirmation,
                    token: this.token
                },
                notify: this.$vs.notify,
                closeAnimation: this.$vs.loading.close,
                i18n: this.$i18n,
            }

            this.$store.dispatch('auth/resetPasswordJWT', payload);
        }
    },
    computed: {
        validateForm() {
            return !this.errors.any() && this.password != '' && this.password_confirmation != '';
        },
    },
    mounted () {
        this.token = this.$route.query.token;
    },
}
</script>
