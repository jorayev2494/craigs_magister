<template>
    <div>
        <div class="col-lg-12 mb-4">
            <div class="product_single_content" ref="block_width" :style="{ width: this.settings.width }">
                <div class="mbp_pagination_comments mt30">
                    <ul class="total_reivew_view">
                        <li class="list-inline-item sub_titles">{{ reviewsCountComp }} Reviews</li>
                        <div class="row">
                            <div class="col-lg-2" style="margin: auto;">
                                <star-rating :rating="rate" :is-indicator-active="false" :star-style="{
                                        starWidth: 18,
                                        starHeight: 18,
                                        fullStarColor: '#bcc52a',
                                        emptyStarColor: '#e1e1e1'
                                    }">
                                </star-rating>
                            </div>
                            <div class="col-lg-6">
                                <li class="list-inline-item avrg_review">( {{ rate }} out of 5 )</li>
                            </div>
                            <!-- <div class="col-lg-4"> -->
                                <label class="col-lg-4" for="exampleFormControlTextarea1">
                                    <a href="#description">
                                        <li class="list-inline-item write_review">Write a Review</li>
                                    </a>
                                </label>
                            <!-- </div> -->
                        </div>
                    </ul>

                    <div v-for="(review, key) in reviewsComp" :key="review.id">
                        <div class="custom_hr" v-if="key > 0"></div>

                        <div class="mbp_first media" :id="'coment-creator-' + review.creator.id">
                            <img class="mr-3 avatar-radius" v-server-image:80="review.creator.avatar">
                            <div class="media-body">
                                <h4 class="sub_title mt-0">
                                    <router-link :to="{ name: 'user-profile', params:{ user_id: review.creator.id } }">
                                        {{ review.creator.full_name }}
                                    </router-link>
                                    <div class="sspd_review dif">
                                        <star-rating class="ml10" :rating="review.rating" :is-indicator-active="false" :star-style="{
                                                starWidth: 14,
                                                starHeight: 14,
                                                fullStarColor: '#bcc52a',
                                                emptyStarColor: '#e1e1e1'
                                            }">
                                        </star-rating>
                                    </div>
                                </h4>
                                <a class="sspd_postdate fz14" href="#">{{ review.created_at }}</a>
                                <p class="mt10">
                                    {{ review.description }}
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4" v-if="settings.showFormBlock">
            <div class="product_single_content" :style="{ width: this.settings.width }">
                <div class="mbp_pagination_comments mt30">
                    <div class="mbp_comment_form style2">
                        <h4>Write a Review</h4>
                        <ul class="sspd_review">
                            <li class="list-inline-item">
                                <star-rating :rating="review.rating" :is-indicator-active="false" :star-style="{
                                        starWidth: 18,
                                        starHeight: 18,
                                        fullStarColor: '#bcc52a',
                                        emptyStarColor: '#e1e1e1'
                                    }">
                                </star-rating>
                            </li>
                            <li class="list-inline-item review_rating_para">Your Rating & Review</li>
                        </ul>
                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                            <label for="rating">Rating</label>
                            <select name="price_per" id="rating" class="selectpicker" v-model="review.rating" data-width="100%">
                                <option :value="1" :data-tokens="1">1</option>
                                <option :value="2" :data-tokens="2">2</option>
                                <option :value="3" :data-tokens="3">3</option>
                                <option :value="4" :data-tokens="4">4</option>
                                <option :value="5" :data-tokens="5">5</option>
                            </select>
                        </div>
                        <form class="comments_form" @submit.prevent="sendReview($event)" method="POST">
                            <div class="form-group">
                                <!-- <label for="description">Your Review</label> -->
                                <textarea class="form-control" id="description" rows="12" v-model="review.description" placeholder="Your Review"></textarea>
                            </div>
                            <button type="submit" class="btn btn-thm">
                                Submit Review
                                <span class="flaticon-right-arrow-1"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            reviews: {
                type: Array,
                default: null
            },
            rate: {
                type: Number,
                required: true
            },
            type: {
                type: String,
                required: true
            },
            settings: {
                type: Object,
                default: {
                    width: '132%',
                    showFormBlock: false
                }
            },
        },
        data() {
            return {
                review: {
                    rating: 2.5,
                    description: null,
                    reviewsCount: 0,
                }
            }
        },
        methods: {
            sendReview(event) {
                this.$httpClient.post(`/api/review/${this.$route.params.id}?type=${this.type}`, { ...this.review }).then((response) => {
                    if (response.status == 200) {
                        // this.reviewsComp = response.data;
                        // this.reviews = { ...response.data };
                        this.review.reviewsCount = 0;
                        this.review.description = '';
                        this.$forceUpdate();
                    }
                }).catch((err) => { });
            }
        },
        computed: {
            reviewsComp: {
                get: function() {
                    return this.reviews;
                },
                set: function(value) {
                    console.log('reviewsComp: value: ', value);
                    // this.reviews.push(value);
                    this.$set(this.reviews, ++Object.keys(this.reviews).length, value);
                }
            },
            reviewsCountComp: {
                get: function() {
                    return this.reviewsCount;
                },
                set: function(value) {
                    this.reviewsCount = value;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
</style>