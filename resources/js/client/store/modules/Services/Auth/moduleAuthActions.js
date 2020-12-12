import { reject } from 'core-js/fn/promise';
import axios from '../../../../axios/index.js'

export async function jwtRegister({ state, commit, getters }, payload) {
    return await new Promise((resolve, reject) => {
        axios.post('/api/auth/register', payload).then((response) => {
            if (response.status == 201) {
                console.log('User Register Response:', response);
                commit('SET_USER_REGISTERED', true);
                resolve(true);
            }
        }).catch((err) => {
            console.log('User register error response:', err.response);
            resolve(false);
        });
    });

}

export async function jwtLogin({ state, commit, getters }, payload) {
    return await new Promise((resolve, reject) => {
        axios.post('/api/auth/login', payload).then((response) => {
            if (response.status == 200) {
                commit('SET_BEARER_TOKEN', response.data);
                commit('SET_USER_DATA', response.data);
                commit('SET_USER_LOGINED_TOGGLE');
                resolve(true);
            }
        }).catch((err) => {
            console.log('User login error response:', err.response);
            reject(false);
        });
    });

}


export async function jwtLogout({ state, commit, getters }, payload) {
    return await new Promise((resolve, reject) => {
        axios.post('/api/auth/logout').then((response) => {
           if (response.status == 204) {
                commit('REMOVE_BEARER_TOKEN');
                commit('REMOVE_USER_DATA');
                commit('SET_USER_LOGINED_TOGGLE');
                resolve(true);
           }
        }).catch((err) => { 
            commit('REMOVE_BEARER_TOKEN');
            commit('REMOVE_USER_DATA');
            commit('SET_USER_LOGINED_TOGGLE');
            reject(false);
        });
    });
}

export async function jwtSendResetLinkEmail({ state, commit, getters }, payload) {
    return await new Promise((resolve, reject) => {
        axios.post('/api/auth/forgot_password/email', payload).then((response) => {
            if (response.status == 202) {
                commit('REMOVE_BEARER_TOKEN');
                commit('REMOVE_USER_DATA');
                commit('SET_USER_LOGINED_TOGGLE');
                resolve(true);
            }
        }).catch((err) => {
            reject(err.response);
        });
    });
}

export async function jwtResetPassword({ state, commit, getters }, payload) {
    return await new Promise((resolve, reject) => {
        axios.put('/api/auth/forgot_password/reset', payload).then((response) => {
            if (response.status == 202) {
                commit('REMOVE_BEARER_TOKEN');
                commit('REMOVE_USER_DATA');
                commit('SET_USER_LOGINED_TOGGLE');
                resolve(true);
            }
        }).catch((err) => {
            reject(err.response);
        });
    });
}