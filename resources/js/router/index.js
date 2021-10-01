import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
import axios from 'axios'
Vue.use(VueRouter)

import AdminLayout from '../views/admin/layout'
import AdminIndex from '../views/admin/index'
import AdminProfile from '../views/admin/profile/layout'
import AdminProfileIndex from '../views/admin/profile/index'
import AdminMedias from '../views/admin/medias/layout'
import AdminMediasIndex from '../views/admin/medias/index'
import AdminImages from '../views/admin/images/layout'
import AdminImagesIndex from '../views/admin/images/index'
import AdminImagesCreate from '../views/admin/images/create'
import AdminPortfolios from '../views/admin/portfolios/layout'
import AdminPortfoliosIndex from '../views/admin/portfolios/index'
import AdminPortfoliosCreate from '../views/admin/portfolios/create'
import AdminPortfoliosEdit from '../views/admin/portfolios/edit'

import AdminContents from '../views/admin/contents/layout'
import AdminContentsIndex from '../views/admin/contents/index'
import AdminContentsShow from '../views/admin/contents/show'
import AdminContentsCreate from '../views/admin/contents/create'
import AdminContentsEdit from '../views/admin/contents/edit'

import AdminSliders from '../views/admin/sliders/layout'
import AdminSlidersIndex from '../views/admin/sliders/index'
import AdminSlidersEdit from '../views/admin/sliders/edit'

import AdminContacts from '../views/admin/contacts/layout'
import AdminContactsIndex from '../views/admin/contacts/index'
import AdminContactsShow from '../views/admin/contacts/show'

import AdminUsers from '../views/admin/users/layout'
import AdminUsersIndex from '../views/admin/users/index'
import AdminUsersCreate from '../views/admin/users/create'
import AdminUsersEdit from '../views/admin/users/edit'
import Home from '../views/index'
import Login from '../views/login'

import log from '../middleware/log'
import auth from '../middleware/auth'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/admin',
            name: 'adminLayout',
            component: AdminLayout,
            meta: {
                // middleware: auth
            },
            children: [
                {
                    path: 'index',
                    name: 'adminIndex',
                    component: AdminIndex,
                },
                {
                    path: 'profile',
                    component: AdminProfile,
                    children: [
                        {
                            path: '',
                            name: 'adminProfileIndex',
                            component: AdminProfileIndex
                        }
                    ]
                },
                {
                    path: 'medias',
                    component: AdminMedias,
                    children: [
                        {
                            path: '',
                            name: 'adminMediasIndex',
                            component: AdminMediasIndex
                        }
                    ]
                },
                {
                    path: 'images',
                    component: AdminImages,
                    children: [
                        {
                            path: '',
                            name: 'adminImagesIndex',
                            component: AdminImagesIndex
                        },
                        {
                            path: 'create',
                            name: 'adminImagesCreate',
                            component: AdminImagesCreate
                        }
                    ]
                },
                {
                    path: 'portfolios',
                    component: AdminPortfolios,
                    children: [
                        {
                            path: '',
                            name: 'adminPortfoliosIndex',
                            component: AdminPortfoliosIndex
                        },
                        {
                            path: 'create',
                            name: 'adminPortfoliosCreate',
                            component: AdminPortfoliosCreate
                        },
                        {
                            path: ':id/edit',
                            name: 'adminPortfoliosEdit',
                            component: AdminPortfoliosEdit
                        }
                    ]
                },
                {
                    path: 'contents',
                    component: AdminContents,
                    children: [
                        {
                            path: '',
                            name: 'adminContentsIndex',
                            component: AdminContentsIndex
                        },
                        {
                            path: 'create',
                            name: 'adminContentsCreate',
                            component: AdminContentsCreate
                        },
                        {
                            path: ':id',
                            name: 'adminContentsShow',
                            component: AdminContentsShow
                        },
                        {
                            path: ':id/edit',
                            name: 'adminContentsEdit',
                            component: AdminContentsEdit
                        }
                    ]
                },
                {
                    path: 'sliders',
                    component: AdminSliders,
                    children: [
                        {
                            path: '',
                            name: 'adminSlidersIndex',
                            component: AdminSlidersIndex
                        },
                        {
                            path: ':id/edit',
                            name: 'adminSlidersEdit',
                            component: AdminSlidersEdit
                        }
                    ]
                },
                {
                    path: 'contacts',
                    component: AdminContacts,
                    children: [
                        {
                            path: '',
                            name: 'adminContactsIndex',
                            component: AdminContactsIndex
                        },
                        {
                            path: ':id',
                            name: 'adminContactsShow',
                            component: AdminContactsShow
                        }
                    ]
                },
                {
                    path: 'users',
                    component: AdminUsers,
                    children: [
                        {
                            path: '',
                            name: 'adminUsersIndex',
                            component: AdminUsersIndex
                        },
                        {
                            path: 'create',
                            name: 'adminUsersCreate',
                            component: AdminUsersCreate
                        },
                        {
                            path: ':id/edit',
                            name: 'adminUsersEdit',
                            component: AdminUsersEdit
                        },
                    ]
                }
            ]
        }
    ]
})

// Creates a `nextMiddleware()` function which not only
// runs the default `next()` callback but also triggers
// the subsequent Middleware function.
function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index]
    // If no subsequent Middleware exists,
    // the default `next()` callback is returned.
    if (!subsequentMiddleware) return context.next

    return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters)
        // Then run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, index + 1)
        subsequentMiddleware({ ...context, next: nextMiddleware })
    }
}

router.beforeEach(async (to, from, next) => {
    // console.log('[router] index beforeEach() ')
    // console.log("beforeEach store.getters['auth/auth']: ", store.getters['auth/auth'])
    // console.log("beforeEach store.getters['auth/token']: ", store.getters['auth/token'])
    // Check auth
    // if (!store.getters['auth/auth'] && store.getters['auth/token']) {
    // if (!store.getters['auth/auth']) {
    //     try {
    //         // await store.dispatch('auth/setAuthUser')
    //         // const response = await axios.get('/sanctum/csrf-cookie')
    //         // console.log('[router] response: ', response)
    //     } catch (error) {
    //         console.log('error: ', error)
    //     }
    // }
    // console.log('beforeEach next()')
    return next()
})

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware) ? to.meta.middleware : [to.meta.middleware]

        const context = {
            from,
            next,
            router,
            to
        }
        const nextMiddleware = nextFactory(context, middleware, 1)

        return middleware[0]({ ...context, next: nextMiddleware })
    }

    return next()
})

export default router
