import state from './moduleProfileState.js';
import * as getters from './moduleProfileGetters.js';
import * as mutations from './moduleProfileMutations.js';
import * as actions from './moduleProfileActions.js';

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}