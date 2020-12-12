<template>
    <li class="list-inline-item" v-if="userLogined">
        <div class="user_setting dropdown">
            <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
                <img class="rounded-circle avatar-radius" :src="authUserAvatarComp">
                <span class="dn-1199" v-sub-text:10="authUser.first_name"></span>
            </a>
            <div class="dropdown-menu">
                <div class="user_set_header">
                    <img class="float-left avatar-radius avatar" :src="authUserAvatarComp">
                    <p>
                        <span class="address">{{ authUser.email }}</span>
                    </p>
                </div>
                <div class="user_setting_content">
                    <router-link class="dropdown-item active" :to="{ name: 'dashboard-index' }">Dashboard</router-link>
                    <router-link class="dropdown-item active"  :to="{ name: 'dashboard-my-profile' }">My Profile</router-link>
                    <!-- <a class="dropdown-item active" href="#">My Profile</a> -->
                    <a class="dropdown-item" href="#">Messages</a>
                    <a class="dropdown-item" href="#">Purchase history</a>
                    <a class="dropdown-item" href="#">Help</a>
                    <a class="dropdown-item" @click.prevent="logout($event)" href="#">Log out</a>
                </div>
            </div>
        </div>
    </li>

    <li class="list-inline-item list_s" v-else>
        <a href="#" class="btn flaticon-user" data-toggle="modal" data-target=".bd-example-modal-lg">
            <span class="dn-lg text-thm3">Login/Register</span>
        </a>
    </li>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                authUser: null,
                isAvatarUploaded: false,
            }
        },
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
        computed: {
            ...mapGetters({
                userLogined: 'auth/GET_USER_LOGINED'
            }),
            authUserAvatarComp: {
                get: function() { return this.authUser.avatar },
                set: function(value) { this.authUser.avatar = value }
            }
        },
        created() {
            this.authUser = this.$store.getters['auth/GET_USER_DATA'];
            this.$store.subscribe((mutation, state) => {
                if (mutation.type == 'auth/SET_UPDATE_USER_DATA') {
                    this.authUserAvatarComp = JSON.parse(window.localStorage.getItem('userData')).avatar;
                }
            });
            console.log('userLogined: ', this.userLogined);
        }
    }
</script>

<style lang="scss" scoped>

</style>