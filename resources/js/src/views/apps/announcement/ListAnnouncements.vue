<!-- =========================================================================================
  File Name: ECommerceShop.vue
  Description: eCommerce Shop Page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <div>
        <ais-instant-search :search-client="searchClient" index-name="instant_search" id="algolia-instant-search-demo">

            <!-- AIS CONFIG -->
            <ais-configure :hits-per-page.camel="12" />
            <!-- END AIS CONFIG -->

            <div class="algolia-header mb-4">
                <div class="flex md:items-end items-center justify-between flex-wrap">
                    <!-- TOGGLE SIDEBAR BUTTON -->
                    <feather-icon class="inline-flex lg:hidden cursor-pointer mr-4" icon="MenuIcon" @click.stop="toggleFilterSidebar" />
                    <p class="lg:inline-flex hidden font-semibold algolia-filters-label">Filters</p>
                </div>
            </div>

            <!-- <div id="algolia-content-container" class="relative clearfix"> -->
                <!-- SIDEBAR -->

                <!-- END SIDEBAR -->

                <!-- RIGHT COL -->
                <div :class="{'sidebar-spacer-with-margin': clickNotClose = 0 }">

                    <!-- SEARCH BAR -->
                    
                    <!-- END SEARCH BAR -->

                    <!-- SEARCH RESULT -->
                    <ais-hits>
                        <div slot-scope="{ items }">
                            <!-- GRID VIEW -->
                            <template v-if="currentItemView == 'item-grid-view'">
                                <div class="items-grid-view vx-row match-height">
                                    <div class="vx-col lg:w-1/4 sm:w-1/2 w-full" v-for="item in announcements.data" :key="item.id">

                                        <item-grid-view :item="item">
                                            <!-- SLOT: ACTION BUTTONS -->
                                            <template slot="action-buttons">
                                                <div class="flex flex-wrap">
                                                    <!-- PRIMARY BUTTON: ADD TO WISH LIST -->
                                                    <!-- <div class="item-view-primary-action-btn p-3 flex flex-grow items-center justify-center cursor-pointer"
                                                        @click="toggleItemInWishList(item)"> -->

                                                        <router-link tag="div" class="item-view-primary-action-btn p-3 flex flex-grow items-center justify-center cursor-pointer" :to="{ name: 'admin-announcement-show', params:{ id: item.id } }">
                                                            <feather-icon icon="CreditCardIcon" :svgClasses="[{'text-danger fill-current' : isInWishList(item.id)}, 'h-4 w-4']" />
                                                            <span class="text-sm font-semibold ml-2">SHOW</span>
                                                        </router-link>
                                                    <!-- </div> -->
                                                    <!-- END PRIMARY BUTTON: ADD TO WISH LIST -->

                                                    <!-- SECONDARY BUTTON: ADD-TO/VIEW-IN CART -->
                                                    <div class="item-view-secondary-action-btn bg-danger p-3 flex flex-grow items-center justify-center text-white cursor-pointer"
                                                         @click="openConfirmDelete($event, item)">
                                                        <feather-icon icon="ShoppingBagIcon" svgClasses="h-4 w-4" />

                                                        <!-- <span class="text-sm font-semibold ml-2" v-if="isInCart(item.id)">VIEW IN CART</span>
                                                        <span class="text-sm font-semibold ml-2" v-else>ADD TO CART</span> -->
                                                        <span class="text-sm font-semibold ml-2">DELETE</span>
                                                    </div>
                                                    <!-- END SECONDARY BUTTON: ADD-TO/VIEW-IN CART -->
                                                </div>
                                            </template>
                                            <!-- END SLOT: ACTION BUTTONS -->
                                        </item-grid-view>

                                    </div>
                                </div>
                            </template>
                            <!-- END GRID VIEW -->
                        </div>
                    </ais-hits>
                    <!-- END SEARCH RESULT -->

                    <!-- PAGINATION -->
                    <!-- <ais-pagination>
                        <div slot-scope="{
                                currentRefinement,
                                nbPages,
                                pages,
                                isFirstPage,
                                isLastPage,
                                refine,
                                createURL
                            }">

                            <vs-pagination :total="nbPages" 
                                           :max="7" 
                                           :value="currentRefinement + 1" 
                                           @input="(val) => { refine(val - 1) }"
                            />

                        </div>
                    </ais-pagination> -->
                    <advanced-laravel-vue-paginate :data="announcements" @paginateTo="loadAnnouncements"></advanced-laravel-vue-paginate>
                    <!-- END PAGINATION -->

                    <!-- ALGOLIA LOGO -->
                    <img class="flex mt-4 mx-auto h-8" src="@assets/images/pages/eCommerce/Algolia-logo.png" alt="algolia-logo">
                    <!-- END ALGOLIA LOGO -->
                </div>
                <!-- END RIGHT COL -->
            <!-- </div> -->
        </ais-instant-search>
    </div>
</template>

<script>
    import {
        AisClearRefinements,
        AisConfigure,
        AisHierarchicalMenu,
        AisHits,
        AisInstantSearch,
        AisNumericMenu,
        AisPagination,
        AisRangeInput,
        AisRatingMenu,
        AisRefinementList,
        AisSearchBox,
        AisSortBy,
        AisStats
    } from 'vue-instantsearch'
    import algoliasearch from 'algoliasearch/lite'

    export default {
        components: {
            ItemGridView: () => import("./components/ItemGridView.vue"),
            ItemListView: () => import("./components/ItemListView.vue"),
            AisClearRefinements,
            AisConfigure,
            AisHierarchicalMenu,
            AisHits,
            AisInstantSearch,
            AisNumericMenu,
            AisPagination,
            AisRangeInput,
            AisRatingMenu,
            AisRefinementList,
            AisSearchBox,
            AisSortBy,
            AisStats
        },
        data() {
            return {
                searchClient: algoliasearch(
                    'latency',
                    '6be0576ff61c053d5f9a3225e2a90f76'
                ),
                // Filter Sidebar
                isFilterSidebarActive: true,
                clickNotClose: true,
                currentItemView: 'item-grid-view',
                numericItems: [
                    {
                        label: 'All'
                    },
                    {
                        label: '<= $10',
                        end: 10
                    },
                    {
                        label: '$10 - $100',
                        start: 10,
                        end: 100
                    },
                    {
                        label: '$100 - $500',
                        start: 100,
                        end: 500
                    },
                    {
                        label: '>= $500',
                        start: 500
                    },
                ],
                algoliaCategories: [
                    'hierarchicalCategories.lvl0',
                    'hierarchicalCategories.lvl1',
                    'hierarchicalCategories.lvl2',
                    'hierarchicalCategories.lvl3',
                ],
                announcements: [],
                accouncementDeleteId: null,
                categories: null
            }
        },
        methods: {
            setSidebarWidth() {
                if (this.windowWidth < 992) {
                    this.isFilterSidebarActive = this.clickNotClose = false
                } else {
                    this.isFilterSidebarActive = this.clickNotClose = true
                }
            },

            // GRID VIEW - ACTIONS
            toggleFilterSidebar() {
                if (this.clickNotClose) return
                this.isFilterSidebarActive = !this.isFilterSidebarActive
            },
            toggleItemInWishList(item) {
                this.$store.dispatch('eCommerce/toggleItemInWishList', item)
            },
            additemInCart(item) {
                this.$store.dispatch('eCommerce/additemInCart', item)
            },
            cartButtonClicked(item) {
                this.isInCart(item.objectID) ? this.$router.push('/apps/eCommerce/checkout').catch(() => {}) 
                                             : this.additemInCart(item)
            },
            openConfirmDelete(event, accouncement) {
                this.accouncementDeleteId = accouncement.id;
                var test = this.$vs.dialog({
                    type: 'confirm',
                    color: 'danger',
                    title: 'Confirm',
                    text: `You want delete ${accouncement.title}?`,
                    accept: this.accouncementDelete,
                })
            },
            async accouncementDelete() {
                if (this.accouncementDeleteId != null) {
                    await this.$http.delete(`/api/admin/managements/announcements/${this.accouncementDeleteId}`).then((response) => {
                        if (response.status == 204) {
                            this.acceptAlert();
                        }
                    }).catch((err) => {
                        
                    });

                    this.accouncementDeleteId = null;
                }
            },
            acceptAlert() {
                this.$vs.notify({
                    color: 'danger',
                    title: 'Deleted image',
                    text: 'The selected image was successfully deleted'
                })
            },
            async loadAnnouncements(page = 1) {
                await this.$http.get('/api/admin/managements/announcements?per_page=16&current_page=' + page).then((response) => {
                    this.announcements = response.data;
                    console.log('Paginated: ', response.data);
                }).catch((err) => { });
            }
        },
        computed: {
            toValue() {
                return (value, range) => [
                    value.min !== null ? value.min : range.min,
                    value.max !== null ? value.max : range.max,
                ]
            },

            // GRID VIEW
            isInCart() {
                return (itemId) => this.$store.getters['eCommerce/isInCart'](itemId)
            },
            isInWishList() {
                return (itemId) => this.$store.getters['eCommerce/isInWishList'](itemId)
            },
            windowWidth() {
                return this.$store.state.windowWidth
            }
        },
        watch: {
            windowWidth() {
                this.setSidebarWidth()
            }
        },
        async created() {
            this.setSidebarWidth();
            this.loadAnnouncements(1);
            // await this.$http.get('/api/admin/managements/announcements').then((response) => {
            //     this.announcements = response.data;
            //     console.log('managements', response);
            // }).catch((err) => {
                
            // });

            await this.$http.get('/api/admin/managements/categories').then((response) => {
                this.categories = response.data;
                console.log('categories: ', response);
            }).catch((err) => {
                
            });
        },
        mounted() {

            console.log('Items: ', this.items);
        },
    }

</script>


<style lang="scss">
    #algolia-instant-search-demo {
        .algolia-header {
            .algolia-filters-label {
                width: calc(260px + 2.4rem);
            }
        }

        #algolia-content-container {

            .vs-sidebar {
                position: relative;
                float: left;
            }
        }

        .algolia-search-input-right-aligned-icon {
            padding: 1rem 1.5rem;
        }

        .algolia-price-slider {
            min-width: unset;
        }

        .item-view-primary-action-btn {
            color: #2c2c2c !important;
            background-color: #f6f6f6;
            min-width: 50%;
        }

        .item-view-secondary-action-btn {
            min-width: 50%;
        }
    }

    .theme-dark {
        #algolia-instant-search-demo {
            #algolia-content-container {
                .vs-sidebar {
                    background-color: #10163a;
                }
            }
        }
    }

    @media (min-width: 992px) {
        .vs-sidebar-rounded {
            .vs-sidebar {
                border-radius: .5rem;
            }

            .vs-sidebar--items {
                border-radius: .5rem;
            }
        }
    }

    @media (max-width: 992px) {
        #algolia-content-container {
            .vs-sidebar {
                position: absolute !important;
                float: none !important;
            }
        }
    }

</style>
