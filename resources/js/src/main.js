/*=========================================================================================
  File Name: main.js
  Description: main vue(js) file
  ----------------------------------------------------------------------------------------
  Item Name: Vuesax Admin - VueJS Dashboard Admin Template
  Author: Pixinvent
  Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import App from './App.vue'
// #region register Advanced Laravel Vue Paginate as a global Vue component
import 'advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css'
Vue.use(require('advanced-laravel-vue-paginate'));
// #endregion
import * as func from '../helpers/func.js'

// Vuesax Component Framework
import Vuesax from 'vuesax'

Vue.use(Vuesax)

// axios
import axios from "./axios.js"
Vue.prototype.$http = axios

// func
Vue.prototype.$func = func;

// Vue.prototype.$func = function serverImage(size, imageUrl) {
//     // var imageUrl = binding.value;
//     // var size = binding.arg;

//     const regex = /\/\d{2,4}\//;
//     return imageUrl.replace(regex, `/${size}/`);
// };

// API Calls
import "./http/requests"

// mock
import "./fake-db/index.js"

// Theme Configurations
import '../themeConfig.js'

// Firebase
import '@/firebase/firebaseConfig'


// Auth0 Plugin
import AuthPlugin from "./plugins/auth"
Vue.use(AuthPlugin);


// ACL
import acl from './acl/acl'

// Globally Registered Components
import './globalComponents.js'

// Vue Router
import router from './router'

// Vuex Store
import store from './store/store'

// i18n
import i18n from './i18n/i18n'

// Vuesax Admin Filters
import './filters/filters'

// Clipboard
import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard);


// Tour
import VueTour from 'vue-tour'
Vue.use(VueTour)
require('vue-tour/dist/vue-tour.css')


// VeeValidate
import VeeValidate from 'vee-validate'
Vue.use(VeeValidate);


// Google Maps
// import * as VueGoogleMaps from 'vue2-google-maps'
// Vue.use(VueGoogleMaps, {
//     load: {
//         // Add your API key here
//         key: 'AIzaSyB4DDathvvwuwlwnUu7F4Sow3oU22y5T1Y',
//         libraries: 'places', // This is required if you use the Auto complete plug-in
//     },
// })

// Vuejs - Vue wrapper for hammerjs
import {
    VueHammer
} from 'vue2-hammer'
Vue.use(VueHammer)

Vue.component('admin-carousel-component', require('./views/includes/carousels/AdminCarouselComponent.vue').default);

// PrismJS
import 'prismjs'
import 'prismjs/themes/prism-tomorrow.css'

Vue.directive('serverImage', {
    bind(el, binding, vnode) {
        var imageUrl = binding.value;
        var size = binding.arg;

        const regex = /\/\d{2,4}\//;
        var attributeValue = imageUrl.replace(regex, `/${size}/`);
        el.setAttribute('src', attributeValue);

        if (size > 50)
            el.setAttribute('alt', attributeValue);
    }
});

Vue.directive('subText', {
    bind(el, binding, vnode) {
        var text = binding.value;
        var length = text.length;
        var endPrefix = '';

        if (binding.arg < length) {
            length = binding.arg;
            endPrefix = '...';
        }

        var result = text.substring(0, length);
        result += endPrefix;
        el.innerText = result;
    }
});

// Feather font icon
require('@assets/css/iconfont.css')

Vue.config.productionTip = false

new Vue({
    router,
    store,
    i18n,
    acl,
    render: h => h(App),
    methods: {
        serverImage(size, imageUrl) {
            var imageUrl = binding.value;
            var size = binding.arg;

            const regex = /\/\d{2,4}\//;
            return imageUrl.replace(regex, `/${size}/`);
        }
    },
}).$mount('#app')
