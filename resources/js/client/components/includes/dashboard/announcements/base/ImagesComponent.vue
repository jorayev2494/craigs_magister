<template>
    <div class="my_dashboard_review mt30">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="mb30">Property media</h4>
            </div>

            <div class="col-lg-12">
                <ul class="mb0">
                    <li class="list-inline-item" v-for="(image, key) in imagesComp" :key="key">
                        <!-- {{ image }} -->
                        <div class="portfolio_item">
                            <img class="img-fluid" v-if="isEdit" v-server-image:200="image.url">
                            <img class="img-fluid" v-else :src="image.url" :alt="image.url">
                            <!-- <div class="edu_stats_list" data-toggle="tooltip" @click.prevent="deleteByIndex($event, image, image.name)" data-placement="top" title="Delete" data-original-title="Delete">
                                <a href="#">
                                    <span class="flaticon-garbage"></span>
                                </a>
                            </div> -->
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col-xl-12">
                <div class="resume_uploader mb30">
                    <h4>Attachments</h4>
                    <form class="form-inline">
                        <input class="upload-path">
                        <label class="upload">
                            <!-- <input type="file" accept=".jpg, .jpeg, .png"> -->
                            <input type="file" @change="changeImages($event)" accept="image/*" multiple>
                            Select Attachment
                        </label>
                    </form>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="my_profile_setting_input">
                    <!-- <button class="btn btn1 float-left">Back</button> -->
                    <button class="btn btn2 float-right" @click="methodSend($event)">Next</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            dataImages: {
                type: Object,
                required: true
            },
            methodSend: {
                type: Function,
                required: true
            }
        },
        data() {
            return {
                files: [],
                images: [],
                isEdit: false,
            }
        },
        methods: {
            changeImages(event) {
                this.files = this.imagesComp = 'clear';
                this.files = event.target.files;

                if (this.files.length <= 0) return;
            
                for (let i = this.files.length - 1; i >= 0; i -= 1) {
                    const file = this.files[i];
                    this.dataImages[i] = file;
                    // console.log("set: ", i);
                    this.imagesComp = file;
                }
            },
            deleteByIndex(event, image, name) {
                var tempFiles = this.files;

                this.files = [];
                for (let i = 0; i < tempFiles.length; i++) {
                    if (tempFiles[i].name == name) {
                        this.$delete(this.dataImages, i);
                        this.$delete(this.images, i);
                        continue;
                    }
                    this.files.push(tempFiles[i]);
                }
            }
        },
        computed: {
            imagesComp: {
                get: function() {
                    return this.images;
                },
                set: function(value) {
                    if (this.isEdit) {
                        this.images = [];
                        this.isEdit = false;
                    }

                    if(typeof(value) == 'string' && value == 'clear') {
                        this.images = [];
                        return;
                    } else if(typeof(value) == 'string') {
                        value = value;
                    } else {
                        value = URL.createObjectURL(value);
                    }

                    this.images.push({
                        url:  value,
                        name: value.name
                    });
                }
            }
        },
        mounted() {
            // console.table(this.dataImages);
            setTimeout(() => {
                for (let i = 0; i < Object.keys(this.dataImages).length; i++) {
                    const img = this.dataImages[i];
                    console.log('img: ', img);                
                    this.imagesComp = img;
                }
                this.isEdit = true;
            }, 1000);
        },
    }
</script>

<style lang="scss" scoped>

</style>