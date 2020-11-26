import state from './moduleAuthState.js';
import * as getters from './moduleAuthGetters.js'
import * as mutations from './moduleAuthMutations.js';
import * as actions from './moduleAuthActions.js'

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}