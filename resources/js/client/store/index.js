import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

const store = new Vuex.Store({
    store: {
        test: 'Test text',
    },
});

export default store;
