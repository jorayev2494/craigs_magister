<template>
   <div class="col-lg-6">
        <router-link :to="{ name: 'blogs-show', params:{ id: data.id } }" class="fp_pdate float-right text-thm">
            <div class="for_blog feat_property">
                <div class="thumb">
                    <img class="img-whp" :src="data.media_content.path" :alt="data.media_content.path">
                    <div class="blog_tag">{{ data.category.slug }}</div>
                </div>
                <div class="details">
                    <div class="tc_content">
                        <h4>{{ data.title }}</h4>
                        <ul class="bpg_meta">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="flaticon-calendar"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <!-- <a href="#">January 16, 2020</a> -->
                                <a href="#">{{ data.created_at }}</a>
                            </li>
                        </ul>
                        <p v-sub-text:50="data.description"></p>
                    </div>
                    <div class="fp_footer">
                        <ul class="fp_meta float-left mb0">
                            <li class="list-inline-item">
                                <a href="#">
                                    <img v-server-image:40="data.user ? data.user.avatar : data.admin.avatar" class="avatar-radius">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" v-sub-text:20="data.user ? data.user.full_name : data.admin.first_name"></a>
                            </li>
                        </ul>
                        <router-link :to="{ name: 'blogs-show', params:{ id: data.id } }" class="fp_pdate float-right text-thm">
                            Read More
                            <span class="flaticon-next"></span>
                        </router-link>
                        <!-- <a class="fp_pdate float-right text-thm" href="#">
                            Read More
                            <span class="flaticon-next"></span>
                        </a> -->
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                required: true
            },
        },
        data() {
            return {

            }
        },
    }
</script>

<style lang="css" scoped>
    /* .avatar-radius {
        border-radius: 50%;
    } */
</style>