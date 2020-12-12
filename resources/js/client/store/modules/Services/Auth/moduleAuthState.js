var userLogined = window.localStorage.key('userAccessToken') && window.localStorage.key('userData');

export default {
    userRegistered: false,
    userLogined,
}