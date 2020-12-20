<template>
    <div class="container" v-if="user">
        <div class="row">
            <div class="col-lg-12">
                <div class="listing_sidebar dn db-991">
                    <div class="sidebar_content_details style3">
                        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
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
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="breadcrumb_content style2 mt30-767 mb30-767">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active text-thm" aria-current="page">Agencies Single</li>
                            </ol>
                            <h2 class="breadcrumb_title">Agencies Single</h2>
                        </div>
                        <div class="dn db-991 mt30 mb0">
                            <div id="main2">
                                <span id="open2" class="flaticon-filter-results-button filter_open_btn style3"> Show Filter</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="feat_property list agency">
                            <div class="thumb">
                                <img class="img-whp" v-server-image:241="user.avatar" />
                                <div class="thmb_cntnt">
                                    <ul class="tag mb0">
                                        <li class="list-inline-item dn"></li>
                                        <li class="list-inline-item">
                                            <a href="#">{{ user.announcements.length }} Listings</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details">
                                <div class="tc_content">
                                    <h4>{{ user.full_name }}</h4>
                                    <!-- <p class="text-thm">Agent</p> -->
                                    <star-rating :rating="user.rate" :is-indicator-active="true" :star-style="{
                                            starWidth: 20,
                                            starHeight: 20,
                                            fullStarColor: '#bcc52a',
                                            emptyStarColor: '#e1e1e1'
                                        }">
                                    </star-rating>
                                    <ul class="prop_details mb0">
                                        <li>
                                            <a href="#">Location: {{ user.location.country }}, {{ user.location.city }}</a>
                                        </li>
                                        <li>
                                            <a href="#">Mobile: {{ user.phone }}</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#">Fax: 342 654 1258</a>
                                        </li> -->
                                        <li>
                                            <a href="#">Email: {{ user.email }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- <div class="fp_footer">
                                    <ul class="fp_meta float-left mb0">
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                    </ul>
                                    <div class="fp_pdate float-right text-thm">View My Listings <i class="fa fa-angle-right"></i></div>
                                </div> -->
                            </div>
                        </div>

                        <div class="shop_single_tab_content style2 mt30">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="listing-tab" data-toggle="tab" href="#listing" role="tab" aria-controls="listing" aria-selected="false">Listing</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="agent-tab" data-toggle="tab" href="#agent" role="tab" aria-controls="agent" aria-selected="false">Agents</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent2">
                                <!-- Description -->
                                <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="product_single_content">
                                        <div class="mbp_pagination_comments">
                                            <div class="mbp_first media">
                                                <div class="media-body">
                                                    <p class="mt10 mb0">{{ user.about }}</p>
                                                    <!-- <p class="mb25">daw</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Description -->

                                <div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" v-if="user.announcements" id="listing" role="tabpanel" aria-labelledby="listing-tab">
                                    <div class="col-lg-12" v-for="(announcement, key) in user.announcements" :key="key">
                                        <div class="feat_property list style2 hvr-bxshd bdrrn mb10 mt20">
                                            <div class="thumb">
                                                <img class="img-whp" v-server-image:273="announcement.images[0]">
                                                <div class="thmb_cntnt">
                                                    <ul class="icon mb0">
                                                        <li class="list-inline-item" style="width: auto; display: inline-block; background-color: transparent; opacity: 1;">
                                                            <a href="#">
                                                                <star-rating class="mb0 list-inline-item mt-2" :rating="announcement.rate" :is-indicator-active="false" :star-style="{
                                                                    starWidth: 14,
                                                                    starHeight: 14,
                                                                    fullStarColor: '#bcc52a',
                                                                    emptyStarColor: '#e1e1e1'
                                                                }">
                                                                </star-rating>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <router-link :to="{ name: 'announcement-show', params:{ id: announcement.id } }">
                                                        <div class="dtls_headr">
                                                            <ul class="tag">
                                                                <li class="list-inline-item">
                                                                    <a href="#">{{ announcement.category.slug }}</a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="#">{{ announcement.is_price_contractual }}</a>
                                                                </li>
                                                            </ul>
                                                            <a class="fp_price" href="#">{{ announcement.front_end_price }}<small>/{{ announcement.price_per }}</small></a>
                                                        </div>
                                                        <!-- <p class="text-thm">Apartment</p> -->
                                                        <h4>{{ announcement.title }}</h4>
                                                        <p>
                                                            <span class="flaticon-placeholder"></span>
                                                            {{ announcement.location.country }}, {{ announcement.location.city }}
                                                        </p>
                                                        <ul class="prop_details mb0">
                                                            <li class="list-inline-item">
                                                                <a href="#">Reviews: {{ announcement.reviews.length }}</a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a href="#">Viewed: {{ announcement.viewed }}</a>
                                                            </li>
                                                            <!-- <li class="list-inline-item">
                                                                <a href="#">Sq Ft: 5280</a>
                                                            </li> -->
                                                        </ul>
                                                    </router-link>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item">
                                                            <a href="#">
                                                                <img class="avatar-radius" v-server-image:40="user.avatar" />
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="#">{{ user.full_name }}</a>
                                                        </li>
                                                    </ul>
                                                    <div class="fp_pdate float-right">{{ user.created_at }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-lg-12">
                                        <div class="feat_property list style2 hvr-bxshd bdrrn mb10">
                                            <div class="thumb">
                                                <img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
                                                <div class="thmb_cntnt">
                                                    <ul class="icon mb0">
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <div class="dtls_headr">
                                                        <ul class="tag">
                                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                                        </ul>
                                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                                    </div>
                                                    <p class="text-thm">Apartment</p>
                                                    <h4>Luxury Family Home</h4>
                                                    <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
                                                    <ul class="prop_details mb0">
                                                        <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                        <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                        <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                    </ul>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
                                                        <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                                                    </ul>
                                                    <div class="fp_pdate float-right">4 years ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="feat_property list style2 hvr-bxshd bdrrn">
                                            <div class="thumb">
                                                <img class="img-whp" src="images/property/fp2.jpg" alt="fp2.jpg">
                                                <div class="thmb_cntnt">
                                                    <ul class="icon mb0">
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
                                                        <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <div class="dtls_headr">
                                                        <ul class="tag">
                                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                                        </ul>
                                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                                    </div>
                                                    <p class="text-thm">Apartment</p>
                                                    <h4>Gorgeous Villa Bay View</h4>
                                                    <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
                                                    <ul class="prop_details mb0">
                                                        <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                        <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                        <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                    </ul>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
                                                        <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                                                    </ul>
                                                    <div class="fp_pdate float-right">4 years ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!-- Agent -->
                                <!-- <div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="agent" role="tabpanel" aria-labelledby="agent-tab">
                                    <div class="col-lg-12">
                                        <div class="feat_property list style2 agent hvr-bxshd bdrrn mb10 mt20">
                                            <div class="thumb">
                                                <img class="img-whp" src="images/team/11.jpg" alt="11.jpg">
                                                <div class="thmb_cntnt">
                                                    <ul class="tag mb0">
                                                        <li class="list-inline-item dn"></li>
                                                        <li class="list-inline-item"><a href="#">2 Listings</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <h4>Christopher Pakulla</h4>
                                                    <p class="text-thm">Agent</p>
                                                    <ul class="prop_details mb0">
                                                        <li><a href="#">Office: 134 456 3210</a></li>
                                                        <li><a href="#">Mobile: 891 456 9874</a></li>
                                                        <li><a href="#">Fax: 342 654 1258</a></li>
                                                        <li><a href="#">Email: pakulla@findhouse.com</a></li>
                                                    </ul>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                                    </ul>
                                                    <div class="fp_pdate float-right text-thm">View My Listings <i class="fa fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="feat_property list style2 agent hvr-bxshd bdrrn mb10">
                                            <div class="thumb">
                                                <img class="img-whp" src="images/team/12.jpg" alt="12.jpg">
                                                <div class="thmb_cntnt">
                                                    <ul class="tag mb0">
                                                        <li class="list-inline-item dn"></li>
                                                        <li class="list-inline-item"><a href="#">2 Listings</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <h4>Anna Harrison</h4>
                                                    <p class="text-thm">Agent</p>
                                                    <ul class="prop_details mb0">
                                                        <li><a href="#">Office: 134 456 3210</a></li>
                                                        <li><a href="#">Mobile: 891 456 9874</a></li>
                                                        <li><a href="#">Fax: 342 654 1258</a></li>
                                                        <li><a href="#">Email: annaharris@findhouse.com</a></li>
                                                    </ul>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                                    </ul>
                                                    <div class="fp_pdate float-right text-thm">View My Listings <i class="fa fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="feat_property list style2 agent hvr-bxshd bdrrn">
                                            <div class="thumb">
                                                <img class="img-whp" src="images/team/13.jpg" alt="13.jpg">
                                                <div class="thmb_cntnt">
                                                    <ul class="tag mb0">
                                                        <li class="list-inline-item dn"></li>
                                                        <li class="list-inline-item"><a href="#">2 Listings</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="details">
                                                <div class="tc_content">
                                                    <h4>Luxury Family Home</h4>
                                                    <p class="text-thm">Agent</p>
                                                    <ul class="prop_details mb0">
                                                        <li><a href="#">Office: 134 456 3210</a></li>
                                                        <li><a href="#">Mobile: 891 456 9874</a></li>
                                                        <li><a href="#">Fax: 342 654 1258</a></li>
                                                        <li><a href="#">Email: pakulla@findhouse.com</a></li>
                                                    </ul>
                                                </div>
                                                <div class="fp_footer">
                                                    <ul class="fp_meta float-left mb0">
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                                    </ul>
                                                    <div class="fp_pdate float-right text-thm">4 years ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- End Agent -->
                                <!-- Block Review -->
                                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <block-review-component 
                                        :reviews="user.reviews" 
                                        :rate="user.rate" 
                                        :type="'user'"
                                        :settings="{
                                            width: user.reviews.length ? '100%' : '233%',
                                            showFormBlock: authUser.id != user.id
                                        }"></block-review-component>
                                    <!-- <div class="product_single_content">
                                        <div class="mbp_pagination_comments">
                                            <ul class="total_reivew_view">
                                                <li class="list-inline-item sub_titles">896 Reviews</li>
                                                <li class="list-inline-item">
                                                    <ul class="star_list">
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                    </ul>
                                                </li>
                                                <li class="list-inline-item avrg_review">( 4.5 out of 5 )</li>
                                                <li class="list-inline-item write_review">Write a Review</li>
                                            </ul>
                                            <div class="mbp_first media">
                                                <img src="images/testimonial/1.png" class="mr-3" alt="1.png">
                                                <div class="media-body">
                                                    <h4 class="sub_title mt-0">Diana Cooper
                                                        <div class="sspd_review dif">
                                                            <ul>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"></li>
                                                            </ul>
                                                        </div>
                                                    </h4>
                                                    <a class="sspd_postdate fz14" href="#">December 28, 2020</a>
                                                    <p class="mt10">Beautiful home, very picturesque and close to everything in jtree! A little warm for a hot weekend, but would love to come back during the cooler seasons!</p>
                                                </div>
                                            </div>
                                            <div class="custom_hr"></div>
                                            <div class="mbp_first media">
                                                <img src="images/testimonial/2.png" class="mr-3" alt="2.png">
                                                <div class="media-body">
                                                    <h4 class="sub_title mt-0">Ali Tufan
                                                        <div class="sspd_review dif">
                                                            <ul>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                                <li class="list-inline-item"></li>
                                                            </ul>
                                                        </div>
                                                    </h4>
                                                    <a class="sspd_postdate fz14" href="#">December 28, 2020</a>
                                                    <p class="mt10">Beautiful home, very picturesque and close to everything in jtree! A little warm for a hot weekend, but would love to come back during the cooler seasons!</p>
                                                </div>
                                            </div>
                                            <div class="custom_hr"></div>
                                            <div class="mbp_comment_form style2">
                                                <h4>Write a Review</h4>
                                                <ul class="sspd_review">
                                                    <li class="list-inline-item">
                                                        <ul class="mb0">
                                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="list-inline-item review_rating_para">Your Rating & Review</li>
                                                </ul>
                                                <form class="comments_form">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp" placeholder="Review Title">
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="12" placeholder="Your Review"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-thm">Submit Review <span class="flaticon-right-arrow-1"></span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- End Block Review -->
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4 col-xl-4">
                <div class="sidebar_listing_grid1 dn-991">
                    <div class="sidebar_listing_list">
                        <div class="sidebar_advanced_search_widget">
                            <h4 class="mb25">Contact Form</h4>
                            <ul class="sasw_list mb0">
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Your Name">
                                    </div>
                                </li>
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="exampleInputName2" placeholder="Phone">
                                    </div>
                                </li>
                                <li class="search_area">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
                                    </div>
                                </li>
                                <li class="search_area">
                                    <div class="form-group">
                                        <textarea id="form_message" name="form_message" class="form-control required" rows="5" required="required" placeholder="Your Message"></textarea>
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
                    <div class="terms_condition_widget">
                        <h4 class="title">Featured Properties</h4>
                        <div class="sidebar_feature_property_slider">
                            <div class="item">
                                <div class="feat_property home7 agent">
                                    <div class="thumb">
                                        <img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                <li class="list-inline-item"><a href="#">Featured</a></li>
                                            </ul>
                                            <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            <h4 class="posr color-white">Renovated Apartment</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="feat_property home7 agent">
                                    <div class="thumb">
                                        <img class="img-whp" src="images/property/fp2.jpg" alt="fp2.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                <li class="list-inline-item"><a href="#">Featured</a></li>
                                            </ul>
                                            <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            <h4 class="posr color-white">Renovated Apartment</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="feat_property home7 agent">
                                    <div class="thumb">
                                        <img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                <li class="list-inline-item"><a href="#">Featured</a></li>
                                            </ul>
                                            <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            <h4 class="posr color-white">Renovated Apartment</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="feat_property home7 agent">
                                    <div class="thumb">
                                        <img class="img-whp" src="images/property/fp4.jpg" alt="fp4.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                <li class="list-inline-item"><a href="#">Featured</a></li>
                                            </ul>
                                            <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            <h4 class="posr color-white">Renovated Apartment</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="feat_property home7 agent">
                                    <div class="thumb">
                                        <img class="img-whp" src="images/property/fp5.jpg" alt="fp5.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                <li class="list-inline-item"><a href="#">Featured</a></li>
                                            </ul>
                                            <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            <h4 class="posr color-white">Renovated Apartment</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="terms_condition_widget">
                        <h4 class="title">Categories Property</h4>
                        <div class="widget_list">
                            <ul class="list_details">
                                <li><a href="#"><i class="fa fa-caret-right mr10"></i>Apartment <span class="float-right">6 properties</span></a></li>
                                <li><a href="#"><i class="fa fa-caret-right mr10"></i>Condo <span class="float-right">12 properties</span></a></li>
                                <li><a href="#"><i class="fa fa-caret-right mr10"></i>Family House <span class="float-right">8 properties</span></a></li>
                                <li><a href="#"><i class="fa fa-caret-right mr10"></i>Modern Villa <span class="float-right">26 properties</span></a></li>
                                <li><a href="#"><i class="fa fa-caret-right mr10"></i>Town House <span class="float-right">89 properties</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar_feature_listing">
                        <h4 class="title">Recently Viewed</h4>
                        <div class="media">
                            <img class="align-self-start mr-3" src="images/blog/fls1.jpg" alt="fls1.jpg">
                            <div class="media-body">
                                <h5 class="mt-0 post_title">Nice Room With View</h5>
                                <a href="#">$13,000/<small>/mo</small></a>
                                <ul class="mb0">
                                    <li class="list-inline-item">Beds: 4</li>
                                    <li class="list-inline-item">Baths: 2</li>
                                    <li class="list-inline-item">Sq Ft: 5280</li>
                                </ul>
                            </div>
                        </div>
                        <div class="media">
                            <img class="align-self-start mr-3" src="images/blog/fls2.jpg" alt="fls2.jpg">
                            <div class="media-body">
                                <h5 class="mt-0 post_title">Villa called Archangel</h5>
                                <a href="#">$13,000<small>/mo</small></a>
                                <ul class="mb0">
                                    <li class="list-inline-item">Beds: 4</li>
                                    <li class="list-inline-item">Baths: 2</li>
                                    <li class="list-inline-item">Sq Ft: 5280</li>
                                </ul>
                            </div>
                        </div>
                        <div class="media">
                            <img class="align-self-start mr-3" src="images/blog/fls3.jpg" alt="fls3.jpg">
                            <div class="media-body">
                                <h5 class="mt-0 post_title">Sunset Studio</h5>
                                <a href="#">$13,000<small>/mo</small></a>
                                <ul class="mb0">
                                    <li class="list-inline-item">Beds: 4</li>
                                    <li class="list-inline-item">Baths: 2</li>
                                    <li class="list-inline-item">Sq Ft: 5280</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                user: null
            }
        },
        components: {
            BlockReviewComponent: () => import('../../includes/BlockReviewsComponent.vue'),
        },
        computed: {
            ...mapGetters({
                authUser: 'auth/GET_USER_DATA',
            })
        },
        async created() {
            await this.$httpClient.get(`/api/users/${this.$route.params.user_id}`).then((response) => {
                if (response.status == 200) {
                    this.user = response.data;
                }
            }).catch((err) => {});
        },
        mounted() {
            console.log('authUser: ', this.authUser);
        },
    }
</script>

<style lang="scss" scoped>

</style>