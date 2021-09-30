import Vue from 'vue'
import { serialize } from 'object-to-formdata'

export const state = () => ({
	users: []
})

export const mutations = {
	SET_USERS (state, payload) {
		state.users = payload;
	}
}

export const actions = {
	async fetchUsers({ commit }, payload) {
		try {
			console.log('[VUEX] fetchFiles: ', payload)
			const { data } = await axios.get(`/api/v1/users`)
			console.log('data: ', data)
			// return data
            commit('SET_USERS', data)
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	},
	async createUser({ dispatch }, form) {
		try {
			// const data = await form.submit('post', '/api/v1/users')
            // console.log('data: ', data)

			const { data } = await form.submit('post', `/api/v1/users`, {
                transformRequest: [
                    function(data, headers) {
                        return serialize(data)
                    }
                ]
            })
			console.log('data: ', data)
			await dispatch('fetchUsers')
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	},
	async deleteUser({ dispatch }, payload) {
		try {
			const { id } = payload
			await axios.delete(`/api/v1/users/${id}`)
			await dispatch('fetchUsers')
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	}
}

export const getters = {
	users (state) {
		return state.users
	}
}