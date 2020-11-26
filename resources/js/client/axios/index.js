import axios from 'axios'

// if (window.localStorage.key('accessToken')) {
//     console.log("GET Authorization token");
//     axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('accessToken');
// }

if (window.localStorage.key('userAccessToken')) {
    console.log("GET User Authorization token");
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('userAccessToken');
} else {
    console.log("DELETE User Authorization token");
    axios.defaults.headers.common['Authorization'] = '';
    console.log('axios.defaults.headers.common: ', axios.defaults.headers.common);
}

export default axios