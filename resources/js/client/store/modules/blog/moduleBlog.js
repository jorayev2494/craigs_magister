import state from './moduleBlogState.js';
import * as getters from './moduleBlogGetters.js';
import * as mutations from './moduleBlogMutations.js';
import * as actions from './moduleBlogActions.js';

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};