export async function ACTION_UPDATE_PROFILE_UPDATE({ commit }, payload) {
    return await new Promise((resolve, reject) => {
        window.httpClient.put('/api/profile', payload).then((response) => {
            if (response.status == 200) {
                resolve(response.data);
            }
        }).catch((err) => {
            reject(false)
        });
    })
}

export async function ACTION_CHANGE_PASSWORD({ commit }, payload) {
    return await new Promise((resolve, reject) => {
        window.httpClient.put('/api/profile/change_password', payload).then((response) => {
            if (response.status == 202) {
                resolve(true);
            }
        }).catch((err) => {
            reject(false);
        });
    });
}