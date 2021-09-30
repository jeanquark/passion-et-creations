import axios from 'axios';
import Vue from 'vue'

export const state = () => ({
	contacts: []
})

export const mutations = {
	SET_CONTACTS(state, payload) {
		state.contacts = payload;
	}
}

export const actions = {
	async fetchContacts({ commit }) {
		try {
			console.log('[VUEX] fetchContacts')
			const { data } = await axios.get(`/api/v1/contacts`)
			console.log('data: ', data)
			// return data
			commit('SET_CONTACTS', data)
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	},
	async updateContacts({ dispatch }, payload) {
		try {
			const { id } = payload
			const data = await axios.put(`/api/v1/contacts/${id}`, payload)
			console.log('data: ', data)
			await dispatch('fetchContacts')
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	},
	async deleteContact({ dispatch }, payload) {
		try {
			const { id } = payload
			await axios.delete(`/api/v1/contacts/${id}`)
			await dispatch('fetchContacts')
		} catch (error) {
			console.log('error: ', error)
			throw error
		}
	}
}

export const getters = {
	contacts(state) {
		return state.contacts
	}
}