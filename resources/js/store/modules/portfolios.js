import axios from 'axios'
import Vue from 'vue'

export const state = () => ({
    portfolios: []
})

export const mutations = {
    SET_PORTFOLIOS(state, payload) {
        state.portfolios = payload;
    }
}

export const actions = {
    async fetchPortfolios({ commit }) {
        try {
            console.log('[VUEX] fetchPortfolios')
            const { data } = await axios.get(`/api/v1/portfolios`)
            console.log('data: ', data)
            commit('SET_PORTFOLIOS', data.portfolios)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async fetchPortfolio({ }, payload) {
        try {
            const { imagePath } = payload
            console.log('imagePath: ', imagePath)
            const data = await axios.get(`/api/v1/portfolios/${imagePath}`, {
                responseType: 'blob'
            });
            // const data = await axios.get(`/api/v1/portfolios/${imagePath}`);
            console.log('data: ', data)
            return data
        } catch (error) {
            console.log("error: ", error);
            throw error
        }
    },
    async createPortfolio({}, form) {
        try {
            const data = await form.post(`/api/v1/portfolios`, form)
            console.log('data: ', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async updateOrder({}, payload) {
        try {
            console.log('[VUEX] updateOrder payload: ', payload)
            const data = await axios.post('/api/v1/portfolios/update-order', payload)
            console.log('data: ', data)
        } catch (error) {
            throw error
        }
    },
    async updatePortfolio({ dispatch }, form) {
        try {
            console.log('[VUEX] updatePortfolio form: ', form)
            const data = await form.put(`/api/v1/portfolios/${form.id}`, form)
            console.log('[VUEX] data: ', data)
            dispatch('fetchPortfolios')
        } catch (error) {
            throw error
        }
    },
    async deletePortfolio({ }, payload) {
        try {
            const { path } = payload
            const { data } = await axios.post(`/api/v1/portfolios/destroy`, { path })
            console.log('[VUEX] data: ', data)
        } catch (error) {
            console.log("[VUEX] error: ", error);
            throw error
        }
    }
}

export const getters = {
    portfolios(state) {
        return state.portfolios
    }
}
