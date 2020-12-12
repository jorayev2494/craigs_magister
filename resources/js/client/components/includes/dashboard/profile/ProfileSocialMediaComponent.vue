<template>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-xl-2">
                <h4>Social Media</h4>
            </div>
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleSkype">Skype</label>
                            <input type="text" class="form-control" id="formGroupExampleSkype" placeholder="alitfn">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleWebsite">Website</label>
                            <input type="text" class="form-control" id="formGroupExampleWebsite" placeholder="creativelayers@gmail.com">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleFaceBook">Facebook</label>
                            <input type="text" class="form-control" id="formGroupExampleFaceBook">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleTwitter">Twitter</label>
                            <input type="text" class="form-control" id="formGroupExampleTwitter">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleLinkedin">Linkedin</label>
                            <input type="text" class="form-control" id="formGroupExampleLinkedin">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInstagram">Instagram</label>
                            <input type="text" class="form-control" id="formGroupExampleInstagram">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleGooglePlus">Google Plus</label>
                            <input type="text" class="form-control" id="formGroupExampleGooglePlus">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleYoutube">Youtube</label>
                            <input type="text" class="form-control" id="formGroupExampleYoutube">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExamplePinterest">Pinterest</label>
                            <input type="text" class="form-control" id="formGroupExamplePinterest">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleVimeo">Vimeo</label>
                            <input type="text" class="form-control" id="formGroupExampleVimeo">
                        </div>
                    </div>
                    <div class="col-xl-12 text-right">
                        <div class="my_profile_setting_input">
                            <button class="btn btn2">Update Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ProfileSocialMediaComponent',
        props: {
            authUserData: {
                type: Object,
                required: true
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>