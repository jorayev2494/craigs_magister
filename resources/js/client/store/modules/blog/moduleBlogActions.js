import axios from '../../../axios/index.js';

export async function ACTION_LOAD_BLOGS({ state, commit, getters }, payload) {
    await axios.get('/api/blogs').then((response) => {
        console.log(response);
        commit('SET_BLOGS', response.data);
    }).catch(() => {
        
    });
}

export async function ACTION_BLOG({ state, commit, getters }, payload) {
    await axios.get(`/api/blogs/${payload}`).then((response) => {
        console.log(response.data);
        commit('SET_BLOG', response.data);
    }).catch((err) => {
        
    });
}