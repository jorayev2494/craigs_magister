import * as moduleAuthGetters from './moduleAuthGetters.js';

export function SET_USER_REGISTERED(state, payload) {
    state.userRegistered = payload;
}

export function SET_USER_LOGINED_TOGGLE(state, payload) {
    state.userLogined = window.localStorage.key('userAccessToken') && window.localStorage.key('userData');
    console.log('state.userLogined: ', state.userLogined);
}

export function SET_USER_DATA(state, payload) {
    console.log('SET_USER_DATA: ', payload);
    window.localStorage.setItem('userData', JSON.stringify(payload.user_data));
}

export function SET_UPDATE_USER_DATA(state, payload) {
    if (window.localStorage.key('userData')) {
        REMOVE_USER_DATA(state, payload);
        
        console.log('SET_UPDATE_USER_DATA: ', payload);
        window.localStorage.setItem('userData', JSON.stringify(payload.user_data));
    }
}

export function SET_BEARER_TOKEN(state, payload) {
    window.localStorage.setItem('userAccessToken', payload.access_token);
}

export function REMOVE_USER_DATA(state, payload) {
    window.localStorage.removeItem('userData');
    // window.localStorage.clear();
}

export function REMOVE_BEARER_TOKEN(state, payload) {
    window.localStorage.removeItem('userAccessToken');
    window.localStorage.clear();
}