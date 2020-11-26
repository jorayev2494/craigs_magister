<template>
    <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="col-lg-6 col-xl-6">
            <div class="login_thumb">
                <img class="img-fluid w100" src="/client/images/resource/login.jpg" alt="login.jpg">
            </div>
        </div>
        <div class="col-lg-6 col-xl-6">
            <div class="login_form">
                <form action="#" @submit.prevent="register($event)">
                    <div class="heading">
                        <h4>Login</h4>
                    </div>

                    <!-- <div class="row mt25">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-fb btn-block">
                                <i class="fa fa-facebook float-left mt5"></i> 
                                Login with Facebook
                            </button>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-googl btn-block">
                                <i class="fa fa-google float-left mt5"></i>
                                Login with Google
                            </button>
                        </div>
                    </div> -->

                    <hr>

                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" v-model="email" name="email" id="inlineFormInputGroupUsername2" placeholder="Email">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="flaticon-user"></i>
                            </div>
                        </div>
                    </div>

                    <div class="input-group form-group">
                        <input type="password" class="form-control" v-model="password" name="password" id="exampleInputPassword1" placeholder="Password">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="flaticon-password"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" v-model="remember" name="remember" id="exampleCheck1">
                        <label class="custom-control-label" for="exampleCheck1">
                            Remember me
                        </label>
                        <a class="btn-fpswd float-right" href="#">Lost your password?</a>
                    </div>

                    <button type="submit" :disabled="btnLoginEnableComp" class="btn btn-log btn-block btn-thm">Log In</button>

                    <p class="text-center">
                        Don't have an account? 
                        <a class="text-thm" href="#">Register</a>
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
                email: 'user1@gmail.com',
                password: '476674',
                remember: false
            }
        },
        methods: {
            register() {
                this.$store.dispatch('auth/jwtLogin', {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                });
            }
        },
        computed: {
            btnLoginEnableComp() {
                return this.email == '' && this.password == '' && this.password.length <= 6;
            }
        },
        created() {
            this.$store.subscribe((mutation, state) => {
                console.log('mutation.type', mutation.type);
                if (mutation.type == 'auth/SET_BEARER_TOKEN') {
                    this.$emit('is-logined', true);
                }
            });
        },
    }
</script>

<style lang="scss" scoped>

</style>