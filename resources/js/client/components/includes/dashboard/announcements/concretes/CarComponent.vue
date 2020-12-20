<template>
    <div class="my_dashboard_review mt30">
        <div class="row">

            <!-- <pre>{{ dataConcrete }}</pre> -->
            <div class="col-lg-12">
                <h4 class="mb30">Detailed Information</h4>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Marka</label>
                    <input type="text" name="marka" class="form-control" v-model="dataConcrete.marka" id="propertyId" placeholder="Marka">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Model</label>
                    <input type="text" name="model" class="form-control" v-model="dataConcrete.model" id="propertyModel" placeholder="Model">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Year</label>
                    <input type="year" name="year" class="form-control" v-model="dataConcrete.year" id="propertyId" placeholder="Year">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Engine</label>
                    <input type="text" name="engine" class="form-control" v-model="dataConcrete.engine" id="propertyId" placeholder="Engine">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Color</label>
                    <input type="text" name="engine" class="form-control" v-model="dataConcrete.color" id="propertyId" placeholder="Color">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Transmission</label>
                    <select name="category_id" class="selectpicker" data-live-search="true" v-model="dataConcrete.transmission" data-width="100%">
                        <option v-for="(transmission, key) in transmissions" :key="key" :value="transmission.title" data-tokens="type1">{{ transmission.title }}</option>
                    </select>
                </div>
            </div>

            <!-- <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Transmission</label>
                    <input type="text" name="transmission" class="form-control" v-model="dataConcrete.transmission" id="propertyId" placeholder="Transmission">
                </div>
            </div> -->

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Drive unit</label>
                    <input type="text" name="engine" class="form-control" v-model="dataConcrete.drive_unit" id="propertyId" placeholder="Drive unit">
                </div>
            </div>

            <div class="col-xl-12">
                <h4>Amenities</h4>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
                <ul class="ui_kit_checkbox selectable-list">
                    <li>
                        <!-- <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                            <label class="custom-control-label" for="customCheck6">TV Cable</label>
                        </div> -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="exchange" class="custom-control-input" v-model="dataConcrete.exchange" :value="false" id="exchange">
                            <label class="custom-control-label" for="exchange">Exchange</label>
                        </div>
                    </li>

                    <!-- <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                        </div>
                    </li> -->

                    <!-- <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2">Lawn</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                            <label class="custom-control-label" for="customCheck4">Barbeque</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                            <label class="custom-control-label" for="customCheck5">Microwave</label>
                        </div>
                    </li> -->
                </ul>
            </div>

            <!-- <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
                <ul class="ui_kit_checkbox selectable-list">
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                            <label class="custom-control-label" for="customCheck6">TV Cable</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                            <label class="custom-control-label" for="customCheck7">Dryer</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                            <label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck9">
                            <label class="custom-control-label" for="customCheck9">Washer</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                            <label class="custom-control-label" for="customCheck10">Gym</label>
                        </div>
                    </li>
                </ul>
            </div> -->

            <!-- <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
                <ul class="ui_kit_checkbox selectable-list">
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                            <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck12">
                            <label class="custom-control-label" for="customCheck12">WiFi</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck13">
                            <label class="custom-control-label" for="customCheck13">Laundry</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck14">
                            <label class="custom-control-label" for="customCheck14">Sauna</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck15">
                            <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                        </div>
                    </li>
                </ul>
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
            dataConcrete: {
                type: Object,
                required: true
            },
        },
        data() {
            return {
                transmissions: [
                    {
                        title: 'avtomat'
                    },
                    {
                        title: 'hand'
                    },
                ]
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>