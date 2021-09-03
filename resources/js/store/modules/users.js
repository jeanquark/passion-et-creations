import Vue from 'vue'

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
	}
}

export const getters = {
	users (state) {
		return state.users
	}
}