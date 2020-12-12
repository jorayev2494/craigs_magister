<template>
    <section class="blog_post_container bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content style2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active text-thm" aria-current="page">Simple Listing – Grid View</li>
                        </ol>
                        <h2 class="breadcrumb_title">Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="row" v-if="blogs">
                        <item-list-blog-component v-for="item in blogs" :key="item.id" :data="item"></item-list-blog-component>
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mbp_pagination mt20">
                                <ul class="page_navigation">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">29</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Pagination -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebar_search_widget">
                        <div class="blog_search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Here" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><span class="flaticon-magnifying-glass"></span></button>
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

                    <div class="blog_tag_widget">
                        <h4 class="title">Tags</h4>
                        <ul class="tag_list">
                            <li class="list-inline-item"><a href="#">Apartment</a></li>
                            <li class="list-inline-item"><a href="#">Real Estate</a></li>
                            <li class="list-inline-item"><a href="#">Estate</a></li>
                            <li class="list-inline-item"><a href="#">Luxury</a></li>
                            <li class="list-inline-item"><a href="#">Real</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

    import { mapGetters } from "vuex";

    export default {
        name: 'BlogIndexComponent',
        data() {
            return {
                blogs: null
            }
        },
        // computed: {
        //     ...mapGetters({
        //         blogs: 'blog/GET_BLOGS'
        //     })
        // },
        components: {
            ItemListBlogComponent: () => import('../../includes/blogs/ItemListBlogcomponent.vue'),
        },
        async created() {
            // await this.$store.dispatch('blog/ACTION_LOAD_BLOGS');
            await this.$httpClient.get('/api/blogs').then((response) => {
                this.blogs = response.data;    
            }).catch((err) => { });
        }
    }
</script>

<style lang="css" scoped>
    .color {
        border: 1px dashed red;
    }
</style>