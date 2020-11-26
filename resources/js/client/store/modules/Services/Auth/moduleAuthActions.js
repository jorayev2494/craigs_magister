import axios from '../../../../axios/index.js'

export async function jwtRegister({ state, commit, getters }, payload) {
    await axios.post('/api/auth/register', payload).then((response) => {
        if (response.status == 201) {
            console.log('User Register Response:', response);
            commit('SET_USER_REGISTERED', true);
        }
    }).catch((err) => {
        console.log('User register error response:', err.response);
    });
}

export async function jwtLogin({ state, commit, getters }, payload) {
    await axios.post('/api/auth/login', payload).then((response) => {
        if (response.status == 200) {
            commit('SET_BEARER_TOKEN', response.data);
            commit('SET_USER_DATA', response.data);
        }
    }).catch((err) => {
        console.log('User login error response:', err.response); 
    });
}