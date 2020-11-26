export function SET_USER_REGISTERED(payload) {
    state.userRegistered = payload;
}

export function SET_USER_LOGINED(payload) {
    state.userLogined = payload;
}

export function SET_USER_DATA(state, payload) {
    window.localStorage.setItem('userData', JSON.stringify(payload.user_data));
}

export function SET_BEARER_TOKEN(state, payload) {
    window.localStorage.setItem('userAccessToken', payload.access_token);
}

export function REMOVE_USER_DATA(state, payload) {
    window.localStorage.removeItem('userData');
}

export function REMOVE_BEARER_TOKEN(state, payload) {
    window.localStorage.removeItem('userAccessToken');
}