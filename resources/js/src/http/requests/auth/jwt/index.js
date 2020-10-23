import axios from "../../../axios/index.js"
import store from "../../../../store/store.js"

// Token Refresh
let isAlreadyFetchingAccessToken = false
let subscribers = []

function onAccessTokenFetched(access_token) {
    subscribers = subscribers.filter(callback => callback(access_token))
}

function addSubscriber(callback) {
    subscribers.push(callback)
}

export default {
    init() {
        axios.interceptors.response.use(function (response) {
            console.log('Axios: ', response);
            return response;
        }, function (error) {
            // const { config, response: { status } } = error
            const { config, response } = error
            const originalRequest = config

            // if (status === 401) {
            if (response && response.status === 401) {
                if (!isAlreadyFetchingAccessToken) {
                    isAlreadyFetchingAccessToken = true
                    store.dispatch("auth/fetchAccessToken").then((access_token) => {
                            isAlreadyFetchingAccessToken = false
                            onAccessTokenFetched(access_token)
                        })
                }

                const retryOriginalRequest = new Promise((resolve) => {
                    addSubscriber(access_token => {
                        originalRequest.headers.Authorization = 'Bearer ' + access_token
                        resolve(axios(originalRequest))
                    })
                })
                return retryOriginalRequest
            }
            return Promise.reject(error)
        })
    },
    
    login(email, pwd, remember_me) {
        return axios.post("/api/admin/auth/login", {
            email: email,
            password: pwd,
            remember: remember_me
        })
    },

    registerUser(fName, lName, email, pwd, pwdCon) {
        return axios.post("/api/admin/auth/register", {
            first_name: fName,
            last_name: lName,
            email: email,
            password: pwd,
            password_confirmation: pwdCon
        })
    },

    refreshToken() {
        return axios.post("/api/auth/refresh-token", {
            accessToken: window.localStorage.getItem("accessToKen")
        })
    },

    forgotPassword(email) {
        return axios.post("/api/admin/auth/forgot_password/email", { email });
    },

    resetPassword(pwd, pwdCon, token) {
        return axios.put("/api/admin/auth/forgot_password/reset", { 
            password: pwd,
            password_confirmation: pwdCon,
            token
        });
    }
}
