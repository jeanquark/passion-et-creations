import Vue from 'vue'

export const state = () => ({
	snackbar: {}
})

export const mutations = {
	SET_SNACKBAR (state, payload) {
		// state.snackbars.push(payload);
		state.snackbar = payload
	}
}

export const actions = {
}

export const getters = {
	snackbar (state) {
		return state.snackbar
	}
}