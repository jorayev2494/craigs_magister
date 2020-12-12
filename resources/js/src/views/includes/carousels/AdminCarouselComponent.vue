<template>
    <!-- <div class="carousel-example"> -->
        <!-- <div class="swiper-inner"> -->
    <!-- <div class="vx-row"> -->
        <div class="vx-col w-full">
            <swiper :options="swiperOption" :dir="$vs.rtl ? 'rtl' : 'ltr'" :key="$vs.rtl">
                
                <swiper-slide v-for="(image, key) in images" :key="key">
                    <img class="responsive rounded-lg" :src="$func.serverImage(imageSize, image)" :alt="$func.serverImage(imageSize, image)">
                </swiper-slide>

                <div class="swiper-pagination swiper-pagination-white" slot="pagination"></div>
                <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
                <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
            </swiper>
        </div>
    <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
</template>

<script>
    import 'swiper/dist/css/swiper.min.css'
    import {
        swiper,
        swiperSlide
    } from 'vue-awesome-swiper'

    export default {
        props: {
            images: {
                type: Array,
                required: true,
            },
            imageSize: {
                type: Number,
                required: true
            }
        },
        data() {
            return {
                swiperOption: {
                    spaceBetween: 30,
                    effect: 'fade',
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
        components: {
            swiper,
            swiperSlide
        }
    }

</script>
