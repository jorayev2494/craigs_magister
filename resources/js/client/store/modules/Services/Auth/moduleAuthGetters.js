// let result = window.localStorage.key('userAccessToken') && window.localStorage.key('userData');
export function GET_USER_REGISTERED(state) {
    return state.userRegistered;
}

export function GET_USER_LOGINED(state) {
    return state.userLogined;
}

export function GET_USER_DATA(state, payload) {
    if (window.localStorage.key('userAccessToken') && window.localStorage.key('userData')) {
        var userData = window.localStorage.getItem('userData');
        return JSON.parse(userData);
    }
    return null;
}