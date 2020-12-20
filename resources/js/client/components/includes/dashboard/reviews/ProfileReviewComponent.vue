<template>
    <div class="feat_property list favorite_page" :class="{ 'mt30': isFirst }">
        <div class="thumb">
            <img class="img-whp" v-server-image:150="announcementImgComp">
            <div class="thmb_cntnt">
                <ul class="tag mb0">
                    <li class="list-inline-item dn"></li>
                    <li class="list-inline-item">
                        <a href="#" v-sub-text:8="announcement.category.slug"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="details">
            <div class="tc_content" style="padding: 12px 20px 10px;">
                <h4>
                    {{ announcement.title }}
                    <a class="fp_price text-thm" href="#">
                        <small>{{ announcement.status }}</small>
                    </a>
                </h4>
                    
                <p>
                    <span class="flaticon-placeholder"></span>
                    {{ announcement.location.country }}, {{ announcement.location.city }}
                </p>
                <a class="fp_price text-thm" href="#">
                    {{ announcement.price }}<small>/{{ announcement.price_per }}</small>
                </a>
                <p v-sub-text:115="announcement.description"></p>
            </div>
        </div>
        <ul class="view_edit_delete_list mb0 mt35">
            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Show">
                <router-link :to="{ name: 'dashboard-show-announcement', params:{ id: announcement.id } }">
                    <span class="flaticon-view"></span>
                </router-link>
            </li>
            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit">
                <router-link :to="{ name: 'dashboard-edit-announcement', params:{ id: announcement.id } }">
                    <span class="flaticon-edit"></span>
                </router-link>
            </li>
            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete">
                <a href="#" v-confirm="{ 
                                ok: dialog => deleteAnnouncement(dialog, announcement), 
                                cancel: () => {}, 
                                message: `You want delete '${announcement.title}'?`
                            }">
                    <span class="flaticon-garbage"></span>
                </a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            announcement: {
                type: Object,
                required: true
            },
            isFirst: {
                type: Boolean,
                required: true
            },
            reloadPaginateFunc: {
                type: Function,
                required: true
            },
            currentPage: {
                type: Number,
                default: 1
            }
        },
        data() {
            return {
                isDeleted: true,
            }
        },
        methods: {
            async deleteAnnouncement(dialog, announcement) {
                console.log('Delete: ', announcement);
                await this.$httpClient.delete(`/api/my/announcements/${announcement.id}`).then((response) => {
                    this.reloadPaginateFunc(this.currentPage);
                }).catch((err) => { });
            }
        },
        computed: {
            announcementImgComp() {
                return this.announcement.images[0];
            },
        }
    }
</script>

<style lang="scss" scoped>
    .top-padding {
        padding: 12px 20px 10px;
    }
</style>