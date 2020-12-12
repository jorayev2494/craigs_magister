<template>
    <section class="dashbord bgc-f7 pb50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
                <div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
                    <div class="row">
                        <div class="col-lg-4 col-xl-4 mb10">
                            <div class="breadcrumb_content style2 mb30-991">
                                <h2 class="breadcrumb_title">My Favorites</h2>
                                <p>We are glad to see you again!</p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-8">
                            <div class="candidate_revew_select style2 text-right mb30-991">
                                <ul class="mb0">
                                    <li class="list-inline-item">
                                        <div class="candidate_revew_search_box course fn-520">
                                            <form class="form-inline my-2">
                                                <input class="form-control mr-sm-2" type="search" placeholder="Search Courses" aria-label="Search">
                                                <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                                            </form>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <select class="selectpicker show-tick">
                                            <option>Featured First</option>
                                            <option>Recent</option>
                                            <option>Old Review</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-12" v-if="announcements">
                            <div class="my_dashboard_review mb40">
                                <div class="favorite_item_list">
                                    <!-- <div class="feat_property list favorite_page">
                                        <div class="thumb">
                                            <img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item dn"></li>
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <h4>Renovated Apartment</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
                                                <a class="fp_price text-thm" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <ul class="view_edit_delete_list mb0 mt35">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
                                        </ul>
                                    </div> -->
                                    <!-- <div class="feat_property list favorite_page mt30">
                                        <div class="thumb">
                                            <img class="img-whp" src="images/property/fp2.jpg" alt="fp2.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item dn"></li>
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
                                                <a class="fp_price text-thm" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <ul class="view_edit_delete_list mb0 mt35">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
                                        </ul>
                                    </div> -->
                                    <!-- <div class="feat_property list favorite_page mt30">
                                        <div class="thumb">
                                            <img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item dn"></li>
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <h4>Gorgeous Villa Bay View</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
                                                <a class="fp_price text-thm" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <ul class="view_edit_delete_list mb0 mt35">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
                                        </ul>
                                    </div> -->
                                    <!-- <div class="feat_property list favorite_page mt30">
                                        <div class="thumb">
                                            <img class="img-whp" src="images/property/fp4.jpg" alt="fp4.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item dn"></li>
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <h4>Ample Penthouse</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
                                                <a class="fp_price text-thm" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <ul class="view_edit_delete_list mb0 mt35">
                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
                                        </ul>
                                    </div> -->
                                    
                                    <announcement-component 
                                        v-for="(announcement, key, index) in announcements.data" :key="index" 
                                        :announcement="announcement" 
                                        :is-first="key != 0"
                                        :reload-paginate-func="loadAnnouncements"
                                        :current_page="current_page">
                                    </announcement-component>

                                    <advanced-laravel-vue-paginate v-show="announcements.last_page > 1" :data="announcements" @paginateTo="loadAnnouncements"/>

                                    <!-- <div class="mbp_pagination">
                                        <ul class="page_navigation">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                                    <span class="flaticon-left-arrow"></span>
                                                    Prev
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">
                                                    2 <span class="sr-only">(current)</span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">...</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">29</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <span class="flaticon-right-arrow"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> -->

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt10">
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
    // // or, import as a single Vue component
    // import AdvancedLaravelVuePaginate from 'advanced-laravel-vue-paginate';
    // import 'advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css'

    export default {
        data() {
            return {
                announcements: null,
                current_page: 1,
            }
        },
        methods: {
            loadAnnouncements(page = 1) {
                this.current_page = page;
                this.$httpClient.get('/api/my/announcements?per_page=3&current_page=' + page).then(response => {
                    this.announcements = response.data;
                });
            }
        },
        components: {
            AnnouncementComponent: () => import('../../../includes/dashboard/announcements/AnnouncementComponent.vue'),            
        },
        created() {
            this.loadAnnouncements(1);
        },
    }
</script>

<style lang="scss" scoped>

</style>