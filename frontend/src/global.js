import Vue from 'vue'

export const userKey = '__api_git'
export const baseApiUrl = 'http://localhost:8000/api'

export function showError(e) {
    if (e && e.response && e.response.data && e.response.data.message) {
        Vue.toasted.global.defaultError({ msg: e.response.data.message })
    } else if (typeof e === 'string') {
        Vue.toasted.global.defaultError({ msg: e })
    } else {
        Vue.toasted.global.defaultError()
    }
}

export default { baseApiUrl, showError, userKey }