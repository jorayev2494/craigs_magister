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

axios.interceptors.response.use((response) => {
        console.log('Base response: ', response.request.responseURL, response);
        return response
    }, 
    function (error) {
        const originalRequest = error.config;
        console.log('%c%s', 'color: #00b300', originalRequest);
        console.log('%c%s', 'color: #dd8d32', error.response);

    }
);

window.Vue.notify({
    group: 'server-response',
    title: 'Important message Server',
    text: 'Hello user! This is a notification!'
});