<template>
	<section class="dashbord bgc-f7 pb50">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
			<div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
				<div class="row">
					<div class="col-lg-8 col-xl-9 mb10">
						<div class="breadcrumb_content style2">
							<h2 class="breadcrumb_title">My Reviews</h2>
							<!-- <p>We are glad to see you again!</p> -->
						</div>
					</div>
					<!-- <div class="col-lg-4 col-xl-3 mb10">
						<ul class="sasw_list mb0">
							<li class="search_area">
								<div class="form-group">
									<input type="text" class="form-control" id="exampleInputName1" placeholder="Search">
									<label for="exampleInputEmail">
										<span class="flaticon-magnifying-glass"></span>
									</label>
								</div>
							</li>
						</ul>
					</div> -->
				</div>
				<div class="row">
					
					<div class="col-lg-12">
						<div id="client_myreview" class="my_dashboard_review mt30" v-if="myReviews">
							<div class="review_content">
								<h4>Visitor Reviews</h4>

								<div class="media pb30 mt30 bb1 mb-4" v-for="(review, key) in myReviews.data" :key="key">
									<img class="mr-3 avatar-radius" v-server-image:120="review.creator.avatar">
									<div class="media-body">
										<h5 class="review_title mt-0">
											{{ review.creator.full_name }}
											<span class="sspd_review float-right">
												<ul>
													<star-rating :rating="review.rating" :is-indicator-active="true" :star-style="{
															starWidth: 18,
															starHeight: 18,
															fullStarColor: '#bcc52a',
															emptyStarColor: '#e1e1e1'
														}">
													</star-rating>
												</ul>
											</span>
										</h5>
										<a class="review_date" href="#">{{ review.created_at }}</a>
										<p class="para">{{ review.description }}</p>
										<ul class="view_edit_delete_list mb0 mt35">
											<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Reply">
												<!-- <a href="#"> -->
													<router-link :to="{ name: 'user-profile', params:{ user_id: review.creator.id } }">
														<span class="flaticon-reply"></span>
													</router-link>
												<!-- </a> -->
											</li>
										</ul>
									</div>
								</div>

								<advanced-laravel-vue-paginate v-if="myReviews.last_page > 1" :data="myReviews" @paginateTo="loadReviews"/>

							</div>
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
                myReviews: null,
            }
        },
        methods: {
            loadReviews(page = 1) {
                this.current_page = page;
                this.$httpClient.get('/api/reviews?type=my&per_page=6&current_page=' + page).then(response => {
                    this.myReviews = response.data;
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