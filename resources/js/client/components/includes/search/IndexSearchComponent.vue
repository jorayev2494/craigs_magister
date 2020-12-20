<template>
    <div class="home_adv_srch_opt home6">
        <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="home1-advnc-search home6">
                    <ul class="h1ads_1st_list mb0">

                        <li class="list-inline-item">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter keyword...">
                            </div>
                        </li>

                        <li class="list-inline-item">
                            <div class="search_option_two">
                                <div class="candidate_revew_select">
                                    <select class="selectpicker w100 show-tick">
                                        <option v-for="category in categories" :key="category.id" :value="category.id">
                                            879798
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </li>

                        <li class="list-inline-item">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
                                <label for="exampleInputEmail">
                                    <span class="flaticon-maps-and-flags"></span>
                                </label>
                            </div>
                        </li>

                        <!-- <li class="list-inline-item">
                            <div class="small_dropdown2 home6">
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
                        </li> -->
                       
                        <li class="list-inline-item">
                            <div class="search_option_button">
                                <button type="submit" class="btn btn-thm">Search</button>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: [],
            }
        },
        computed: {
            categoriesComp: {
                get: function() {
                    return this.categories;
                },
                set: function(value) {
                    this.categories = value;
                }
            }
        },
        async created() {
           await this.$httpClient.get('/api/server/categories').then((response) => {
                this.categories = response.data;
                console.log('categories: ', this.categoriesComp);
            }).catch((err) => { });
        },
    }
</script>

<style lang="scss" scoped>

</style>