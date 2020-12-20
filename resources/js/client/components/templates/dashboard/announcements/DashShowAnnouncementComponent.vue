<template>
	<div>
		<show-head-announcement-component :announcement="announcement"></show-head-announcement-component>
		<!-- <show-head-announcement-component :announcement="announcement" v-if="announcementLoaded"></show-head-announcement-component> -->

		<section class="our-agent-single bgc-f7 pb30-991" v-if="announcement">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-8">
						<div class="row">

							<div class="col-lg-12">
								<div class="listing_single_description">
									<div class="lsd_list">
										<ul class="mb0">
											<li class="list-inline-item">
												<a href="#">
													Apartment
												</a>
											</li>
											<li class="list-inline-item">
												<a href="#">
													Beds: 4
												</a>
											</li>
											<li class="list-inline-item">
												<a href="#">
													Baths: 2
												</a>
											</li>
											<li class="list-inline-item">
												<a href="#">
													Sq Ft: 5280
												</a>
											</li>
										</ul>
									</div>
									<!-- <h4 class="mb30">Description</h4>
									<p class="mb25">Evans Tower very high demand corner junior one bedroom plus a large balcony boasting full open NYC views. You need to see the views to believe them. Mint condition with new hardwood floors. Lots of closets plus washer and dryer.</p>
									<p class="gpara second_para white_goverlay mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
									<div class="collapse" id="collapseExample">
										<div class="card card-body">
											<p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
											<p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
										</div>
									</div> -->

									<h4 class="mb30">Description</h4>
									<p class="mb25">{{ announcement.description }}</p>
									<!-- <p class="gpara second_para white_goverlay mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
									<div class="collapse" id="collapseExample">
										<div class="card card-body">
											<p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
											<p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
										</div>
									</div> -->
									<p class="overlay_close" v-if="announcement.description.length > 250">
										<a class="text-thm fz14" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
											Show More 
											<span class="flaticon-download-1 fz12"></span>
										</a>
									</p>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="additional_details">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="mb15">Property Details</h4>
										</div>
										<div class="col-md-6 col-lg-6 col-xl-4">
											<ul class="list-inline-item">
												<li>
													<p>Property ID :</p>
												</li>
												<li>
													<p>Price :</p>
												</li>
												<li>
													<p>Property Size :</p>
												</li>
												<li>
													<p>Year Built :</p>
												</li>
											</ul>
											<ul class="list-inline-item">
												<li>
													<p><span>HZ27</span></p>
												</li>
												<li>
													<p><span>$130,000</span></p>
												</li>
												<li>
													<p><span>1560 Sq Ft</span></p>
												</li>
												<li>
													<p><span>2016-01-09</span></p>
												</li>
											</ul>
										</div>

										<div class="col-md-6 col-lg-6 col-xl-4">
											<ul class="list-inline-item">
												<li>
													<p>Bedrooms :</p>
												</li>
												<li>
													<p>Bathrooms :</p>
												</li>
												<li>
													<p>Garage :</p>
												</li>
												<li>
													<p>Garage Size :</p>
												</li>
											</ul>
											<ul class="list-inline-item">
												<li>
													<p>
														<span>8</span>
													</p>
												</li>
												<li>
													<p>
														<span>4</span>
													</p>
												</li>
												<li>
													<p>
														<span>2</span>
													</p>
												</li>
												<li>
													<p>
														<span>200 SqFt</span>
													</p>
												</li>
											</ul>
										</div>

										<div class="col-md-6 col-lg-6 col-xl-4">
											<ul class="list-inline-item">
												<li>
													<p>Property Type :</p>
												</li>
												<li>
													<p>Property Status :</p>
												</li>
											</ul>
											<ul class="list-inline-item">
												<li>
													<p>
														<span>Apartment</span>
													</p>
												</li>
												<li>
													<p>
														<span>For Sale</span>
													</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<!-- <div class="col-lg-12">
								<div class="additional_details">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="mb15">Additional details</h4>
										</div>
										<div class="col-md-6 col-lg-6">
											<ul class="list-inline-item">
												<li><p>Deposit :</p></li>
												<li><p>Pool Size :</p></li>
												<li><p>Additional Rooms :</p></li>
											</ul>
											<ul class="list-inline-item">
												<li><p><span>20%</span></p></li>
												<li><p><span>300 Sqft</span></p></li>
												<li><p><span>Guest Bath</span></p></li>
											</ul>
										</div>
										<div class="col-md-6 col-lg-6">
											<ul class="list-inline-item">
												<li><p>Last remodel year :</p></li>
												<li><p>Amenities :</p></li>
												<li><p>Equipment :</p></li>
											</ul>
											<ul class="list-inline-item">
												<li><p><span>1987</span></p></li>
												<li><p><span>Clubhouse</span></p></li>
												<li><p><span>Grill - Gas</span></p></li>
											</ul>
										</div>
									</div>
								</div>
							</div> -->
							
							<!-- <div class="col-lg-12">
								<div class="application_statics mt30">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="mb10">Features</h4>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-4">
											<ul class="order_list list-inline-item">
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Air Conditioning
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Barbeque
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Dryer
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Gym
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Laundry
													</a>
												</li>
											</ul>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-4">
											<ul class="order_list list-inline-item">
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Lawn
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Microwave
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Outdoor Shower
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Refrigerator
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Sauna
													</a>
												</li>
											</ul>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-4">
											<ul class="order_list list-inline-item">
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Swimming Pool
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														TV Cable
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Washer
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														WiFi
													</a>
												</li>
												<li>
													<a href="#">
														<span class="flaticon-tick"></span>
														Window Coverings
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div> -->
							
							<div class="col-lg-12">
								<div class="application_statics shop_single_tab_content style3 mt30">
									<ul class="nav nav-tabs float-right fn-414" id="myTab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="hourly-tab" data-toggle="tab" href="#hourly" role="tab" aria-controls="hourly" aria-selected="true">Hours</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="weekly-tab" data-toggle="tab" href="#weekly" role="tab" aria-controls="weekly" aria-selected="false">Weekly</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="monthly" aria-selected="false">Monthly</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent2">
										<div class="tab-pane fade show active" id="hourly" role="tabpanel" aria-labelledby="hourly-tab">
											<h4 class="mt10-414">Property Views</h4>
											<canvas id="myChartweave" width="100%" height="50"></canvas>
										</div>
										<div class="tab-pane fade" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
											<h4 class="mt10-414">Property Views</h4>
											<div class="c_container w100"></div>
										</div>
										<div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
											<h4 class="mt10-414">Property Views</h4>
											<canvas class="ls_barchart" id="chart"></canvas>
										</div>
									</div>
								</div>
							</div>

							<block-reviews-component :reviews="reviews" :rate="announcement.rate" :type="'announcement'"></block-reviews-component>

							<!-- <div class="col-lg-12">
								<div class="product_single_content">
									<div class="mbp_pagination_comments mt30">
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
														<ul class="ml10">
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
														<ul class="ml10">
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
									</div>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="product_single_content">
									<div class="mbp_pagination_comments mt30">
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
								</div>
							</div> -->

							<!-- <div class="col-lg-12">
								<h4 class="mt30 mb30">Similar Properties</h4>
							</div>

							<div class="col-lg-6">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><a href="#">For Rent</a></li>
												<li class="list-inline-item"><a href="#">Featured</a></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
											</ul>
											<a class="fp_price" href="#">$13,000<small>/mo</small></a>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartment</p>
											<h4>Renovated Apartment</h4>
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

							<div class="col-lg-6">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="images/property/fp2.jpg" alt="fp2.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><a href="#">For Rent</a></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
											</ul>
											<a class="fp_price" href="#">$13,000<small>/mo</small></a>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartment</p>
											<h4>Renovated Apartment</h4>
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

							<div class="col-lg-6">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><a href="#">For Sale</a></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
											</ul>
											<a class="fp_price" href="#">$13,000<small>/mo</small></a>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartment</p>
											<h4>Renovated Apartment</h4>
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

							<div class="col-lg-6">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><a href="#">For Rent</a></li>
												<li class="list-inline-item"><a href="#">Featured</a></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
												<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
											</ul>
											<a class="fp_price" href="#">$13,000<small>/mo</small></a>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartment</p>
											<h4>Renovated Apartment</h4>
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
					</div>

					<!-- <div class="col-lg-4 col-xl-4">
						<div class="sidebar_listing_list">
							<div class="sidebar_advanced_search_widget">
								<div class="sl_creator">
									<h4 class="mb25">Listed By</h4>
									<div class="media">
										<img class="mr-3" src="images/team/lc1.png" alt="lc1.png">
										<div class="media-body">
											<h5 class="mt-0 mb0">Samul Williams</h5>
											<p class="mb0">(123)456-7890</p>
											<p class="mb0">info@findhouse.com</p>
											<a class="text-thm" href="#">View My Listing</a>
										</div>
									</div>
								</div>
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
											<textarea id="form_message" name="form_message" class="form-control required" rows="5" required="required" placeholder="I'm interest in [ Listing Single ]"></textarea>
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

						<div class="sidebar_listing_list">
							<div class="sidebar_advanced_search_widget">
								<ul class="sasw_list mb0">
									<li class="search_area">
										<div class="form-group">
											<input type="text" class="form-control" id="exampleInputName1" placeholder="keyword">
											<label for="exampleInputEmail"><span class="flaticon-magnifying-glass"></span></label>
										</div>
									</li>
									<li class="search_area">
										<div class="form-group">
											<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
											<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
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
											<div id="prncgs2" class="btn dd_btn">
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
									<li class="min_area list-inline-item">
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
					</div> -->
				</div>
			</div>
		</section>
	</div>
</template>

<script>
    export default {
		data() {
			return {
				announcement: null,
				reviews: null
			}
		},
        components: {
			ShowHeadAnnouncementComponent: () => import('../../../includes/announcements/ShowHeadAnnoucementComponent.vue'),
			// ShowHeadAnnouncementComponent: () => import('../../../includes/dashboard/announcements/ShowHeadAnnoucementComponent.vue'),
			BlockReviewsComponent: () => import('../../../includes/BlockReviewsComponent.vue')
		},
		computed: {
			announcementLoaded() {
				return  this.announcement != null;
				 
			}
		},
		created() {
			this.$httpClient.get(`/api/my/announcements/${this.$route.params.id}`).then((response) => {
				this.announcement = response.data;
				this.reviews = response.data.reviews
			}).catch((err) => { });
		},
    }
</script>

<style lang="scss" scoped>

</style>