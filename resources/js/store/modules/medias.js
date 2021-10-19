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
            // console.log('[VUEX] fetchMedias: ', payload)
            const { data } = await axios.get(`/api/v1/medias`)
            // console.log('[VUEX] data: ', data)
            commit('SET_MEDIAS', data)
            return data
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },

    async downloadMedia({}, payload) {
		try {
			const { data } = await axios.post('/api/v1/medias/download', payload, {
                responseType: 'blob'
            })
			// console.log('data: ', data)
            return data
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	},

    async uploadMedias({}, form) {
		try {
			// console.log('[VUEX] uploadFiles: ', form)
			const { data } = await form.submit('post', '/api/v1/medias', {
				transformRequest: [
					function (data, headers) {
						return serialize(data)
					}
				]
			})
			console.log('data: ', data)
		} catch (error) {
			console.log('[VUEX] error: ', error)
			throw error
		}
	},
    
    async createFolder({ dispatch }, form) {
        try {
            const { data } = await form.submit('post', '/api/v1/medias/create-folder', form)
            console.log('[VUEX] data: ', data)
            await dispatch('fetchMedias')
        } catch (error) {
            console.log("[VUEX] error: ", error);
            throw error
        }
    },

    async deleteFolder({ dispatch }, payload) {
        try {
            const { data } = await axios.post(`/api/v1/medias/delete-folder`, { path: payload })
            // const { data } = await form.submit('post', '/api/v1/medias/delete-folder', form)
            console.log('[VUEX] data: ', data)
            await dispatch('fetchMedias')
        } catch (error) {
            console.log("[VUEX] error: ", error);
            throw error
        }
    },

    async deleteFile({ dispatch }, payload) {
        try {
            const { data } = await axios.post(`/api/v1/medias/delete-media`, { path: payload })
            // console.log('[VUEX] data: ', data)
            await dispatch('fetchMedias')
            await dispatch('portfolios/fetchPortfolios', {}, { root: true })
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
