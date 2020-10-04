<!-- =========================================================================================
File Name: RegisterJWT.vue
Description: Register Page for JWT
----------------------------------------------------------------------------------------
Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <div class="clearfix mb-8">
        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" :label-placeholder="$t('first_name')" name="firs_name" :placeholder="$t('first_name')" v-model="firs_name" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('firs_name') }}</span>

        <vs-input v-validate="'required|alpha_dash|min:3'" data-vv-validate-on="blur" :label-placeholder="$t('last_name')" name="last_name" :placeholder="$t('last_name')" v-model="last_name" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('last_name') }}</span>

        <vs-input v-validate="'required|email'" data-vv-validate-on="blur" name="email" type="email" :label-placeholder="$t('email')" :placeholder="$t('email')" v-model="email" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>

        <vs-input ref="password" type="password" data-vv-validate-on="blur" v-validate="'required|min:6|max:10'" name="password" :label-placeholder="$t('password')" :placeholder="$t('password')" v-model="password" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('password') }}</span>

        <vs-input type="password" v-validate="'min:6|max:10|confirmed:password'" data-vv-validate-on="blur" data-vv-as="password" name="confirm_password" :label-placeholder="$t('password_confirm')" :placeholder="$t('password_confirm')" v-model="confirm_password" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('confirm_password') }}</span>

        <vs-checkbox v-model="isTermsConditionAccepted" class="mt-6">{{ $t('iAcceptTheTermsAndConditions') }}</vs-checkbox>
        <vs-button type="border" :to="{ name: 'admin-page-login' }" class="mt-6">{{ $t('login') }}</vs-button>
        <vs-button class="float-right mt-6" @click="registerUserJWt()" :disabled="!validateForm">{{ $t('register') }}</vs-button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            firs_name: '',
            last_name: '',
            email: '',
            password: '',
            confirm_password: '',
            isTermsConditionAccepted: true
        }
    },
    computed: {
        validateForm() {
            return !this.errors.any() && this.displayName != '' &&
                this.email != '' && this.password != '' &&
                this.confirm_password != '' && this.isTermsConditionAccepted === true;
        }
    },
    methods: {
        checkLogin() {
            // If user is already logged in notify
            if (this.$store.state.auth.isUserLoggedIn()) {

                // Close animation if passed as payload
                // this.$vs.loading.close()

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

        registerUserJWt() {
            // If form is not validated or user is already login return
            if (!this.validateForm || !this.checkLogin()) return;

            const payload = {
                userDetails: {
                    firstName: this.firs_name,
                    lastName: this.last_name,
                    email: this.email,
                    password: this.password,
                    confirmPassword: this.confirm_password
                },
                notify: this.$vs.notify,
                closeAnimation: this.$vs.loading.close,
                i18n: this.$i18n,
            }
            this.$store.dispatch('auth/registerUserJWT', payload)
        }
    }
}
</script>
