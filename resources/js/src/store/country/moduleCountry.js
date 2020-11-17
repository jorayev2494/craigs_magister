import state from './moduleCountryState.js';
import * as getters from './moduleCountryGetters.js';
import * as mutations from './moduleCountryMutations.js';
import * as actions from './moduleCountryActions.js'

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}