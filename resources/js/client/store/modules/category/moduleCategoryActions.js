export async function ACTION_CATEGORIES({ commit }, payload) {
    return await new Promise((resolve, reject) => {
        window.httpClient.get('/api/server/categories').then((response) => {
            commit('SET_CATEGORIES', response.data);
            resolve(response.data);
        }).catch((err) => { reject(false) });
    })
}