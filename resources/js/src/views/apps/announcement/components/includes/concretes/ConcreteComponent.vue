<template>
    <vs-table hoverFlat :data="{concreteData}">
        <!-- HEADER -->
        <!-- <template slot="thead">
            <vs-th>Key</vs-th>
            <vs-th>Value</vs-th>
        </template> -->

        <!-- DATA -->
        <template>
            <vs-tr v-for="(val, key) in concreteData" :key="key">

                <!-- <template v-if="key == 'created_at'">
                    </vs-tr>
                    <vs-tr>
                </template> -->

                <vs-td :data="key">{{ $t(`concrete_announcement.${key}`) }}</vs-td>
                <vs-td :data="val" v-text="val"></vs-td>
            </vs-tr>
        </template>
    </vs-table>
</template>

<script>
    export default {
        props: {
            concreteData: {
                type: Object,
                required: true
                
            },
        }
    }
</script>

<style lang="scss" scoped>

</style>