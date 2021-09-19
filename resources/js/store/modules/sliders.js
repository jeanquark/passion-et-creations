import Vue from 'vue'
import { serialize } from 'object-to-formdata'

export const state = () => ({
	sliders: []
})

export const mutations = {
	SET_SLIDERS (state, payload) {
		state.sliders = payload;
	}
}

export const actions = {
	async fetchSliders({ commit }, payload) {
		try {
			console.log('[VUEX] fetchFiles: ', payload)
			const { data } = await axios.get(`/api/v1/sliders`)
			console.log('data: ', data)
			// return data
            commit('SET_SLIDERS', data)
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	},
	async createSlider({ commit }, form) {
		try {
			// const data = await form.submit('post', '/api/v1/sliders')
            // console.log('data: ', data)

			const { data } = await form.submit('post', `/api/v1/sliders`, {
                transformRequest: [
                    function(data, headers) {
                        return serialize(data)
                    }
                ]
            })
			console.log('data: ', data)
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	}
}

export const getters = {
	sliders (state) {
		return state.sliders
	}
}