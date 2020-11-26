<template>
    <div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="col-lg-6 col-xl-6">
            <div class="regstr_thumb">
                <img class="img-fluid w100" src="/client/images/resource/regstr.jpg" alt="regstr.jpg">
            </div>
        </div>
        <div class="col-lg-6 col-xl-6">
            <div class="sign_up_form">
                <div class="heading">
                    <h4>Register</h4>
                </div>
                <form action="#" @submit.prevent="register()">
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-block btn-fb">
                                <i class="fa fa-facebook float-left mt5"></i> 
                                Login with Facebook
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-block btn-googl">
                                <i class="fa fa-google float-left mt5"></i> 
                                Login with Google
                            </button>
                        </div>
                    </div> -->
                    <hr>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="first_name" v-model="first_name" id="exampleInputName" placeholder="First Name">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="flaticon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <input type="text" class="form-control" name="last_name" v-model="last_name" id="exampleInputLastName" placeholder="Last Name">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="flaticon-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <input type="email" class="form-control" name="email" v-model="email" id="exampleInputEmail" placeholder="Email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" name="password" v-model="password" id="exampleInputPassword2" placeholder="Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="flaticon-password"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group input-group">
                        <input type="password" class="form-control" name="password_confirmation" v-model="password_confirmation" id="exampleInputPassword3" placeholder="Re-enter password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="flaticon-password"></i>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group ui_kit_select_search mb0">
                        <select class="selectpicker" data-live-search="true" data-width="100%">
                            <option data-tokens="SelectRole">Single User</option>
                            <option data-tokens="Agent/Agency">Agent</option>
                            <option data-tokens="SingleUser">Multi User</option>
                        </select>
                    </div> -->

                    <div class="form-group custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="exampleCheck2">
                        <label class="custom-control-label" for="exampleCheck2">
                            I have read and accept the Terms and Privacy Policy?
                        </label>
                    </div>
                    <button type="submit" :disabled="btnRegisterEnalbedComp" class="btn btn-log btn-block btn-thm">Sign Up</button>
                    <p class="text-center">
                        Already have an account? 
                        <a class="text-thm" href="#">Log In</a>
                    </p>
                </form>

                <pre>{{ $data }}</pre>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                password_confirmation: ''
            }
        },
        methods: {
            async register() {
                if (this.password.length < 6 || this.password !== this.password_confirmation) {
                    window.alert('Sorry not confirmed password or length must be 6 charsets');
                    return;
                }

                const result = await this.$store.dispatch('auth/jwtRegister', {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                });
            }
        },
        computed: {
            btnRegisterEnalbedComp() {
                return this.first_name == ''
                        && this.last_name == ''
                        && this.email == ''
                        && this.password == ''
                        && this.password_confirmation == '';
            }
        },
        created() {
            this.$store.watch(
                (state, getters) => this.$store.getters['auth/GET_REGISTERED'],
                (newValue, oldValue) => {
                    if (newValue == true) this.$emit('is-registered', newValue);
                }
            );
        },
    }
</script>

<style lang="scss" scoped>

</style>
