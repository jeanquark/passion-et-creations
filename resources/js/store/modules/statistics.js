import axios from 'axios'
import Vue from 'vue'

export const state = () => ({
	statistics: []
})

export const mutations = {
	SET_STATISTICS (state, payload) {
		state.statistics = payload
	},
	CLEAR_STATISTICS (state) {
		state.statistics = {}
	},

}

export const actions = {
    async fetchStatistics ({ commit }) {
        try {
            const { data } = await axios.get('/api/v1/statistics')
            console.log('data: ', data)
            commit('SET_STATISTICS', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async incrementCounter ({}, payload) {
        try {
            console.log('[VUEX] statistics/incrementCounter payload: ', payload)
            const data = await axios.post('/api/v1/statistics', payload)
            console.log('data: ', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async resetOne ({ dispatch }, id) {
        try {
            console.log('[VUEX] statistics/resetOne payload: ', id)
            const data = await axios.put(`/api/v1/statistics/${id}`)
            console.log('data: ', data)
            dispatch('fetchStatistics')
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async resetAll ({ dispatch }) {
        try {
            console.log('[VUEX] statistics/resetAll: ')
            const data = await axios.put('/api/v1/statistics')
            console.log('data: ', data)
            dispatch('fetchStatistics')
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    }
}

export const getters = {
	statistics (state) {
		return state.statistics
	}
}