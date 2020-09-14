import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '@/components/home/Home'
import User from '@/components/user/User'
import Tag from '@/components/tag/Tag'
import ListTag from '@/components/tag/ListTag'
import Auth from '@/components/auth/Auth'

Vue.use(VueRouter)

const routes = [{
    name: 'home',
    path: '/',
    component: Home
}, {
    name: 'User',
    path: '/admin/user',
    component: User,
    meta: { requiresAdmin: true }
}, {
    name: 'Tag',
    path: '/admin/tag',
    component: Tag,
    meta: { requiresAdmin: true }
}, {
    name: 'ListTag',
    path: '/admin/listTag',
    component: ListTag,
    meta: { requiresAdmin: true }
}, {
    name: 'auth',
    path: '/auth',
    component: Auth,
    meta: { requiresAdmin: true }
}]

export default new VueRouter({
    mode: 'history',
    routes: routes
})
