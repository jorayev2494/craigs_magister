<template>
    <div class="my_dashboard_review">
        <div class="row">

            <!-- <pre>{{ $data }}</pre> -->
            <!-- Title -->
            <div class="col-lg-12">
                <h4 class="mb30">Create Listing</h4>
                <div class="my_profile_setting_input form-group">
                    <label for="propertyTitle">Property Title</label>
                    <input type="text" name="title" class="form-control" v-model="dataCreateListing.title" id="propertyTitle" placeholder="Title">
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-12">
                <div class="my_profile_setting_textarea">
                    <label for="propertyDescription">Description</label>
                    <textarea name="description" class="form-control" v-model="dataCreateListing.description" id="propertyDescription" rows="7" placeholder="Description"></textarea>
                </div>
            </div>

            <!-- Type (Category) -->
            <div class="col-lg-12 col-xl-12">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label>Category</label>
                    <select name="category_id" class="selectpicker" data-live-search="true" @change="changeCategory($event)" v-model="dataCreateListing.category_id" data-width="100%">
                        <option v-for="category in categories" :key="category.id" :value="category.id" data-tokens="type1">{{ category.slug }}</option>
                    </select>
                </div>
            </div>

            <!-- Price -->
            <div class="col-lg-4 col-xl-4">
                <div class="my_profile_setting_input form-group">
                    <label for="formGroupExamplePrice">Price</label>
                    <input type="number" step="any" name="price" class="form-control" v-model="dataCreateListing.price" id="formGroupExamplePrice">
                </div>
            </div>

            <!-- Price Per -->
            <div class="col-lg-6 col-xl-6">
                <div class="my_profile_setting_input ui_kit_select_search form-group">
                    <label for="formGroupExampleArea">Price Permissons</label>
                    <select name="price_per" class="selectpicker" data-live-search="true" v-model="dataCreateListing.price_per" data-width="100%">
                        <option v-for="per in price_permissions" :key="per" :value="per" data-tokens="type1">{{ per }}</option>
                    </select>
                </div>
            </div>

            <!-- Is price contractual -->
            <div class="col-lg-2 col-xl-2">
                <div class="shortcode_widget_checkbox">
                    <h5 class="mb20">Is price contractual</h5>
                    <div class="ui_kit_checkbox">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="is_price_contractual" class="custom-control-input" v-model="dataCreateListing.is_price_contractual" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Is price contractual</label>
                        </div>
                    </div>								
                </div>
            </div>

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
            dataCreateListing: {
                type: Object,
                required: true
            },
        },
        data() {
            return {
                categories: null,
                price_permissions: null
            }
        },
        methods: {
            changeCategory(event) {
                var selectedCategory = this.categories.find((cat) => event.target.value == cat.id);
                this.$emit('change-category', selectedCategory.slug);
            }
        },
        created() {
            // Load: countries
            this.$store.dispatch('category/ACTION_CATEGORIES').then((result) => {
                this.categories = result;
            }).catch((err) => { });

            this.$httpClient.get('/api/server/announcements/price_permissions').then((response) => {
                this.price_permissions = response.data;
            }).catch((err) => { });
        }
    }
</script>

<style lang="scss" scoped>

</style>