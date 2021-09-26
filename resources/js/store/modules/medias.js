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
            commit('SET_MEDIAS', data)
            return data
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async uploadMedias({}, form) {
		try {
			console.log('[VUEX] uploadFiles: ', form)
			const { data } = await form.submit('post', '/api/v1/medias', {
				transformRequest: [
					function (data, headers) {
						return serialize(data)
					}
				]
			})
			console.log('data: ', data)
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
    async deleteFile({ dispatch }, payload) {
        try {
            const { data } = await axios.post(`/api/v1/medias/delete`, { path: payload })
            console.log('[VUEX] data: ', data)
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
