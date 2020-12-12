import state from './moduleCategoryState.js';
import * as getters from './moduleCategoryGetters.js';
import * as mutations from './moduleCategoryMutations.js';
import * as actions from './moduleCategoryActions.js';


export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}