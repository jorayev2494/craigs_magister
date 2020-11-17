import axios from "@/axios.js";

export async function loadCountries({ commit }, payload) {
     await axios.get('/api/server/countries').then((response) => {
        commit('SET_COUNTRIES', response.data);
    }).catch((err) => { });
}

