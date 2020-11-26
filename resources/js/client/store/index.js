import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

// #region Modules
    import moduleAuth from './modules/Services/Auth/moduleAuth.js';
// #endregion

const store = new Vuex.Store({
    store: {
        test: 'Test text',
    },
    modules: {
        auth: moduleAuth,
    }
});

export default store;
