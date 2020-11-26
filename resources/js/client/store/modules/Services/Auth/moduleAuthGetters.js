export function GET_REGISTERED(state) {
    return state.userRegistered;
}

export function GET_USER_DATA(state, payload) {
    if (window.localStorage.length && window.localStorage.key('userData')) {
        var userData = window.localStorage.getItem('userData');
        return JSON.parse(userData);
    }
    return null;
}