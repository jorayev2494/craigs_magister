<template>
    <div class="terms_condition_widget">
        <h4 class="title">Categories</h4>
        <div class="widget_list">
            <ul class="list_details">

                <li v-for="(category, key) in categories" :key="key">
                    <a href="#">
                        <i class="fa fa-caret-right mr10"></i>
                        {{ category.slug }}
                        <span class="float-right">{{ category.count_announcements }} Announcements</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            categories: {
                type: Array,
                required: true
            },
        },
    }
</script>

<style lang="scss" scoped>

</style>