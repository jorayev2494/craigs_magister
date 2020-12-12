
export async function ACTION_COUNTRIES({ state, commit, getters }, payload) {
    return await new Promise((resolve, reject) => {
        window.httpClient.get('/api/server/countries').then((response) => {
            if (response.status == 200) {
                commit('SET_COUNTRIES');
                resolve(response.data);
            }
        }).catch((err) => {
            reject(false);
        });
    });
}