<template>
    <section class="listing-title-area" v-if="getBigImgCom">
        <!-- <pre>{{ this.$data }}</pre> -->
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="listing_sidebar dn db-991">
                        <div class="sidebar_content_details style3">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                                <div class="sidebar_advanced_search_widget">
                                    <h4 class="mb25">
                                        Advanced Search
                                        <a class="filter_closed_btn float-right" href="#">
                                            <small>Hide Filter</small>
                                            <span class="flaticon-close"></span>
                                        </a>
                                    </h4>
                                    <ul class="sasw_list style2 mb0">
                                        <li class="search_area">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputName1" placeholder="keyword">
                                                <label for="exampleInputEmail">
                                                    <span class="flaticon-magnifying-glass"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="search_area">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
                                                <label for="exampleInputEmail">
                                                    <span class="flaticon-maps-and-flags"></span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick">
                                                        <option>Status</option>
                                                        <option>Apartment</option>
                                                        <option>Bungalow</option>
                                                        <option>Condo</option>
                                                        <option>House</option>
                                                        <option>Land</option>
                                                        <option>Single Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick">
                                                        <option>Property Type</option>
                                                        <option>Apartment</option>
                                                        <option>Bungalow</option>
                                                        <option>Condo</option>
                                                        <option>House</option>
                                                        <option>Land</option>
                                                        <option>Single Family</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="small_dropdown2">
                                                <div id="prncgs" class="btn dd_btn">
                                                    <span>Price</span>
                                                    <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                                </div>
                                                <div class="dd_content2">
                                                    <div class="pricing_acontent">
                                                        <input type="text" class="amount" placeholder="$52,239"> 
                                                        <input type="text" class="amount2" placeholder="$985,14">
                                                        <div class="slider-range"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick">
                                                        <option>Bathrooms</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick">
                                                        <option>Bedrooms</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick">
                                                        <option>Garages</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_two">
                                                <div class="candidate_revew_select">
                                                    <select class="selectpicker w100 show-tick">
                                                        <option>Year built</option>
                                                        <option>2013</option>
                                                        <option>2014</option>
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                        <option>2017</option>
                                                        <option>2018</option>
                                                        <option>2019</option>
                                                        <option>2020</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="min_area style2 list-inline-item">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputName2" placeholder="Min Area">
                                            </div>
                                        </li>
                                        <li class="max_area list-inline-item">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputName3" placeholder="Max Area">
                                            </div>
                                        </li>
                                        <li>
                                            <div id="accordion" class="panel-group">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion"><i class="flaticon-more"></i> Advanced features</a>
                                                        </h4>
                                                    </div>
                                                    <div id="panelBodyRating" class="panel-collapse collapse">
                                                        <div class="panel-body row">
                                                            <div class="col-lg-12">
                                                                <ul class="ui_kit_checkbox selectable-list float-left fn-400">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                            <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
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
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                                            <label class="custom-control-label" for="customCheck10">Gym</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                                            <label class="custom-control-label" for="customCheck5">Microwave</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                                            <label class="custom-control-label" for="customCheck6">TV Cable</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                            <label class="custom-control-label" for="customCheck2">Lawn</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                                            <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                            <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="ui_kit_checkbox selectable-list float-right fn-400">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                                            <label class="custom-control-label" for="customCheck12">WiFi</label>
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
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                                            <label class="custom-control-label" for="customCheck7">Dryer</label>
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
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                                            <label class="custom-control-label" for="customCheck13">Laundry</label>
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
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                                            <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="search_option_button">
                                                <button type="submit" class="btn btn-block btn-thm">Search</button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row mb30">
                <div class="col-lg-7 col-xl-8">
                    <div class="single_property_title mt30-767">
                        <!-- <h2>{{ announcement.title }} <small>/{{ announcement.status }}</small></h2> -->
                        <h2>{{ announcement.title }}</h2>
                        <p>
                            <span class="flaticon-placeholder"></span>
                            {{ announcement.location.country }}, {{ announcement.location.city }}
                        </p>
                    </div>
                    <div class="dn db-991">
                        <div id="main2">
                            <span id="open2" class="flaticon-filter-results-button filter_open_btn style3">Show Filter</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="single_property_social_share">
                        <div class="price float-left fn-400">
                            <h2>{{ announcement.price }}<small>/{{ announcement.price_per }}</small></h2>
                        </div>
                        <div class="spss style2 mt20 text-right tal-400">
                            <!-- <ul class="mb0">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="flaticon-transfer-1"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="flaticon-heart"></span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <router-link :to="{ name: 'dashboard-edit-announcement', params:{ id: $route.params.id } }">
                                        <span class="flaticon-edit"></span>
                                    </router-link>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <span class="flaticon-garbage"></span>
                                    </a>
                                </li>
                            </ul> -->

                            <ul class="mb0">
                                <li class="list-inline-item" style="width: auto; display: inline-block;">
                                    <star-rating class="mb0 list-inline-item" :rating="announcement.rate" :is-indicator-active="true" :star-style="{
                                        starWidth: 18,
                                        starHeight: 18,
                                        fullStarColor: '#bcc52a',
                                        emptyStarColor: '#e1e1e1'
                                    }">
                                    </star-rating>
                                </li>
                                <!-- <li class="list-inline-item">
                                    <a href="#">
                                        <span class="flaticon-transfer-1">48</span>
                                    </a>
                                </li> -->
                            </ul>
                                                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="spls_style_two mb30-520">
                                <a class="popup-img" :href="$func.serverImage(750, getBigImgCom)">
                                    <img class="img-fluid w100" v-server-image:750="getBigImgCom">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 col-lg-4">
                    <div class="row" v-if="fiveImgs.length > 1">
                        
                        <div class="col-sm-6 col-lg-6" v-for="(img) in fiveImgs" :key="img">
                            <div class="spls_style_two mb30">
                                <a class="popup-img" :href="$func.serverImage(750, img)">
                                    <img class="img-fluid w100" v-server-image:165="img">
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6" v-if="sexsImage.img">
                            <div class="spls_style_two mb30">
                                <a class="popup-img" :href="$func.serverImage(750, sexsImage.img)">
                                    <img class="img-fluid w100" v-server-image:165="sexsImage.img">
                                </a>
                                <div class="overlay popup-img">
                                    <h3 class="title">+{{ sexsImage.count }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: {
            announcement: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                fiveImgs: [],
                sexsImage: {
                    img: null,
                    count: 0,
                }
            }
        },
        methods: {
            loadFiveImgs() {
                for (const key in this.announcement.images) {
                    if (this.announcement.images.hasOwnProperty(key)) {
                        const img = this.announcement.images[key];                        
                        if (key > 0 && key < 6) {
                            this.fiveImgs.push(img);
                        }

                        if (key > 6) {
                            if (this.sexsImage.count == 0) {
                                this.sexsImage.img = img;
                            }
                            this.sexsImage.count++;
                        }
                    }
                }
            }
        },
        computed: {
            getBigImgCom() {
                return this.announcement.images[0];
            }
        },
        beforeMount() {
            this.loadFiveImgs();
        }
    }
</script>

<style lang="scss" scoped>

</style>