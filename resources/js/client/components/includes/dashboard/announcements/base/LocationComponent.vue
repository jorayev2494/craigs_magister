<template>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Location</h4>
            </div>

            <!-- <pre>{{ $data }}</pre> -->
            <div class="col-lg-6 col-xl-6">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Country{{ dataLocation.country ? ': ' + dataLocation.country : null }}</label>
                    <select name="country_id" class="selectpicker" v-model="dataLocation.country_id" data-live-search="true" data-width="100%">
                        <option v-for="country in countries" :key="country.id" :value="country.id" data-tokens="type1">{{ country.slug }}</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>City{{ dataLocation.city ? ': ' + dataLocation.city : null }}</label>
                    <select name="city_id" class="selectpicker" v-model="dataLocation.city_id" data-live-search="true" data-width="100%">
                        <option v-for="city in cities" :key="city.id" :value="city.id" data-tokens="type1">{{ city.slug }}</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="my_profile_setting_input form-group">
                    <div class="h400 bdrs8" id="map-canvas"></div>
                </div>
            </div>

            <div class="col-lg-6 col-xl-6">
                <div class="my_profile_setting_input form-group">
                    <label for="googleMapLat">Latitude (for Google Maps)</label>
                    <input type="number" step="any" name="location_google_latitude" class="form-control" v-model="dataLocation.location_google_latitude" id="googleMapLat">
                </div>
            </div>

            <div class="col-lg-6 col-xl-6">
                <div class="my_profile_setting_input form-group">
                    <label for="googleMapLong">Longitude (for Google Maps)</label>
                    <input type="number" step="any" name="location_google_longitude" class="form-control" v-model="dataLocation.location_google_longitude" id="googleMapLong">
                </div>
            </div>

            <!-- <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Google Map Street View</label>
                    <select class="selectpicker" data-live-search="true" data-width="100%">
                        <option data-tokens="Turkey">Street View v1</option>
                        <option data-tokens="Iran">Street View v2</option>
                        <option data-tokens="Iraq">Street View v3</option>
                        <option data-tokens="Spain">Street View v4</option>
                        <option data-tokens="Greece">Street View v5</option>
                        <option data-tokens="Portugal">Street View v6</option>
                    </select>
                </div>
            </div> -->

            <!-- <div class="col-xl-12">
                <div class="my_profile_setting_input">
                    <button class="btn btn1 float-left">Back</button>
                    <button class="btn btn2 float-right">Next</button>
                </div>
            </div> -->
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            dataLocation: {
                type: Object,
                required: true
            },
        },
        data() {
            return {
                countries: null,
                cities: null
            }
        },
        created() {
            // Load: countries
            this.$store.dispatch('country/ACTION_COUNTRIES').then((result) => {
                this.countries = result;
            }).catch((err) => { });

            // Load: cities
            this.$store.dispatch('city/ACTION_CITIES').then((result) => {
                this.cities = result;
            }).catch((err) => { });
        }
    }
</script>

<style lang="scss" scoped>

</style>