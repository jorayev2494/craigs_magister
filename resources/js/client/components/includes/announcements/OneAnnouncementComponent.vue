<template>
    <div class="col-md-6 col-lg-6" v-if="announcement">
        <router-link :to="{ name: 'announcement-show', params:{ id: announcement.id } }">
            <div class="feat_property home7 style4">

                <div class="thumb">
                    <div class="fp_single_item_slider">
                        <div class="item" v-for="(image, key) in announcement.images" :key="key">
                            <img class="img-whp" v-server-image:338="image">
                        </div>
                    </div>
                    <div class="thmb_cntnt style2">
                        <ul class="tag mb0">
                            <li class="list-inline-item">
                                <a href="#">
                                    {{ announcement.category.slug }}
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    {{ announcement.is_price_contractual }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="thmb_cntnt style3">
                        <!-- <ul class="icon mb0">
                            <li class="list-inline-item">
                                <a href="#">
                                    <span class="flaticon-transfer-1"></span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <span class="flaticon-heart"></span>
                                </a>
                            </li>
                        </ul> -->
                        <ul class="icon mb0">
                            <li class="list-inline-item" style="width: auto; display: inline-block; background-color: transparent; opacity: 1;">
                                <a href="#">
                                    <star-rating class="mb0 list-inline-item mt-2" :rating="announcement.rate" :is-indicator-active="false" :star-style="{
                                        starWidth: 14,
                                        starHeight: 14,
                                        fullStarColor: '#bcc52a',
                                        emptyStarColor: '#e1e1e1'
                                    }">
                                    </star-rating>
                                </a>
                            </li>
                            <!-- <li class="list-inline-item">
                                <a href="#">
                                    <span class="flaticon-transfer-1">48</span>
                                </a>
                            </li> -->
                        </ul>
                        <a class="fp_price" href="#">
                            {{ announcement.front_end_price }}<small>/{{ announcement.price_per }}</small>
                        </a>
                    </div>
                </div>

                <div class="details">
                    <div class="tc_content">
                        <p class="text-thm">{{ announcement.category.slug }}</p>
                        <h4>{{ announcement.title }}</h4>
                        <p>
                            <span class="flaticon-placeholder"></span>
                            {{ announcement.location.city }}, {{ announcement.location.country }}
                        </p>
                        <ul class="prop_details mb0">
                            <!-- <li class="list-inline-item" v-for="(val, key, index) in announcement.concrete" :key="index" v-if="index < 3">
                                <a href="#">{{ $t(`concrete_announcement.${key}`) }}: {{ val }}</a>
                            </li> -->
                            <li class="list-inline-item">
                                <a href="#">Reviews: {{ announcement.reviews.length }}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">Viewed: {{ announcement.viewed }}</a>
                            </li>                            
                        </ul>
                    </div>
                    <div class="fp_footer">
                        <ul class="fp_meta float-left mb0">
                            <li class="list-inline-item">
                                <a href="#">
                                    <img class="avatar-radius" v-server-image:40="announcement.creator.avatar">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <!-- <a href="#">
                                    {{ announcement.creator.full_name }}
                                </a> -->
                                <router-link :to="{ name: 'user-profile', params: { user_id: announcement.creator.id } }">
                                    {{ announcement.creator.full_name }}
                                </router-link>
                            </li>
                        </ul>
                        <div class="fp_pdate float-right">{{ announcement.creator.created_at }}</div>
                    </div>
                </div>

            </div>
        </router-link>
    </div>
</template>

<script>
    export default {
        props: {
            announcement: {
                type: Object,
                required: true
            },
        },
        mounted() {
            console.log('announcement: ', this.announcement);
        },
    }
</script>

<style lang="scss" scoped>

</style>