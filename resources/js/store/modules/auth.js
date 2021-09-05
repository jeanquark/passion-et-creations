import Vue from 'vue'

export const state = () => ({
    auth: false,
    user: null
})

export const mutations = {
    SET_AUTH(state, payload) {
        state.auth = payload
    },
    SET_USER(state, payload) {
        state.user = payload
    }
}

export const actions = {
	async login ({ dispatch }, form) {
		try {
			await form.post('/login')
			dispatch('setAuthUser')
		} catch (error) {
			console.log('error: ', error)
		}
	},
	async logout ({ commit }) {
		try {
			await axios.post('/logout')
			commit('SET_AUTH', false)
			commit('SET_USER', null)
		} catch (error) {
			console.log('error: ', error)
		}
	},
    async setAuthUser({ commit }, form) {
        try {
			const { data } = await axios.get('/api/user')
            console.log('[VUEX] data: ', data)
			commit('SET_AUTH', true)
			commit('SET_USER', data)
        } catch (error) {
            console.log('error: ', error)
			throw error
        }
    },
    async fetchUser({ commit }) {
        try {
            const { data } = await axios.get('/api/user')
            console.log('data from fetchUser: ', data)

            // commit(types.FETCH_USER_SUCCESS, { user: data })
            commit('SET_USER', { user: data })
        } catch (error) {
            // commit(types.FETCH_USER_FAILURE)
            console.log('error: ', error)
        }
    }
}

export const getters = {
    auth(state) {
        return state.auth
    },
    user(state) {
        return state.user
    }
}
