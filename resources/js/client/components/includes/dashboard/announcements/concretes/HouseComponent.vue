<template>
    <div class="my_dashboard_review mt30">
        <div class="row">

            <!-- <pre>{{ dataConcrete }}</pre> -->
            <div class="col-lg-12">
                <h4 class="mb30">Detailed Information</h4>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Total area</label>
                    <input type="text" name="total_area" class="form-control" v-model="dataConcrete.total_area" id="propertyId" placeholder="Total area">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Property type</label>
                    <input type="text" name="property_type" class="form-control" v-model="dataConcrete.property_type" id="propertyId" placeholder="Property type">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Number of storeys</label>
                    <input type="number" name="number_of_storeys" class="form-control" v-model="dataConcrete.number_of_storeys" id="propertyId" placeholder="Number of storeys">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Floor</label>
                    <input type="number" name="floor" class="form-control" v-model="dataConcrete.floor" id="propertyId" placeholder="Floor">
                </div>
            </div>

            <div class="col-lg-6 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="propertyId">Quantity rooms</label>
                    <input type="number" name="quantity_rooms" class="form-control" v-model="dataConcrete.quantity_rooms" id="propertyId" placeholder="Quantity rooms">
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
                            <input type="checkbox" name="exchange_possibility" class="custom-control-input" v-model="dataConcrete.exchange_possibility" :value="false" id="exchange_possibility">
                            <label class="custom-control-label" for="exchange_possibility">Exchange possibility</label>
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
        }
    }
</script>

<style lang="scss" scoped>

</style>