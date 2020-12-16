<!-- =========================================================================================
  File Name: AddNewDataSidebar.vue
  Description: Add New Data - Sidebar component
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <vs-sidebar click-not-close position-right parent="body" default-index="1" color="primary"
        class="add-new-data-sidebar items-no-padding" spacer v-model="isSidebarActiveLocalComp">
        <div class="mt-6 flex items-center justify-between px-6">
            <h4>{{ Object.entries(this.data).length === 0 ? "ADD NEW" : "UPDATE" }} ITEM</h4>
            <feather-icon icon="XIcon" @click.stop="isSidebarActiveLocalComp = false" class="cursor-pointer"></feather-icon>
        </div>
        <vs-divider class="mb-0"></vs-divider>

        <VuePerfectScrollbar class="scroll-area--data-list-add-new" :settings="settings" :key="$vs.rtl">
            <div class="p-6">
                <!-- NAME -->
                <vs-input label="Slug" v-model="dataSlug" class="mt-5 w-full" name="item-slug" v-validate="'required'" />
                <span class="text-danger text-sm" v-show="errors.has('item-slug')">{{ errors.first('item-slug') }}</span>

                <!-- MODEL -->
                <vs-input label="Model" v-model="dataModel" class="mt-5 w-full" name="item-model" v-validate="'required'" />
                <span class="text-danger text-sm" v-show="errors.has('item-model')">{{ errors.first('item-model') }}</span>

                <!-- UNBLOCK DATE -->
                <!-- <vs-input label="slug" v-model="dataUnblockDate" class="mt-5 w-full" name="item-unblock-date" v-validate="'required'" /> -->
                <flat-pickr label="Unblock date" :config="configdateTimePicker" class="mt-5 w-full"  v-model="dataUnblockDate" placeholder="Unblock date" />
                <vs-button :color="!dataUnblockDate ? 'danger' : 'success'" class="mt-5 w-full" :disabled="!dataUnblockDate" @click="dataUnblockDate = null" type="border">Unblock</vs-button>
                <!-- <span class="text-danger text-sm" v-show="errors.has('item-unblock-date')">{{ errors.first('item-unblock-date') }}</span> -->
            </div>
        </VuePerfectScrollbar>

        <div class="flex flex-wrap items-center p-6" slot="footer">
            <vs-button class="mr-6" @click="submitData()" :disabled="!isFormValidComp">Submit</vs-button>
            <vs-button type="border" color="danger" @click="isSidebarActiveLocalComp = false">Cancel</vs-button>
        </div>
    </vs-sidebar>
</template>

<script>
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'
    // Date picker
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    // End Date picker

    export default {
        props: {
            isSidebarActive: {
                type: Boolean,
                required: true
            },
            data: {
                type: Object,
                default: () => {},
            }
        },
        data() {
            return {
                dataId: null,
                dataSlug: '',
                dataModel: '',
                dataUnblockDate: '',

                settings: { // perfectscrollbar settings
                    maxScrollbarLength: 60,
                    wheelSpeed: .60,
                },

                configdateTimePicker: {
                    enableTime: true,
                    dateFormat: 'Y-m-d H:i'
                }
            }
        },
        methods: {
            initValues() {
                if (this.data.id) return
                this.dataId = null
                this.dataSlug = ''
                this.dataModel = null
                this.dataUnblockDate = ''
            },
            submitData() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        const obj = {
                            id: this.dataId,
                            slug: this.dataSlug,
                            model: this.dataModel,
                            unblock_date: this.dataUnblockDate,
                        }

                        if (this.dataId !== null && this.dataId >= 0) {
                            // this.$store.dispatch("dataList/updateItem", obj).catch(err => {
                            //     console.error(err)
                            // })

                            this.$http.put(`/api/admin/managements/categories/${obj.id}`, obj).then(response => {
                                if(response.status == 202) {

                                }
                            }).catch(error => {});
                        } else {
                            // delete obj.id
                            // obj.popularity = 0
                            // this.$store.dispatch("dataList/addItem", obj).catch(err => {
                            //     console.error(err)
                            // });

                            this.$http.post('/api/admin/managements/categories', obj).then(response => {
                                if(response.status == 202) {

                                }
                            }).catch(error => {});
                        }

                        this.$emit('closeSidebar')
                        this.initValues()
                    }
                })
            }
        },
        computed: {
            isSidebarActiveLocalComp: {
                get() {
                    return this.isSidebarActive
                },
                set(value) {
                    if (!value) {
                        this.$emit('closeSidebar')
                        // this.$validator.reset()
                        // this.initValues()
                    }
                }
            },
            isFormValidComp() {
                return !this.errors.any() && this.dataSlug && this.dataModel;
            }
        },
        components: {
            VuePerfectScrollbar,
            flatPickr
        },
        watch: {
            isSidebarActive(newValue) {
                if (!newValue) return
                if (Object.entries(this.data).length === 0) {
                    this.initValues()
                    this.$validator.reset()
                } else {
                    let { id, slug, model, unblock_date } = JSON.parse(JSON.stringify(this.data))
                    
                    this.dataId = id
                    this.dataSlug = slug
                    this.dataModel = model
                    this.dataUnblockDate = unblock_date
                    this.initValues()
                }
                // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))
            }
        },
    }

</script>

<style lang="scss" scoped>
    .add-new-data-sidebar {
        ::v-deep .vs-sidebar--background {
            z-index: 52010;
        }

        ::v-deep .vs-sidebar {
            z-index: 52010;
            width: 400px;
            max-width: 90vw;

            .img-upload {
                margin-top: 2rem;

                .con-img-upload {
                    padding: 0;
                }

                .con-input-upload {
                    width: 100%;
                    margin: 0;
                }
            }
        }
    }

    .scroll-area--data-list-add-new {
        // height: calc(var(--vh, 1vh) * 100 - 4.3rem);
        height: calc(var(--vh, 1vh) * 100 - 16px - 45px - 82px);
    }

</style>
