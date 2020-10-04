<template>
    <div class="mt-12">
        <vs-input v-validate="'required|email|min:3'" data-vv-validate-on="blur" name="email" icon-no-border icon="icon icon-user" icon-pack="feather" :label-placeholder="$t('email')" v-model="email" class="w-full" />
        <span class="text-danger text-sm">{{ errors.first('email') }}</span>

        <vs-input data-vv-validate-on="blur" v-validate="'required|min:6|max:50'" type="password" name="password" icon-no-border icon="icon icon-lock" icon-pack="feather" :label-placeholder="$t('password')" v-model="password" class="w-full mt-6" />
        <span class="text-danger text-sm">{{ errors.first('password') }}</span>

        <div class="flex flex-wrap justify-between my-5">
            <vs-checkbox v-model="checkbox_remember_me" class="mb-3">{{ $t('remember_me') }}</vs-checkbox>
            <router-link :to="{ name: 'admin-page-forgot-password' }">{{ $t('forgot_password') }}</router-link>
        </div>
        <div class="flex flex-wrap justify-between mb-3">
            <vs-button type="border" @click="registerUser()">{{ $t('register') }}</vs-button>
            <vs-button :disabled="!validateForm" @click="loginJWT()">{{ $t('login') }}</vs-button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: '',
            password: '',
            checkbox_remember_me: false
        }
    },
    computed: {
        validateForm() {
            return !this.errors.any() && this.email != '' && this.password != '';
        },
    },
    methods: {
        checkLogin() {
            // If user is already logged in notify
            if (this.$store.state.auth.isUserLoggedIn()) {

                // Close animation if passed as payload
                this.$vs.loading.close()

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

        loginJWT() {

            if (!this.checkLogin()) return

            // Loading
            this.$vs.loading()

            const payload = {
                checkbox_remember_me: this.checkbox_remember_me,
                userDetails: {
                    email: this.email,
                    password: this.password,
                    remember_me: this.checkbox_remember_me
                },
                notify: this.$vs.notify,
                closeAnimation: this.$vs.loading.close,
                i18n: this.$i18n,
            }

            this.$store.dispatch('auth/loginJWT', payload).then(() => {
                this.$vs.loading.close()
            }).catch(error => {
                // console.table(error);
                this.$vs.loading.close()
                // this.$vs.notify({
                //     title: 'Error',
                //     text: error.message,
                //     iconPack: 'feather',
                //     icon: 'icon-alert-circle',
                //     color: 'danger'
                // })
            })
        },
        registerUser() {
            if (!this.checkLogin()) return;
            this.$router.push({ name: 'admin-page-register' }).catch(() => {})
        }
    }
}
</script>
