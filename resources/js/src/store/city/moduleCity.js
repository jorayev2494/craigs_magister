import state from './moduleCityState.js';
import * as getters from './moduleCityGetters.js';
import * as mutations from './moduleCityMutations';
import * as actions from './moduleCityActions.js';

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}