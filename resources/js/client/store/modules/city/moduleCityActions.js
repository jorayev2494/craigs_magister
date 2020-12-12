export async function ACTION_CITIES({ commit }, payload) {
    return await new Promise((resolve, reject) => {
        window.httpClient.get('/api/server/cities').then((response) => {
            if (response.status == 200) {
                commit('SET_CITIES');
                resolve(response.data);
            }
        }).catch((err) => {
            reject(false);
        });;
    });
}