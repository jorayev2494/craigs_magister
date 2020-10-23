import axios from "../../axios.js"

if (window.localStorage.key('accessToken')) {
    console.log("GET Authorization token");
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('accessToken');
}

export default axios
