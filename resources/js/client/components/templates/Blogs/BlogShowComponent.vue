<template>
    <section class="blog_post_container bgc-f7 pb30" v-if="blog">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="breadcrumb_content style2">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item">
                                <router-link :to="{ name: 'index' }">Houme</router-link>
                            </li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Blog</li>
						</ol>
						<h2 class="breadcrumb_title">Blog</h2>
					</div>
				</div>
			</div>

			<div class="row">

				<div class="col-lg-8">
					<div class="main_blog_post_content">
						<div class="mbp_thumb_post">
							<div class="blog_sp_tag">
                                <a href="#">{{ blog.category.slug }}</a>
                            </div>
							<h3 class="blog_sp_title">{{ blog.title }}</h3>
							<ul class="blog_sp_post_meta">
								<li class="list-inline-item">
									<router-link :to="{ name: 'user-profile', params: { user_id: blog.user.id } }">
										<img class="avatar-radius" v-server-image:40="blog.user ? blog.user.avatar : blog.admin.avatar">
									</router-link>
								</li>
								<li class="list-inline-item">
                                    <router-link :to="{ name: 'user-profile', params: { user_id: blog.user.id } }">
										{{ blog.user ? blog.user.full_name : blog.admin.first_name }}
									</router-link>
                                </li>
								<li class="list-inline-item">
                                    <span class="flaticon-calendar"></span>
                                </li>
								<li class="list-inline-item">
                                    <a href="#">{{ blog.created_at }}</a>
                                </li>
								<!-- <li class="list-inline-item">
                                    <span class="flaticon-view"></span>
                                </li>
								<li class="list-inline-item">
                                    <a href="#"> 341 views</a>
                                </li> -->
								<!-- <li class="list-inline-item">
                                    <span class="flaticon-chat"></span>
                                </li>
								<li class="list-inline-item">
                                    <a href="#">15</a>
                                </li> -->
							</ul>
							<div class="thumb">
								<!-- <img class="img-fluid" v-server-image-size:size="'url'" :src="blog.user ? blog.user.avatar : blog.admin.avatar" :alt="blog.user ? blog.user.avatar : blog.admin.avatar"> -->
								<img v-server-image:689="blog.media_content.path">
							</div>
							<div class="details" v-html="blog.description">
								<!-- <p class="mb30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec. Quisque bibendum orci ac nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Ut et adipiscing erat. Curabitur this is a text link libero tempus congue.</p>
								<p class="mb30">Duis mattis laoreet neque, et ornare neque sollicitudin at. Proin sagittis dolor sed mi elementum pretium. Donec et justo ante. Vivamus egestas sodales est, eu rhoncus urna semper eu. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer tristique elit lobortis purus bibendum, quis dictum metus mattis. Phasellus posuere felis sed eros porttitor mattis. Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et.</p>
								<h4 class="mb15">Housing Markets That Changed the Most This Decade</h4>
								<p>Nullam tempus sollicitudin cursus. Nulla elit mauris, volutpat eu varius malesuada, pulvinar eu ligula. Ut et adipiscing erat. Curabitur adipiscing erat vel libero tempus congue. Nam pharetra interdum vestibulum. Aenean gravida mi non aliquet porttitor. Praesent dapibus, nisi a faucibus tincidunt, quam dolor condimentum metus, in convallis libero ligula ut eros.</p>
								<div class="mbp_blockquote">
									<div class="blockquote">
										<span class="font-italic"><i class="fa fa-quote-left"></i></span><br>
										<em class="mb-0">Duis mollis et sem sed sollicitudin. Donec non odio neque. Aliquam hendrerit sollicitudin purus, quis rutrum mi accumsan nec.</em>
									</div>
								</div>
								<p class="mb25">Curabitur massa magna, tempor in blandit id, porta in ligula. Aliquam laoreet nisl massa, at interdum mauris sollicitudin et. Mauris risus lectus, tristique at nisl at, pharetra tristique enim.</p>
								<p class="mb25">Nullam this is a link nibh facilisis, at malesuada orci congue. Nullam tempus sollicitudin cursus. Nulla elit mauris, volutpat eu varius malesuada, pulvinar eu ligula. Ut et adipiscing erat. Curabitur adipiscing erat vel libero tempus congue. Nam pharetra interdum vestibulum. Aenean gravida mi non aliquet porttitor. Praesent dapibus, nisi a faucibus tincidunt, quam dolor condimentum metus, in convallis libero ligula ut eros.</p> -->
							</div>
							<!-- <ul class="blog_post_share">
								<li><p>Share</p></li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul> -->
						</div>
						<!-- <div class="mbp_pagination_tab">
							<div class="row">
								<div class="col-sm-6 col-lg-6">
									<div class="pag_prev">
										<a href="#"><span class="flaticon-back"></span></a>
										<div class="detls"><h5>Previous Post</h5> <p> Housing Markets That</p></div>
									</div>
								</div>
								<div class="col-sm-6 col-lg-6">
									<div class="pag_next text-right">
										<a href="#"><span class="flaticon-next"></span></a>
										<div class="detls"><h5>Next Post</h5> <p> Most This Decade</p></div>
									</div>
								</div>
							</div>
						</div>
						<div class="product_single_content mb30">
							<div class="mbp_pagination_comments">
								<div class="total_review">
									<h4>896 Reviews</h4>
									<ul class="review_star_list mb0 pl10">
										<li class="list-inline-item"><i class="fa fa-star"></i></li>
										<li class="list-inline-item"><i class="fa fa-star"></i></li>
										<li class="list-inline-item"><i class="fa fa-star"></i></li>
										<li class="list-inline-item"><i class="fa fa-star"></i></li>
										<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
									</ul>
									<a class="tr_outoff pl10" href="#">( 4.5 out of 5 )</a>
									<a class="write_review float-right fn-xsd" href="#">Write a Review</a>
								</div>
								<div class="mbp_first media">
									<img class="mr-3 avatar-radius" v-server-image:80="blog.user ? blog.user.avatar : blog.admin.avatar">
									<div class="media-body">
								    	<h4 class="sub_title mt-0">Diana Cooper
											<span class="sspd_review">
												<ul class="mb0 pl15">
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"></li>
												</ul>
											</span>
								    	</h4>
								    	<a class="sspd_postdate fz14" href="#">December 28, 2020</a>
								    	<p class="fz14 mt10">Beautiful home, very picturesque and close to everything in jtree! A little warm for a hot weekend, but would love to come back during the cooler seasons!</p>
									</div>
								</div>
								<div class="custom_hr"></div>
								<div class="mbp_first media">
									<img src="images/testimonial/2.png" class="mr-3" alt="2.png">
									<div class="media-body">
								    	<h4 class="sub_title mt-0">Ali Tufan
											<span class="sspd_review">
												<ul class="mb0 pl15">
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
													<li class="list-inline-item"></li>
												</ul>
											</span>
								    	</h4>
								    	<a class="sspd_postdate fz14" href="#">December 28, 2020</a>
								    	<p class="fz14 mt10">Beautiful home, very picturesque and close to everything in jtree! A little warm for a hot weekend, but would love to come back during the cooler seasons!</p>
									</div>
								</div>
							</div>
						</div>
						<div class="bsp_reveiw_wrt">
							<h4>Write a Review</h4>
							<ul class="review_star">
								<li class="list-inline-item">
									<span class="sspd_review">
										<ul>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
										</ul>
									</span>
								</li>
								<li class="list-inline-item pr15"><p>Your Rating & Review</p></li>
							</ul>
							<form class="comments_form">
								<div class="form-group">
							    	<input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp" placeholder="Review Title">
								</div>
								<div class="form-group">
								    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Your Review"></textarea>
								</div>
								<button type="submit" class="btn btn-thm">Submit Review</button>
							</form>
						</div> -->
					</div>
					<!-- <div class="row">
						<div class="col-lg-12 mb20">
							<h4>Related Posts</h4>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="for_blog feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/1.jpg" alt="1.jpg">
									<div class="tag">Construction</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<h4>Redfin Ranks the Most Competitive Neighborhoods of 2020</h4>
										<ul class="bpg_meta">
											<li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
											<li class="list-inline-item"><a href="#">January 16, 2020</a></li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur text link libero tempus congue.</p>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<div class="for_blog feat_property">
								<div class="thumb">
									<img class="img-whp" src="images/blog/2.jpg" alt="2.jpg">
									<div class="tag">Construction</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<h4>Housing Markets That Changed the Most This Decade</h4>
										<ul class="bpg_meta">
											<li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
											<li class="list-inline-item"><a href="#">January 16, 2020</a></li>
										</ul>
										<p>Lorem ipsum dolor sit amet, consectetur text link libero tempus congue.</p>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
										</ul>
										<a class="fp_pdate float-right text-thm" href="#">Read More <span class="flaticon-next"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div> -->
				</div>

				<div class="col-lg-4">
					<!-- <div class="sidebar_search_widget">
						<div class="blog_search_widget">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username" aria-describedby="button-addon2">
								<div class="input-group-append">
							    	<button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
								</div>
							</div>
						</div>
					</div> -->
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
						<h4 class="title">Featured Listings</h4>
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
					<!-- <div class="blog_tag_widget">
						<h4 class="title">Tags</h4>
						<ul class="tag_list">
							<li class="list-inline-item">
								<a href="#">Apartment</a>
							</li>
							<li class="list-inline-item">
								<a href="#">Real Estate</a>
							</li>
							<li class="list-inline-item">
								<a href="#">Estate</a>
							</li>
							<li class="list-inline-item">
								<a href="#">Luxury</a>
							</li>
							<li class="list-inline-item">
								<a href="#">Real</a>
							</li>
						</ul>
					</div> -->
				</div>
			</div>

		</div>
	</section>
</template>

<script>
    import { mapGetters } from 'vuex';

    export default {
        data() {
            return {
                blog: null,
            }
        },
        async created() {
            await this.$httpClient.get(`/api/blogs/${this.$route.params['id']}`).then((response) => {
				this.blog = response.data;
			}).catch((err) => { });
		}
    }
</script>

<style lang="scss" scoped>

</style>