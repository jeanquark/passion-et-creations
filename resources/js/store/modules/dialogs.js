export const state = () => ({
	dialog: {}
})

export const mutations = {
	SET_DIALOG (state, payload) {
		state.dialog = payload
	},
	CLEAR_DIALOG (state) {
		state.dialog = {}
	},
}

export const actions = {
}

export const getters = {
	dialog (state) {
		return state.dialog
	}
}