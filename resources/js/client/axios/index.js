import Vue from 'vue';
import Notifications from 'vue-notification';
import axios from 'axios'


import Echo from 'laravel-echo'
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    wsHost: window.location.hostname,
    wsPort: 6001,
    disableStats: false,
    forceTLS: false
});

// var authEndpoint = 'http://127.0.0.1:8081/' + '/broadcasting/auth';
// var token = window.localStorage.getItem('userAccessToken');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     // wssPort: 6001,
//     disableStats: false,
//     forceTLS: false,

//     //authEndpoint is your apiUrl + /broadcasting/auth
//     authEndpoint: authEndpoint, 
//     // As I'm using JWT tokens, I need to manually set up the headers.
//     auth: {
//         headers: {
//             Authorization: token ? `Bearer ${token}` : null,
//             Accept: 'application/json',
//         },
//     },
// });

Vue.use(Notifications);

axios.interceptors.request.use(
    config => {
        var token = window.localStorage.getItem('userAccessToken');
        if (token) { config.headers['Authorization'] = 'Bearer ' + token; }
        config.headers['Content-Type'] = 'application/json';
        return config;
    },
    error => {
        Promise.reject(error)
    }
);

Vue.notify({
    group: 'server-response',
    title: 'Important message Server',
    text: 'Hello user! This is a notification!'
});

axios.interceptors.response.use(
    (response) => {
        console.log('Base response: ', response.request.responseURL, 'Status text: ', `[${response.statusText}]`, response);
        Vue.notify({
            group: 'server-response',
            type: 'success',
            title: 'Server status: ' + response.status,
            text: 'Hello user! This is a notification!'
        });
        return response
    }, 
    (error) => {
        const originalRequest = error.config;
        console.log('%c%s', 'color: #00b300', originalRequest);
        console.log('%c%s', 'color: #dd8d32', error.response.data);
        console.log('%c%s', 'color: #dd8d32', error.response.data);

        Vue.notify({
            group: 'server-response',
            type: 'error',
            title: 'Server status: ' + error.response.status,
            text: 'Response: ' + error.response
        });

    }
);

window.httpClient = axios;
export default axios;