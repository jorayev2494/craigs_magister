import axios from '@/axios.js';

export function loadCities({ state, commit, dispatch }, payload) {
    axios.get('/api/server/cities').then((response) => {
        commit('SET_CITIES', response.data);
    }).catch((err) => {});
}