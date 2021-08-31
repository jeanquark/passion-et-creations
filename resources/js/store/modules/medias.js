import axios from 'axios'
import Vue from 'vue'
import { serialize } from 'object-to-formdata'

export const state = () => ({
    medias: []
})

export const mutations = {
    SET_MEDIAS(state, payload) {
        state.medias = payload;
    }
}

export const actions = {
    async fetchMedias({ commit }, payload) {
        try {
            console.log('[VUEX] fetchMedias: ', payload)
            const { data } = await axios.get(`/api/v1/medias`)
            console.log('[VUEX] data: ', data)
            return data
            // commit('SET_MEDIAS', data.medias)
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
    async uploadImage({}, form) {
        try {
            // await axios.post('/api/v1/images', {
            //     payload
            // })
            console.log('[VUEX] images/uploadImage: ', form)
            const { data } = await form.submit('post', `/api/v1/images`, {
                transformRequest: [
                    function(data, headers) {
                        return serialize(data)
                    }
                ]
            })
            console.log('data: ', data)
        } catch (error) {
            console.log('error: ', error)
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
    medias(state) {
        return state.medias
    }
}
