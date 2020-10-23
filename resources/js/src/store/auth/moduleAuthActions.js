/*=========================================================================================
  File Name: moduleAuthActions.js
  Description: Auth Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import jwt from "../../http/requests/auth/jwt/index.js"


import firebase from 'firebase/app'
import 'firebase/auth'
import router from '@/router'

export default {
    // Google Login
    loginWithGoogle({
        commit,
        state
    }, payload) {
        if (state.isUserLoggedIn()) {
            payload.notify({
                title: 'Login Attempt',
                text: 'You are already logged in!',
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'warning'
            })
            return false
        }
        const provider = new firebase.auth.GoogleAuthProvider()

        firebase.auth().signInWithPopup(provider)
            .then((result) => {
                router.push(router.currentRoute.query.to || '/')
                commit('UPDATE_USER_INFO', result.user.providerData[0], {
                    root: true
                })
            }).catch((err) => {
                payload.notify({
                    time: 2500,
                    title: 'Error',
                    text: err.message,
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'danger'
                })
            })
    },

    // Facebook Login
    loginWithFacebook({ commit, state }, payload) {
        if (state.isUserLoggedIn()) {
            payload.notify({
                title: 'Login Attempt',
                text: 'You are already logged in!',
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'warning'
            })
            return false
        }
        const provider = new firebase.auth.FacebookAuthProvider()

        firebase.auth().signInWithPopup(provider)
            .then((result) => {
                router.push(router.currentRoute.query.to || '/')
                commit('UPDATE_USER_INFO', result.user.providerData[0], {
                    root: true
                })
            }).catch((err) => {
                payload.notify({
                    time: 2500,
                    title: 'Error',
                    text: err.message,
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'danger'
                })
            })
    },

    // Twitter Login
    loginWithTwitter({ commit, state }, payload) {
        if (state.isUserLoggedIn()) {
            payload.notify({
                title: 'Login Attempt',
                text: 'You are already logged in!',
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'warning'
            })
            return false
        }
        const provider = new firebase.auth.TwitterAuthProvider()

        firebase.auth().signInWithPopup(provider)
            .then((result) => {
                router.push(router.currentRoute.query.to || '/')
                commit('UPDATE_USER_INFO', result.user.providerData[0], {
                    root: true
                })
            }).catch((err) => {
                payload.notify({
                    time: 2500,
                    title: 'Error',
                    text: err.message,
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'danger'
                })
            })
    },

    // Github Login
    loginWithGithub({ commit, state }, payload) {
        if (state.isUserLoggedIn()) {
            payload.notify({
                title: 'Login Attempt',
                text: 'You are already logged in!',
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'warning'
            })
            return false
        }
        const provider = new firebase.auth.GithubAuthProvider()

        firebase.auth().signInWithPopup(provider)
            .then((result) => {
                router.push(router.currentRoute.query.to || '/')
                commit('UPDATE_USER_INFO', result.user.providerData[0], {
                    root: true
                })
            }).catch((err) => {
                payload.notify({
                    time: 2500,
                    title: 'Error',
                    text: err.message,
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'danger'
                })
            })
    },

    registerUser({
        dispatch
    }, payload) {

        // create user using firebase
        firebase.auth().createUserWithEmailAndPassword(payload.userDetails.email, payload.userDetails.password)
            .then(() => {
                payload.notify({
                    title: 'Account Created',
                    text: 'You are successfully registered!',
                    iconPack: 'feather',
                    icon: 'icon-check',
                    color: 'success'
                })

                const newPayload = {
                    userDetails: payload.userDetails,
                    notify: payload.notify,
                    updateUsername: true
                }
                dispatch('login', newPayload)
            }, (error) => {
                payload.notify({
                    title: 'Error',
                    text: error.message,
                    iconPack: 'feather',
                    icon: 'icon-alert-circle',
                    color: 'danger'
                })
            })
    },

    updateUsername({
        commit
    }, payload) {
        payload.user.updateProfile({
            displayName: payload.displayName
        }).then(() => {

            // If username update is success
            // update in localstorage
            let newUserData = Object.assign({}, payload.user.providerData[0])
            newUserData.displayName = payload.displayName
            commit('UPDATE_USER_INFO', newUserData, {
                root: true
            })

            // If reload is required to get fresh data after update
            // Reload current page
            if (payload.isReloadRequired) {
                router.push(router.currentRoute.query.to || '/')
            }
        }).catch((err) => {
            payload.notify({
                time: 8800,
                title: 'Error',
                text: err.message,
                iconPack: 'feather',
                icon: 'icon-alert-circle',
                color: 'danger'
            })
        })
    },

    // #region JWT
    loginJWT({ commit }, payload) {
        return new Promise((resolve, reject) => {
            jwt.login(payload.userDetails.email, payload.userDetails.password, payload.userDetails.remember_me).then(response => {
                // If there's user data in response
                if (response.data.user_data && response.data.access_token) {

                    // Navigate User to homepage
                    router.push(router.currentRoute.query.to || {
                        name: 'admin-dashboard'
                    });

                    // // Set accessToken
                    // window.localStorage.setItem("accessToken", response.data.access_token);

                    // Update user details
                    commit('UPDATE_USER_INFO', response.data.user_data, {
                        root: true
                    });

                    // Set bearer token in axios
                    commit("SET_BEARER", response.data.access_token);

                    resolve(response);

                    // Close animation if passed as payload
                    if (payload.closeAnimation) payload.closeAnimation();
                } else {
                    reject({
                        message: "Wrong Email or Password"
                    });
                }

            }).catch(error => {
                // Close animation if passed as payload
                if (payload.closeAnimation) payload.closeAnimation();

                error.response.data.errors.forEach(error => {
                    payload.notify({
                        time: 2500,
                        title: payload.i18n.t('error'),
                        text: payload.i18n.t(error),
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'danger'
                    });
                });

                // reject(error);

            })
        })
    },

    registerUserJWT({ commit }, payload) {
        const {
            firstName,
            lastName,
            email,
            password,
            confirmPassword
        } = payload.userDetails

        return new Promise((resolve, reject) => {

            // Check confirm password
            if (password !== confirmPassword) {
                reject({
                    message: "Password doesn't match. Please try again."
                })
            }

            jwt.registerUser(firstName, lastName, email, password, confirmPassword).then(response => {
                console.table(response);
                // Redirect User
                router.push(router.currentRoute.query.to || {
                    name: 'admin-page-login'
                });

                // // Update data in localStorage
                // window.localStorage.setItem("accessToken", response.data.access_token)
                // commit('UPDATE_USER_INFO', response.data.user_data, {root: true});

                resolve(response);

                // Close animation if passed as payload
                if (payload.closeAnimation) payload.closeAnimation();
            }).catch(error => {

                // Close animation if passed as payload
                if (payload.closeAnimation) payload.closeAnimation();

                error.response.data.errors.forEach(error => {
                    payload.notify({
                        time: 2500,
                        title: payload.i18n.t('error'),
                        text: payload.i18n.t(error),
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'danger'
                    });
                });

                // reject(error);
            })
        })
    },

    fetchAccessToken() {
        return new Promise((resolve) => {
            jwt.refreshToken().then(response => {
                resolve(response)
            })
        })
    },

    forgotPasswordJWT({ commit }, payload) {
        return new Promise((resolve, reject) => {
            jwt.forgotPassword(payload.email).then((response) => {

                if (response.status == 202) {
                    router.push({
                        name: 'admin-page-login'
                    });

                    // Close animation if passed as payload
                    if (payload.closeAnimation) payload.closeAnimation();

                    payload.notify({
                        time: 8800,
                        title: 'Success',
                        text: payload.i18n.t('reset_link_sent_email'),
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'success'
                    });
                }

            }).catch((error) => {

                console.log(error.response);

                // Close animation if passed as payload
                if (payload.closeAnimation) payload.closeAnimation();

                // #region Laravel Validation Errors
                for (const property in error.response.data.errors) {
                    if (error.response.data.errors.hasOwnProperty(property)) {
                        const elementArr = error.response.data.errors[property];
                        elementArr.forEach(element => {
                            payload.notify({
                                time: 2500,
                                title: payload.i18n.t('error'),
                                text: payload.i18n.t(`server_validation.${element}`),
                                iconPack: 'feather',
                                icon: 'icon-alert-circle',
                                color: 'danger'
                            });
                        });
                    }
                }
                // #endregion

            });
        })
    },

    resetPasswordJWT({ commit }, payload) {
        const { password, passwordConfirmation, token } = payload.data;

        return new Promise((resolve, reject) => {
            // Check confirm password
            if (password !== passwordConfirmation) {
                reject({
                    message: "Password doesn't match. Please try again."
                })
            }

            jwt.resetPassword(password, passwordConfirmation, token).then((response) => {

                console.log(response);

                if (response.status == 204) {
                    router.push({
                        name: 'admin-page-login'
                    });

                    // Close animation if passed as payload
                    if (payload.closeAnimation) payload.closeAnimation();

                    payload.notify({
                        time: 8800,
                        title: 'Success',
                        text: payload.i18n.t('your_password_has_been_successfully_reset'),
                        iconPack: 'feather',
                        icon: 'icon-alert-circle',
                        color: 'success'
                    });
                }

            }).catch((error) => {
                // Close animation if passed as payload
                if (payload.closeAnimation) payload.closeAnimation();

                // #region Laravel Validation Errors
                for (const property in error.response.data.errors) {
                    if (error.response.data.errors.hasOwnProperty(property)) {
                        const elementArr = error.response.data.errors[property];
                        elementArr.forEach(element => {
                            payload.notify({
                                time: 2500,
                                title: payload.i18n.t('error'),
                                text: payload.i18n.t(`server_validation.${element}`),
                                iconPack: 'feather',
                                icon: 'icon-alert-circle',
                                color: 'danger'
                            });
                        });
                    }
                }
                // #endregion

            });
        });
    }
    // #endregion
}
