export const state = () => ({
	snackbar: {}
})

export const mutations = {
	SET_SNACKBAR (state, payload) {
		state.snackbar = payload
	},
	CLEAR_SNACKBAR (state) {
		state.snackbar = {}
	},

}

export const actions = {
}

export const getters = {
	snackbar (state) {
		return state.snackbar
	}
}