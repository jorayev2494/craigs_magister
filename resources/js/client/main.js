// require('../bootstrap');
import Vue from 'vue';
import store from './store/index.js';
import router from './router/index.js';

window.Vue = Vue;

// export default 

import App from './components/App.vue';

new Vue({
    store,
    router,
    render: (h) => h(App),
}).$mount('#app');
