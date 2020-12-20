<template>
    <section class="dashbord bgc-f7 pb50">
		<div class="container-fluid ovh">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Add New Property</h2>
								<p>We are glad to see you again!</p>
							</div>
						</div>

						<div class="col-lg-12">
                            <!-- Create Listing -->
                            <!-- <pre>{{ $data.create_listing }}</pre> -->
							<create-listing-component :data-create-listing="create_listing" @change-category="changeCategoryName($event)"></create-listing-component>

                            <!-- Location -->
                            <!-- <pre>{{ $data.location }}</pre> -->
							<location-component :data-location="location"></location-component>

                            <!-- Detailed Information -->
                            <!-- <pre>{{ $data.concrete }}</pre> -->
                            <!-- <house-component :data-concrete="concrete"></house-component> -->
                            <keep-alive>
                                <component :is="componentNameComp" :data-concrete="concrete"></component>
                            </keep-alive>

                            <!-- Media Content -->
                            <!-- <pre>{{ $data.images }}</pre> -->
                            <images-component :data-images="images" :method-send="send"></images-component>

						</div>
					</div>
					<div class="row mt50">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2020 Find House. Made with love.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
    export default {
        name: 'DashAddNewAnnouncementComponent',
        data() {
            return {
                create_listing: {},
                location: {},
                concrete: {},
                images: {},
                formData: new FormData(),
                componentName: 'CarComponent',
            }
        },
        methods: {
            async send(event) {
                this.compactDatasFormData();
                await this.$httpClient.post('/api/my/announcements', this.formData, { headers: { 'Content-Type': 'multipart/form-data' } }).then((response) => {
                    if (response.status == 202) {
                        // this.$nextTick(() => this.render = true);
                        window.location.reload();
                        this.clearForm();
                    }
                }).catch((err) => { });
            },
            compactDatasFormData() {
                for (const key in this.$data) {
                    if (this.$data.hasOwnProperty(key)) {
                        const objProperty = this.$data[key];

                        if (objProperty == this.$data.formData) continue;

                        // Added Concrete
                        if (objProperty == this.$data.concrete) {
                            this.addConcretePropertiesFormData();
                            continue;
                        }

                        // Added Images
                        if (objProperty == this.$data.images) {
                            this.addImagesFormData();
                            continue;
                        }

                        // Added any proprties
                        for (const key in objProperty) {
                            if (objProperty.hasOwnProperty(key)) {
                                const value = objProperty[key];
                                this.formData.set(key, value);
                            }
                        }
                    }
                }
            },
            addConcretePropertiesFormData() {
                for (const key in this.$data.concrete) {
                    if (this.$data.concrete.hasOwnProperty(key)) {
                        const value = this.$data.concrete[key];
                        this.formData.set(`concrete[${key}]`, value);
                    }
                }
            },
            addImagesFormData(files) {
                for (const key in this.$data.images) {
                    if (this.$data.images.hasOwnProperty(key)) {
                        const valueImg = this.$data.images[key];
                        this.formData.append('images[]', valueImg);
                    }
                }
            },
            clearForm() {
                for (const key in this.$data) {
                    if (this.$data.hasOwnProperty(key)) {
                        const objProperty = this.$data[key];
                        if (objProperty == this.$data.formData) continue;
                        this.$data.objProperty = {};
                    }
                }                        
            },
            changeCategoryName(categoryName) {
                if(categoryName == 'house') this.componentNameComp = 'HouseComponent';
                if(categoryName == 'car') this.componentNameComp = 'CarComponent';
            }
        },
        computed: {
            componentNameComp: {
                get: function() {
                    return this.componentName;
                },
                set: function(value) {
                    this.componentName = value;
                }
            }
        },
        components: {
            CreateListingComponent: () => import('../../../includes/dashboard/announcements/base/CreateListingComponent.vue'),
            LocationComponent: () => import('../../../includes/dashboard/announcements/base/LocationComponent.vue'),
            ImagesComponent: () => import('../../../includes/dashboard/announcements/base/ImagesComponent.vue'),

            HouseComponent: () => import('../../../includes/dashboard/announcements/concretes/HouseComponent.vue'),
            CarComponent: () => import('../../../includes/dashboard/announcements/concretes/CarComponent.vue'),
        },
    }
</script>

<style lang="scss" scoped>

</style>