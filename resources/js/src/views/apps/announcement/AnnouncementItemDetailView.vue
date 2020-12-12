<!-- =========================================================================================
  File Name: ECommerceItemDetail.vue
  Description: eCommerce Item Detail page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <div id="item-detail-page">

        <vs-alert color="danger" title="Error Fetching Product Data" :active.sync="error_occured">
            <span>{{ error_msg }}. </span>
            <span>
                <span>Check</span>
                <router-link :to="{ name:'admin-announcements' }" class="text-inherit underline">All Announcements</router-link>
            </span>
        </vs-alert>

        <!-- <vx-card v-if="item_data">
            <template slot="no-body">
                <div class="item-content">
                    <div class="product-details p-6">
                        <announcement-item-detail-carousel :images="item_data.images" :image-with="600"></announcement-item-detail-carousel>
                    </div>
                </div>
            </template>
        </vx-card> -->

        <vx-card v-if="item_data" :key="item_data.id">
            <template slot="no-body">

                <div class="item-content">
                    <!-- Item Main Info -->
                    <div class="product-details p-6">
                        <div class="vx-row mt-6">
                            <div class="vx-col md:w-2/5 w-full flex items-center justify-center">
                                <!-- <div class="product-img-container w-3/5 mx-auto mb-10 md:mb-0"> -->
                                <!-- <div class="product-img-container"> -->

                                    <!-- <img src="/storage/images/announcement/house/600/MFvrDuoT9rb8EdCT7UI1YUgzxDD5EhFK.jpg" 
                                         alt="/storage/images/announcement/house/600/MFvrDuoT9rb8EdCT7UI1YUgzxDD5EhFK.jpg"
                                         class="responsive"> -->

                                    <!-- <announcement-item-detail-carousel :images="item_data.images" :image-with="600"></announcement-item-detail-carousel> -->

                                    <!-- UnComment Below line for true flow
                                    <img :src="item_data.image" :alt="item_data.name" class="responsive">
                                    Remove above img tag which is for demo purpose in actual flow -->
                                <!-- </div> -->
                                <admin-carousel-component :images="item_data.images" :image-size="600"></admin-carousel-component>
                                
                                
                            </div>

                            <!-- Item Content -->
                            <div class="vx-col md:w-3/5 w-full">

                                <vs-list-item class="p-0 border-none" title="Category">
                                    <span class="text-primary" icon-pack="feather" icon="icon-dollar-sign">{{ item_data.category.slug | capitalize }}</span>
                                </vs-list-item>

                                <vs-divider />

                                <h3>{{ item_data.title }}</h3>

                                <p class="my-2">
                                    <!-- <span class="mr-2">By: </span> -->
                                    <span class="mr-2"></span>
                                    <router-link :to="{ name: 'admin-app-user-view', params:{ userId: item_data.creator.id} }">
                                        <vs-chip :color="item_data.creator.unblock_date ? 'danger' : 'primary'" class="m-0">
                                            <vs-avatar :src="$func.serverImage(24, item_data.creator.avatar)" />
                                            {{ item_data.creator.full_name }}
                                        </vs-chip>
                                    </router-link>

                                </p>


                                <!-- <p class="my-2">
                                    <span class="mr-2">Category: </span>
                                    <span>{{ item_data.category.slug }}</span>
                                </p> -->

                                <p class="flex items-center flex-wrap">
                                    <span class="text-2xl leading-none font-medium text-primary mr-4 mt-2">
                                        {{ item_data.front_end_price }}<small>/{{ item_data.price_per }}</small>
                                    </span>
                                    <span class="pl-4 mr-2 mt-2 border border-solid d-theme-border-grey-light border-t-0 border-b-0 border-r-0">
                                        <star-rating :show-rating="false" :rating="item_data.rate" :star-size="20" read-only />
                                    </span>
                                    <span class="cursor-pointer leading-none mt-2">
                                        {{ item_data.rate }} ratings
                                        | {{ item_data.reviews.length }} reviews
                                        | {{ item_data.viewed }} viewed
                                        <!-- | status: <span class="text-success">{{ item_data.status }}</span> -->
                                    </span>
                                    <!-- <span class="cursor-pointer leading-none mt-2"> | {{ item_data.reviews.length }} reviews</span> -->
                                </p>

                                <vs-divider />

                                <p>{{ item_data.description }}</p>

                                <vs-list class="product-sales-meta-list px-0 pt-4">
                                    <!-- <vs-list-item class="p-0 border-none" title="Free Sheeping" icon-pack="feather" icon="icon-truck">
                                        <span class="text-danger">No</span>
                                    </vs-list-item> -->
                                    <vs-list-item class="p-0 border-none" title="Status" icon-pack="feather" icon="icon-box">
                                        <span :class="'text-' + currentStatusTextColorComp">{{ currentStatusComp | capitalize }}</span>
                                    </vs-list-item>
                                     <vs-list-item class="p-0 border-none" title="Is price contractual" icon-pack="feather" icon="icon-dollar-sign">
                                        <span :class="item_data.is_price_contractual == 'yes' ? 'text-success' : 'text-danger'">{{ item_data.is_price_contractual | capitalize }}</span>
                                    </vs-list-item>
                                </vs-list>

                                <!-- <vs-divider /> -->
                                <!-- <pre>{{ item_data.concrete }}</pre> -->
                                <div class="vx-row">
                                    <div class="vx-col w-full">
                                        <house-concrete-component :concrete-data="item_data.concrete"></house-concrete-component>
                                    </div>
                                </div>
                                <!-- <vs-divider /> -->

                                <vs-list class="product-sales-meta-list px-0 pt-4">
                                    <vs-list-item class="p-0 border-none" title="Country" icon-pack="feather" icon="icon-globe">
                                        {{ item_data.location.country | capitalize }}
                                    </vs-list-item>
                                    <vs-list-item class="p-0 border-none" title="City" icon-pack="feather" icon="icon-map-pin">
                                        {{ item_data.location.city | capitalize }}
                                    </vs-list-item>
                                    <vs-list-item class="p-0 border-none" title="Unblock date" icon-pack="feather" icon="icon-unlock">
                                        <span :class="'text-' + currentStatusTextColorComp">
                                            {{ item_data.unblock_date | capitalize }}
                                        </span>
                                    </vs-list-item>
                                </vs-list>

                                <vs-divider />

                                <!-- Quantity -->
                                <div class="vx-row">
                                    <!-- <div class="vx-col w-full">
                                        <p class="my-2">
                                            <span>Status</span>
                                            <span class="mx-2">-</span>
                                            <span class="text-success">{{ item_data.status }}</span>
                                        </p>
                                    </div> -->

                                    <div class="vx-col w-full">
                                        <template lang="html">
                                            <vs-tabs :color="announcement_actions.colorx">
                                                <vs-tab v-for="(desct_action, key) in announcement_actions.description_actions" :key="key + desct_action.icon" 
                                                        @click="announcement_actions.colorx = desct_action.color" :label="desct_action.text" icon-pack="feather" :icon="desct_action.icon">
                                                        <div class="con-tab-ejemplo">
                                                            {{ item_data[desct_action.description] }}
                                                        </div>
                                                </vs-tab>
                                            </vs-tabs>
                                        </template>
                                    </div>

                                    <div class="vx-col w-full">
                                        <div class="flex flex-wrap items-start mb-4">
                                            <!-- Add To Cart Button -->
                                            <vs-button  class="mr-4 mb-4" v-for="(action, key) in announcement_actions.actions" :key="key"
                                                icon-pack="feather" :icon="action.icon" :color="action.color" :disabled="action.status == currentStatusComp"
                                                @click="announcementAction($event, action)">
                                                {{ action.text }}
                                            </vs-button>

                                            <vs-button  class="mr-4 mb-4" v-for="(desct_action, key) in announcement_actions.description_actions" :key="key + desct_action.text"
                                                icon-pack="feather" :icon="desct_action.icon" :color="desct_action.color" :disabled="desct_action.status == currentStatusComp"
                                                @click="announcement_actions.prompts[desct_action.prompt] = true">
                                                {{ desct_action.text }}
                                            </vs-button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Quantity -->

                                <!-- <div class="vx-row">
                                    <div class="vx-col flex flex-wrap items-center">
                                        <vs-button class="mr-4" type="border" icon-pack="feather" color="#1551b1" icon="icon-facebook" radius></vs-button>
                                        <vs-button class="mr-4" type="border" icon-pack="feather" color="#00aaff" icon="icon-twitter" radius></vs-button>
                                        <vs-button class="mr-4" type="border" icon-pack="feather" color="#c4302b" icon="icon-youtube" radius></vs-button>
                                        <vs-button class="mr-4" type="border" icon-pack="feather" color="#405DE6" icon="icon-instagram" radius></vs-button>
                                    </div>
                                </div> -->

                                <vs-prompt 
                                    @cancel="cancelDescStatus($event)" 
                                    @accept="announcementAction($event, announcement_actions.description_actions[0])" 
                                    @close="cancelDescStatus($event)" 
                                    :is-valid="validDescStatusComp"
                                    :active.sync="announcement_actions.prompts.activeCancelledPrompt">
                                        <div class="con-exemple-prompt">
                                            Enter your first and last name to <b>continue</b>.
                                            <!-- <vs-input placeholder="Name" v-model="valMultipe.value1" class="mt-4 mb-2 w-full" />
                                            <vs-input placeholder="Last Name" v-model="valMultipe.value2" class="w-full" /> -->

                                            <vs-textarea 
                                                 class="w-full"
                                                v-model="announcement_actions.status_desctiptions.status_cancelled_description" 
                                                placeholder="Cacelled description" />

                                            <vs-alert :active="!validDescStatusComp" color="danger" vs-icon="new_releases" class="mt-4">
                                                Fields can not be empty please enter the data
                                            </vs-alert>
                                        </div>
                                </vs-prompt>

                                <vs-prompt 
                                    @cancel="cancelDescStatus($event)" 
                                    @accept="announcementAction($event, announcement_actions.description_actions[1])" 
                                    @close="cancelDescStatus($event)" 
                                    :is-valid="validDescStatusComp"
                                    :active.sync="announcement_actions.prompts.activeBlockedPrompt">
                                        <div class="con-exemple-prompt">
                                            Enter your first and last name to <b>continue</b>.
                                            <!-- <vs-input placeholder="Name" v-model="valMultipe.value1" class="mt-4 mb-2 w-full" />
                                            <vs-input placeholder="Last Name" v-model="valMultipe.value2" class="w-full" /> -->

                                            <vs-textarea
                                                class="w-full"
                                                v-model="announcement_actions.status_desctiptions.status_blocked_description"
                                                placeholder="Blocked description" />

                                            <div class="mt-5">
                                                <flat-pickr class="w-full" :config="announcement_actions.configdateTimePicker" v-model="announcement_actions.status_desctiptions.unblock_date" placeholder="Date Time" />
                                                <p class="mt-4">Unblock Datetime: {{ announcement_actions.status_desctiptions.unblock_date }}</p>
                                            </div>

                                            <vs-alert :active="!validDescStatusComp" color="danger" vs-icon="new_releases" class="mt-4">
                                                Fields can not be empty please enter the data
                                            </vs-alert>
                                        </div>
                                </vs-prompt>

                            </div>

                        </div>
                    </div>

                </div>

            </template>
        </vx-card>
    </div>
</template>

<script>
    import 'swiper/dist/css/swiper.min.css'
    import {
        swiper,
        swiperSlide
    } from 'vue-awesome-swiper'
    import algoliasearch from 'algoliasearch/lite'
    import StarRating from 'vue-star-rating'

    // DateTime style
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';

    export default {
        data() {
            return {
                algolia_index: algoliasearch(
                    'latency',
                    '6be0576ff61c053d5f9a3225e2a90f76'
                ).initIndex("instant_search"),
                item_data: null,
                error_occured: false,
                error_msg: "",

                // Related Products Swiper
                swiperOption: {
                    slidesPerView: 5,
                    spaceBetween: 55,
                    breakpoints: {
                        1600: {
                            slidesPerView: 4,
                            spaceBetween: 55,
                        },
                        1300: {
                            slidesPerView: 3,
                            spaceBetween: 55,
                        },
                        900: {
                            slidesPerView: 2,
                            spaceBetween: 55
                        },
                        640: {
                            slidesPerView: 1,
                            spaceBetween: 55
                        }
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },

                // Below is data which is common in any item
                // Algolia's dataSet don't provide this kind of data. So, here's dummy data for demo
                available_item_colors: ["#7367F0", "#28C76F", "#EA5455", "#FF9F43", "#1E1E1E"],
                opt_color: "#7367F0",
                is_hearted: false,

                related_items: [{
                        "name": "Apple - Apple Watch Series 1 42mm Space Gray Aluminum Case Black Sport Band - Space Gray Aluminum",
                        "brand": "Apple",
                        "price": 229,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/01.png",
                        "rating": 4,
                        "id": "5546604",
                    },
                    {
                        "name": "Beats by Dr. Dre - Powerbeats2 Wireless Earbud Headphones - Black/Red",
                        "brand": "Beats by Dr. Dre",
                        "price": 199.99,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/08.png",
                        "rating": 4,
                        "id": "5565002",
                    },
                    {
                        "name": "Amazon - Fire TV Stick with Alexa Voice Remote - Black",
                        "brand": "Amazon",
                        "price": 39.99,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/03.png",
                        "rating": 4,
                        "id": "5477500",
                    },
                    {
                        "name": "Apple - Apple Watch Nike+ 42mm Silver Aluminum Case Silver/Volt Nike Sport Band - Silver Aluminum",
                        "brand": "Apple",
                        "price": 399,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/07.png",
                        "rating": 4,
                        "id": "5547700",
                    },
                    {
                        "name": "Google - Chromecast Ultra - Black",
                        "brand": "Google",
                        "price": 69.99,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/05.png",
                        "rating": 4,
                        "id": "5578628",
                    },
                    {
                        "name": "Beats by Dr. Dre - Beats EP Headphones - White",
                        "brand": "Beats by Dr. Dre",
                        "price": 129.99,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/02.png",
                        "rating": 4,
                        "id": "5577781",
                    },
                    {
                        "name": "LG - 40\" Class (39.5\" Diag.) - LED - 1080p - HDTV - Black",
                        "brand": "LG",
                        "price": 279.99,
                        "image": "https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/products/09.png",
                        "rating": 4,
                        "id": "5613404",
                    }
                ],
                announcement_actions: {
                    actions: [
                        {
                            text: 'Approve',
                            icon: 'icon-check',
                            color: 'success',
                            status: 'approved'
                        },
                        {
                            text: 'Waiting',
                            icon: 'icon-clock',
                            color: 'warning',
                            status: 'waiting'
                        }              
                    ],
                    description_actions: [
                        {
                            text: 'Cancel',
                            icon: 'icon-minus-circle',
                            color: 'primary',
                            status: 'cancelled',
                            prompt: 'activeCancelledPrompt',
                            description: 'status_cancelled_description'
                        },
                        {
                            text: 'Block',
                            icon: 'icon-lock',
                            color: 'danger',
                            status: 'blocked',
                            prompt: 'activeBlockedPrompt',
                            description: 'status_blocked_description'
                        }, 

                    ],
                    status_desctiptions: {
                        status_cancelled_description: '',
                        status_blocked_description: '',
                        unblock_date: ''
                    },
                    prompts: {
                        activeCancelledPrompt: false,
                        activeBlockedPrompt: false,
                    },
                    status_text_color: 'primary',
                    configdateTimePicker: {
                        enableTime: true,
                        dateFormat: 'Y-m-d H:i'
                    },
                    colorx: 'primary'
                }
            }
        },
        methods: {
            toggleItemInWishList(item) {
                this.$store.dispatch('eCommerce/toggleItemInWishList', item)
            },
            toggleItemInCart(item) {
                this.$store.dispatch('eCommerce/toggleItemInCart', item)
            },
            fetch_item_details(id) {
                this.algolia_index.getObject(id, (err, content) => {
                    if (err) {
                        this.error_occured = true
                        this.error_msg = err.message
                        console.error(err);
                    } else {
                        this.item_data = content
                    }
                })

            },
            async announcementAction(event, action) {
                console.log('Status: ', status);
                await this.$http.put(
                        `/api/admin/managements/announcements/change_status/${this.$route.params.id}`, 
                        { 
                            status: action.status, 
                            ...this.announcement_actions.status_desctiptions
                        }
                    ).then((response) => {
                    if (response.status == 202) {
                        this.currentStatusComp = action.status;

                        this.item_data.status_blocked_description = this.item_data.status_cancelled_description = '';
                        if (action.status == 'blocked') {
                            this.item_data.unblock_date = this.announcement_actions.status_desctiptions.unblock_date + ':00';
                            this.item_data.status_blocked_description = this.announcement_actions.status_desctiptions.status_blocked_description
                        } if (action.status == 'cancelled') {
                            this.item_data.status_cancelled_description = this.announcement_actions.status_desctiptions.status_cancelled_description
                        } else {
                            this.item_data.unblock_date = 'no blocked';
                        }

                        this.cancelDescStatus();
                        
                        this.$vs.notify({
                            color: action.color,
                            title: `${action.status} Announcement`,
                            text: `The selected Announcement was successfully ${action.status}`
                        })    
                    }                    
                }).catch((err) => { });
            },
            cancelDescStatus(event) {
                this.announcement_actions.status_desctiptions.status_cancelled_description = '';
                this.announcement_actions.status_desctiptions.status_blocked_description = '';
                this.announcement_actions.status_desctiptions.unblock_date = '';
            }
        },
        computed: {
            item_qty() {
                const item = this.$store.getters['eCommerce/getCartItem'](this.item_data.id)
                return Object.keys(item).length ? item.quantity : 1
            },
            itemColor() {
                return (obj) => {
                    let style_obj = {}

                    obj.style.forEach(p => {
                        style_obj[p] = obj.color
                    })

                    return style_obj
                }
            },
            isInWishList() {
                return (itemId) => this.$store.getters['eCommerce/isInWishList'](itemId)
            },
            isInCart() {
                return (itemId) => this.$store.getters['eCommerce/isInCart'](itemId)
            },
            currentStatusComp: {
                get: function() {
                    return this.item_data.status;
                },
                set: function(value) {
                    return this.item_data.status = value;
                }
            },
            currentStatusTextColorComp: {
                get: function() {
                    var selectedColor = 'primary';
                    this.announcement_actions.actions.forEach(action => {
                        if (action.status == this.currentStatusComp) selectedColor = action.color;
                    });

                    this.announcement_actions.description_actions.forEach(desc_action => {
                        if (desc_action.status == this.currentStatusComp) selectedColor = desc_action.color;
                    });

                    console.log('Test Color: ', this.currentStatusComp, selectedColor);
                    return selectedColor;
                },
                // set: function(value) {
                //     this.announcement_actions.status_text_color = value;
                // }
            },
            validDescStatusComp() {
                return (this.announcement_actions.status_desctiptions.status_cancelled_description.length > 0 
                        || (this.announcement_actions.status_desctiptions.status_blocked_description.length > 0 && this.announcement_actions.status_desctiptions.unblock_date.length > 0))
            }
        },        
        components: {
            swiper,
            swiperSlide,
            StarRating,
            // AnnouncementItemDetailCarousel: () => import('./components/includes/carousels/AnnouncementItemDetailCarousel.vue'),

            HouseConcreteComponent: () => import('./components/includes/concretes/HouseConcreteComponent.vue'),
            flatPickr
        },
        async created() {
            // this.fetch_item_details(this.$route.params.item_id)
            await this.$http.get(`/api/admin/managements/announcements/${this.$route.params.id}`).then((response) => {
                this.item_data = response.data;
            }).catch((err) => { });
        }
    }

</script>

<style lang="scss">
    @import "@sass/vuexy/_variables.scss";

    #item-detail-page {
        .color-radio {
            height: 2.28rem;
            width: 2.28rem;

            >div {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }

        .item-features {
            background-color: #f7f7f7;

            .theme-dark & {
                background-color: $theme-dark-secondary-bg;
            }
        }

        .product-sales-meta-list {
            .vs-list--icon {
                padding-left: 0;
            }
        }

        .related-product-swiper {
            // padding-right: 2rem;
            // padding-left: 2rem;

            .swiper-wrapper {
                padding-bottom: 2rem;

                >.swiper-slide {
                    background-color: #f7f7f7;
                    box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.1), 0 5px 12px 0 rgba(0, 0, 0, 0.08) !important;

                    .theme-dark & {
                        background-color: $theme-light-dark-bg;
                    }
                }
            }

            .swiper-button-next,
            .swiper-button-prev {
                transform: scale(.5);
                filter: hue-rotate(40deg);
            }

            .swiper-button-next {
                right: 0
            }

            .swiper-button-prev {
                left: 0;
            }
        }
    }

</style>
