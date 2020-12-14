// require('../bootstrap');
import Vue from 'vue';
import Notifications from 'vue-notification';
import store from './store/index.js';
import router from './router/index.js';
import axios from './axios/index.js';
// #region register Advanced Laravel Vue Paginate as a global Vue component
import 'advanced-laravel-vue-paginate/dist/advanced-laravel-vue-paginate.css'
Vue.use(require('advanced-laravel-vue-paginate'));
// #endregion

// #region include Dialog
import VuejsDialog from 'vuejs-dialog';
import VuejsDialogMixin from 'vuejs-dialog/dist/vuejs-dialog-mixin.min.js'; // only needed in custom components

// include the default style
import 'vuejs-dialog/dist/vuejs-dialog.min.css';

require('../bootstrap');

// Tell Vue to install the plugin.
Vue.use(VuejsDialog);
// #endregion

Vue.use(Notifications);

window.Vue = Vue;

window.Vue.directive('serverImage', {
    bind(el, binding, vnode) {
        var imageUrl = binding.value;
        var size = binding.arg;

        const regex = /\/\d{2,4}\//;
        var attributeValue = imageUrl.replace(regex, `/${size}/`);
        el.setAttribute('src', attributeValue);     
        el.setAttribute('alt', attributeValue);
    }
});

window.Vue.directive('subText', {
    bind(el, binding, vnode) {
        var text = binding.value;
        var length = text.length;
        var endPrefix = '';

        if(binding.arg < length) {
            length = binding.arg;
            endPrefix = '...';
        }

        var result = text.substring(0, length);
        result += endPrefix;
        el.innerText = result;
    }
});

Vue.filter('getOnlyPrice', function(value) {
    console.log('getOnlyPrice', value);
    return value.match(/[0-9]+/g)[0];
});

window.Vue.prototype.$httpClient = axios;

import './styles/global.css';
import App from './components/App.vue';

Vue.component('ws-debug-component', require('./components/WSDebugComponent.vue').default);

new Vue({
    store,
    router,
    render: (h) => h(App),
}).$mount('#app');

// Vue.notify({
//     group: 'auth',
//     title: 'Important message',
//     text: 'Hello user! This is a notification!'
// })

// Vue.dialog
//     .confirm('Please confirm to continue')
//     .then(function(dialog) {
//         console.log('Clicked on proceed');
//     })
//     .catch(function() {
//         console.log('Clicked on cancel');
//     });
