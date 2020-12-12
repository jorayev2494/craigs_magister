<template>
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-xl-2">
                <h4>Profile Information</h4>
            </div>
            <div class="col-xl-10">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wrap-custom-file">
                            <input type="file" name="image1" id="image1" @change="avatarChanged($event)" accept=".gif, .jpg, .png"/>
                            <label  for="image1">
                                <img v-server-image:260="authUserData.avatar" ref="avatar">
                                <span style="z-index: 10">
                                    <i class="flaticon-download"></i>
                                    Upload Photo
                                </span>
                            </label>
                        </div>
                        <p>*minimum 260px x 260px</p>
                    </div>
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput1">Username</label>
                            <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="alitfn">
                        </div>
                    </div> -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput3">First Name</label>
                            <input type="text" class="form-control" v-model="authUserData.first_name" id="formGroupExampleInput3" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput4">Last Name</label>
                            <input type="text" class="form-control" v-model="authUserData.last_name" id="formGroupExampleInput4" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleEmail">Email</label>
                            <input type="email" class="form-control" v-model="authUserData.email" :disabled="true" id="formGroupExampleEmail" placeholder="Email">
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput5">Position</label>
                            <input type="text" class="form-control" id="formGroupExampleInput5">
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput6">License</label>
                            <input type="text" class="form-control" id="formGroupExampleInput6">
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput7">Tax Number</label>
                            <input type="text" class="form-control" id="formGroupExampleInput7">
                        </div>
                    </div> -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput8">Phone</label>
                            <input type="text" class="form-control" v-model="authUserData.phone" id="formGroupExampleInput8" placeholder="Phone">
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput9">Fax Number</label>
                            <input type="text" class="form-control" id="formGroupExampleInput9">
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput10">Mobile</label>
                            <input type="text" class="form-control" id="formGroupExampleInput10">
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput11">Language</label>
                            <input type="text" class="form-control" id="formGroupExampleInput11">
                        </div>
                    </div> -->
                    <!-- <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput12">Company Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput12">
                        </div>
                    </div> -->
                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                            <label>Country</label>
                            <select class="selectpicker" @change="selectedCountry($event)" data-live-search="true" data-width="100%">
                                <option v-for="country in countries" :key="country.id" :value="country.id" :data-tokens="country.iso_code">{{ country.slug + ' ' + country.id }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6 col-xl-6">
                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                            <label>City</label>

                            <select class="selectpicker" @change="selectedCity($event)" data-live-search="true" data-width="100%">
                                <template v-if="true">
                                    <option v-for="city in citiesComp" :key="city.id" :value="city.id" :data-tokens="city.slug">
                                        {{ city.slug + ' ' + city.country_id }}
                                    </option>
                                </template>
                                <template v-else>
                                    <option>{{ authUserData.location.city  }}</option>
                                </template>
                                <pre>{{ citiesComp }}</pre>
                            </select>

                        </div>
                    </div>

                    <!-- <div class="col-xl-12">
                        <div class="my_profile_setting_input form-group">
                            <label for="formGroupExampleInput13">Address</label>
                            <input type="text" class="form-control" id="formGroupExampleInput13">
                        </div>
                    </div> -->
                    <div class="col-xl-12">
                        <div class="my_profile_setting_textarea">
                            <label for="exampleFormControlTextarea1">About me</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" placeholder="About" v-model="authUserData.about"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 text-right">
                        <div class="my_profile_setting_input">
                            <!-- <button class="btn btn1">View Public Profile</button> -->
                            <button type="submit" @click.prevent="updateProfileInformation($event)" class="btn btn2">
                                Update Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ProfileInformationComponent',
        props: {
            authUserData: {
                type: Object,
                required: true
            },
        },
        data() {
            return {
                countries: null,
                serverCities: null,
                cities: null,
            }
        },
        methods: {
            async avatarChanged(event) {
                var formData = new FormData();
                formData.append('uploaded_avatar', this.loadFilePreviewAvatar(event));
                await this.$httpClient.post('/api/profile', formData, {
                        headers: { 'Content-Type': 'multipart/form-data' }
                    }).then((response) => {
                    if (response.status = 202) {
                        this.$store.commit('auth/SET_UPDATE_USER_DATA', response.data);
                    }
                }).catch((err) => { });
            },

            loadFilePreviewAvatar(event) {
                var file = event.target.files[0];
                var fileUrl = URL.createObjectURL(file);
                this.$refs.avatar.setAttribute('src', fileUrl);
                return file;
            },

            selectedCountry(event) {
                this.authUserData.location_country_id = event.target.value;
                this.cities = this.getCitiesByCountryId(event.target.value);
                console.log('this.cities: ', this.cities);
            },

            selectedCity(event) {
                this.authUserData.location_city_id = event.target.value;
                // this.cities = this.getCitiesByCountryId(event.target.value);
                // console.log('this.cities: ', this.cities);
            },

            getCitiesByCountryId(country_id) {
                var localCities = {};

                for (const key in this.serverCities) {
                    const city = this.serverCities[key];
                    if (city.country_id == country_id) localCities[city.id] = city;                        
                }

                return localCities;
            },
            async updateProfileInformation(event) {
                 await this.$store.dispatch('profile/ACTION_UPDATE_PROFILE_UPDATE', this.authUserData).then((result) => {
                      this.$store.commit('auth/SET_UPDATE_USER_DATA', { user_data: result });
                 }).catch((err) => { });;
            }
        },
        computed: {
            citiesComp() {
                return this.cities;
                // set: function(value) {
                //     this.cities = value;
                //     window.console.log('setter: ', this.cities);
                // }
            }
        },
        created() {
            this.$store.dispatch('country/ACTION_COUNTRIES', null).then((result) => {
                this.countries = result;
            }).catch((err) => { });

            this.$store.dispatch('city/ACTION_CITIES', null).then((result) => {
                this.cities = this.serverCities = result;
            }).catch((err) => { });
        }
    }
</script>

<style lang="scss" scoped>

</style>