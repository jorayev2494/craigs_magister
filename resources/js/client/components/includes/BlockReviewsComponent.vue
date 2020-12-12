<template>
    <div>
        <div class="col-lg-12">
            <div class="product_single_content" style="width: 132%;">
                <div class="mbp_pagination_comments mt30">
                    <ul class="total_reivew_view">
                        <li class="list-inline-item sub_titles">{{ reviewsCountComp }} Reviews</li>
                        <li class="list-inline-item">
                            <ul class="star_list">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-star"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="list-inline-item avrg_review">( {{ rate }} out of 5 )</li>
                        <label for="exampleFormControlTextarea1">
                            <a href="#exampleFormControlTextarea1">
                                <li class="list-inline-item write_review">Write a Review</li>
                            </a>
                        </label>
                    </ul>

                    <div v-for="(review, key) in reviewsComp" :key="review.id">
                        <div class="custom_hr" v-if="key > 0"></div>

                        <div class="mbp_first media">
                            <img class="mr-3 avatar-radius" v-server-image:80="review.creator.avatar">
                            <div class="media-body">
                                <h4 class="sub_title mt-0">
                                    {{ review.creator.full_name }}
                                    <div class="sspd_review dif">
                                        <ul class="ml10">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    <i class="fa fa-star"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item"></li>
                                        </ul>
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

        <div class="col-lg-12" style="width: 132%;">
            <div class="product_single_content"  style="width: 132%;">
                <div class="mbp_pagination_comments mt30">
                    <div class="mbp_comment_form style2">
                        <h4>Write a Review</h4>
                        <ul class="sspd_review">
                            <li class="list-inline-item">
                                <ul class="mb0">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-inline-item review_rating_para">Your Rating & Review</li>
                        </ul>
                        <div class="my_profile_setting_input ui_kit_select_search form-group">
                            <label for="formGroupExampleArea">Rating</label>
                            <select name="price_per" class="selectpicker" data-live-search="true" v-model="review.rating" data-width="100%">
                                <option v-for="rate in 5" :key="rate" :value="rate" :data-tokens="rate">{{ rate }}</option>
                            </select>
                        </div>
                        <form class="comments_form" @submit.prevent="sendReview($event)" method="POST">
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="12" v-model="review.description" placeholder="Your Review"></textarea>
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
            }
        },
        data() {
            return {
                review: {
                    rating: 0,
                    description: null,
                    // reviews: [],
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