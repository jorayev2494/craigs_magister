/*=========================================================================================
  File Name: moduleCalendarActions.js
  Description: Calendar Module Actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import axios from "@/axios.js"
import { reject } from "core-js/fn/promise";

export default {
    // addItem({ commit }, item) {
    //   return new Promise((resolve, reject) => {
    //     axios.post("/api/data-list/products/", {item: item})
    //       .then((response) => {
    //         commit('ADD_ITEM', Object.assign(item, {id: response.data.id}))
    //         resolve(response)
    //       })
    //       .catch((error) => { reject(error) })
    //   })
    // },
    fetchUsers({ commit }) {
        return new Promise((resolve, reject) => {
            axios.get('/api/admin/managements/users').then((response) => {
                    window.console.log('Users: ', response.data);
                    commit('SET_USERS', response.data);
                    resolve(response)
                })
                .catch((error) => {
                    reject(error)
                })
        })
    },

    fetchUser({}, userId) {
        return new Promise((resolve, reject) => {
            axios.get(`/api/admin/managements/users/${userId}`).then((response) => {
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    },

    removeRecord({ commit }, userId) {
        return new Promise((resolve, reject) => {
            axios.delete(`/api/admin/managements/users/${userId}`).then((response) => {
                    commit('REMOVE_RECORD', userId)
                    resolve(response)
                }).catch((error) => {
                    reject(error)
                })
        })
    },

    uploadAvatar({}, payload) {
        return new Promise((resolve, reject) => {
            var headersConfig = {'Content-Type': 'multipart/form-data'};
            axios.post(`/api/admin/managements/users/update_avatar/${payload.userId}`, payload.formData, { headers: headersConfig }).then((response) => {
                if (response.status == 202) {
                    console.log('Response: ', response);
                    resolve(response)
                }
            }).catch((error) => {
                reject(error)
            })
        });
    },

    saveAccountChanges({}, payload) {
        return new Promise((resolve, reject) => {
            axios.put(`/api/admin/managements/users/${payload.user_id}`, payload.user_data).then((response) => {
                if (response.status == 202) {
                    console.log('Response: ', response);
                    resolve(response)
                }
            }).catch((error) => {
                reject(error)
            })
        });
    }
}
