import Vue from 'vue'

export const state = () => ({
    images: []
})

export const mutations = {
    SET_IMAGES(state, payload) {
        const { year, quarter, data } = payload;
        // state.images = payload
        if (!state.images[year]) {
            Vue.set(state.images, year, {});
        }
        if (!state.images[year][quarter]) {
            Vue.set(state.images[year], quarter, {});
        }
        state.images[year][quarter] = data[year][quarter];
    }
}

export const actions = {
    async fetchImages({ commit }, payload) {
        try {
            console.log('[VUEX] fetchImages: ', payload)
            const { data } = await axios.get(`/api/v1/images`)
            console.log('data: ', data)
            return data
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async fetchImage({ }, payload) {
        try {
            const { imagePath } = payload
            console.log('imagePath: ', imagePath)
            const data = await axios.get(`/api/v1/images/${imagePath}`, {
                responseType: 'blob'
            });
            // const data = await axios.get(`/api/v1/images/${imagePath}`);
            console.log('data: ', data)
            return data
        } catch (error) {
            console.log("error: ", error);
            throw error
        }
    },
    async fetchImageSize({ }, payload) {
        try {
            const { imagePath } = payload
            console.log('imagePath: ', imagePath)
            // const data = await axios.get(`/api/v1/images/size/${imagePath}`);
            // const data = await axios.get(`/api/v1/images/action/getSize?path=${imagePath}`);
            const { data } = await axios.post(`/api/v1/images/size`, { imagePath });
            console.log('data: ', data)
            return data
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async fetchImageLastModified({ }, payload) {
        try {
            const { imagePath } = payload
            console.log('imagePath: ', imagePath)
            // const data = await axios.get(`/api/v1/images/last-modified/${imagePath}`);
            const { data } = await axios.post(`/api/v1/images/last-modified`, { imagePath });
            console.log('data: ', data)
            return data
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async deleteImage({ }, payload) {
        try {
            const { path } = payload
            const { data } = await axios.post(`/api/v1/images/destroy`, { path })
            console.log('[VUEX] data: ', data)
        } catch (error) {
            console.log("[VUEX] error: ", error);
            throw error
        }
    }
}

export const getters = {
    images(state) {
        return state.images
    }
}
