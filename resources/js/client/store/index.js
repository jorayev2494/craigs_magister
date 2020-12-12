import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

// #region Modules
    import moduleAuth from './modules/Services/Auth/moduleAuth.js';
    import moduleBlog from './modules/blog/moduleBlog.js';
    import moduleCategory from './modules/category/moduleCategory.js';
    import moduleCountry from './modules/country/moduleCountry.js';
    import moduleCity from './modules/city/moduleCity.js';
    import moduleProfile from './modules/profile/moduleProfile.js';
// #endregion

const store = new Vuex.Store({
    store: {
        test: 'Test text',
    },
    modules: {
        auth: moduleAuth,
        blog: moduleBlog,
        category: moduleCategory,
        country: moduleCountry,
        city: moduleCity,
        profile: moduleProfile
    }
});

export default store;
