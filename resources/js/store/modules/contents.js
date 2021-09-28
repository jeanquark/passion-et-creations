import axios from 'axios'
import Vue from 'vue'

export const state = () => ({
    contents: []
})

export const mutations = {
    SET_CONTENTS(state, payload) {
        state.contents = payload;
    }
}

export const actions = {
    async fetchContents({ commit }) {
        try {
            console.log('[VUEX] fetchContents')
            const { data } = await axios.get(`/api/v1/contents`)
            console.log('data: ', data)
            commit('SET_CONTENTS', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async fetchContent({ }, payload) {
        try {
            const { imagePath } = payload
            console.log('imagePath: ', imagePath)
            const data = await axios.get(`/api/v1/contents/${imagePath}`, {
                responseType: 'blob'
            });
            // const data = await axios.get(`/api/v1/contents/${imagePath}`);
            console.log('data: ', data)
            return data
        } catch (error) {
            console.log("error: ", error);
            throw error
        }
    },
    async createContent({}, form) {
        try {
            const data = await form.post(`/api/v1/contents`, form)
            console.log('data: ', data)
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async updateContent({ dispatch }, form) {
        try {
            await form.put(`/api/v1/contents/${form.id}`, form)
            await dispatch('fetchContents')
        } catch (error) {
            console.log('error: ', error)
            throw error
        }
    },
    async updateOrder({}, payload) {
        try {
            console.log('[VUEX] updateOrder payload: ', payload)
            const data = await axios.post('/api/v1/contents/update-order', payload)
            console.log('data: ', data)
        } catch (error) {
            throw error
        }
    },
    async deleteContent({ }, payload) {
        try {
            const { path } = payload
            const { data } = await axios.post(`/api/v1/contents/destroy`, { path })
            console.log('[VUEX] data: ', data)
        } catch (error) {
            console.log("[VUEX] error: ", error);
            throw error
        }
    }
}

export const getters = {
    contents(state) {
        return state.contents
    }
}
