<template>
    <section class="dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-8 col-xl-9 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">My Recorded Reviews</h2>
								<p>We are glad to see you again!</p>
							</div>
						</div>
						<!-- <div class="col-lg-4 col-xl-3 mb10">
							<ul class="sasw_list mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Search">
								    	<label for="exampleInputEmail"><span class="flaticon-magnifying-glass"></span></label>
								    </div>
								</li>
							</ul>
						</div> -->
					</div>
					<div class="row">

						<div class="col-lg-12">
							<div id="myreview" class="my_dashboard_review">
								<div class="review_content">
									<h4>Reviews</h4>

									<div v-for="(myRecordedReview, key) in myRecordedReviews.data" :key="key">
										<!-- Reviews only for Users -->
										<div class="media pb30 mt30 bb1"  v-if="myRecordedReview.user">
											<img class="mr-3 avatar-radius" v-server-image:120="myRecordedReview.user.avatar" />
											<div class="media-body">
												<h5 class="review_title mt-0">
													Your review on 
													<span class="text-thm">{{ myRecordedReview.user.full_name }}</span>
													<span class="sspd_review float-right">
														<ul>
															<star-rating :rating="myRecordedReview.rating" :is-indicator-active="true" :star-style="{
																	starWidth: 18,
																	starHeight: 18,
																	fullStarColor: '#bcc52a',
																	emptyStarColor: '#e1e1e1'
																}">
															</star-rating>
														</ul>
													</span>
												</h5>
												<a class="review_date" href="#">{{ myRecordedReview.created_at }}</a>
												<div class="text-thm">User</div>
												<p class="para">{{ myRecordedReview.description }}</p>
												<ul class="view_edit_delete_list mb0 mt35">
													<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit">
														<router-link :to="{ name: 'user-profile', params: { user_id: myRecordedReview.user.id} }">
															<span class="flaticon-reply"></span>
														</router-link>
													</li>
													<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete">
														<a href="#">
															<span class="flaticon-garbage"></span>
														</a>
													</li>
												</ul>
											</div>
										</div>
										<!-- End Reviews only for Users -->

										<!-- Reviews only for Announcements -->
										<div class="media pb30 mt30 bb1" v-else>
											<img class="mr-3" v-server-image:120="myRecordedReview.announcement.images[0]" />
											<div class="media-body">
												<h5 class="review_title mt-0">
													Your review on 
													<span class="text-thm">{{ myRecordedReview.announcement.title }}</span>
													<span class="sspd_review float-right">
														<ul>
															<star-rating :rating="myRecordedReview.rating" :is-indicator-active="true" :star-style="{
																	starWidth: 18,
																	starHeight: 18,
																	fullStarColor: '#bcc52a',
																	emptyStarColor: '#e1e1e1'
																}">
															</star-rating>
														</ul>
													</span>
												</h5>
												<a class="review_date" href="#">{{ myRecordedReview.created_at }}</a>
												<div class="text-thm">Announcement</div>
												<p class="para">{{ myRecordedReview.description }}</p>
												<ul class="view_edit_delete_list mb0 mt35">
													<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit">
														<router-link :to="{ name: 'announcement-show', params: { id: myRecordedReview.announcement.id } }">
															<span class="flaticon-reply"></span>
														</router-link>
													</li>
													<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete">
														<a href="#">
															<span class="flaticon-garbage"></span>
														</a>
													</li>
												</ul>
											</div>
										</div>
										<!-- End Reviews only for Announcements -->										

									</div>

								</div>

								<advanced-laravel-vue-paginate class="mt-4" v-if="myRecordedReviews.last_page > 1" :data="myRecordedReviews" @paginateTo="loadReviews"/>

							</div>
						</div>
						
					</div>
					<div class="row mt50">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2020 Find House. Made with love.</p>
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
        data() {
            return {
                myRecordedReviews: null,
            }
        },
        methods: {
            loadReviews(page = 1) {
                this.current_page = page;
                this.$httpClient.get('/api/reviews?type=my-recorded-review&per_page=3&current_page=' + page).then(response => {
                    this.myRecordedReviews = response.data;
                });
            }
        },
        created() {
            this.loadReviews();
        },
    }
</script>

<style lang="scss" scoped>

</style>