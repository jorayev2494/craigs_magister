<template>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-xl-2">
                <h4>Change password</h4>
            </div>
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleOldPass">Old Password</label>
                            <input type="password" class="form-control" v-model="current_password" name="current_password" id="formGroupExampleOldPass" placeholder="Current password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleNewPass">New Password</label>
                            <input type="password" class="form-control" v-model="password" name="password" id="formGroupExampleNewPass" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleConfPass">Confirm New Password</label>
                            <input type="password" class="form-control" v-model="password_confirmation" name="password_confirmation" id="formGroupExampleConfPass" placeholder="Password confirmation">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <!-- <div class="my_profile_setting_input float-left fn-520">
                            <button class="btn btn3 btn-dark">Update Profile</button>
                        </div> -->
                        <div class="my_profile_setting_input float-right fn-520">
                            <button class="btn btn2" @click.prevent="changePassword($event)">Change Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ProfileChangePasswordComponent',
        props: {
            authUserData: {
                type: Object,
                required: true
            },
        },
        data() {
            return {
                current_password: '',
                password: '',
                password_confirmation: '',
            }
        },
        methods: {
            changePassword(event) {
                this.$store.dispatch('profile/ACTION_CHANGE_PASSWORD', {
                    current_password: this.current_password,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                }).then((result) => {
                    if (result) {
                        this.current_password = this.password = this.password_confirmation = '';
                    }
                }).catch((err) => {
                    
                });
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>