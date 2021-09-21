import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
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

import AdminUsers from '../views/admin/users/layout'
import AdminUsersIndex from '../views/admin/users/index'
import AdminUsersCreate from '../views/admin/users/create'
import AdminUsersShow from '../views/admin/users/show'
import AdminUsersEdit from '../views/admin/users/edit'
// import AdminLawyers from '../views/admin/lawyers/layout'
// import AdminLawyersHome from "../views/admin/lawyers/home"
// import AdminLawyersIndex from '../views/admin/lawyers/index'
// import AdminLawyersCreate from '../views/admin/lawyers/create'
// import AdminLawyersEdit from '../views/admin/lawyers/edit'
// import AdminTraineesIndex from '../views/admin/trainees/index'
// import AdminPermanencesIndex from '../views/admin/permanences/index'
// import AdminUsersIndex from "../views/admin/users/index";
// import AdminUsersCreate from "../views/admin/users/create";
// import AdminUsersEdit from "../views/admin/users/edit";
// import AdminLawyers from "../views/admin/lawyers";
// import AdminFilesIndex from '../views/admin/files/index'
// import Student from '../views/student'
// import Lawyer from '../views/lawyer'
// import Permanences from '../views/permanences'
// import Slider from '../views/slider'
import Portfolio from '../views/portfolio'
import Home from '../views/index'
import Creatrice from '../views/creatrice'
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
        // {
        //     path: '/student',
        //     name: 'student',
        //     component: Student,
        //     beforeEnter: (to, from, next) => {
        //         console.log('to: ', to)
        //         console.log('from: ', from)
        //         console.log('store.state.auth.auth: ', store.state.auth.auth)
        //         // if (store.state.auth.auth == 'student') {
        //         //     next()
        //         // } else {
        //         //     alert('Not authorized!')
        //         // }
        //         next()
        //     }
        // },
        // {
        //     path: '/lawyer',
        //     name: 'lawyer',
        //     component: Lawyer
        // },
        // {
        //     path: '/slider',
        //     name: 'slider',
        //     component: Slider,
        //     meta: {
        //         layout: 'no-sidebar',
        //         middleware: log
        //     }
        // },
        {
            path: '/portfolio',
            name: 'portfolio',
            component: Portfolio,
            meta: {
                middleware: log
            }
        },
        // {
        //     path: '/creatrice',
        //     name: 'creatrice',
        //     component: Creatrice
        // },
        {
            path: '/admin',
            name: 'adminLayout',
            component: AdminLayout,
            meta: {
                middleware: auth
            },
            // middleware: auth,
            children: [
                {
                    path: 'index',
                    name: 'adminIndex',
                    component: AdminIndex,
                    meta: {
                        middleware: auth
                    },
                },
                {
                    path: 'profile',
                    component: AdminProfile,
                    meta: {
                        middleware: auth
                    },
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
                    meta: {
                        middleware: auth
                    },
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
                    meta: {
                        middleware: auth
                    },
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
                    meta: {
                        middleware: auth
                    },
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
                    meta: {
                        middleware: auth
                    },
                    children: [
                        {
                            path: '',
                            name: 'adminContentsIndex',
                            component: AdminContentsIndex
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
                    meta: {
                        middleware: auth
                    },
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
                    path: 'users',
                    component: AdminUsers,
                    meta: {
                        middleware: auth
                    },
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
                        {
                            path: ':id',
                            name: 'adminUsersShow',
                            component: AdminUsersShow
                        }
                    ]
                }
                // {
                //     path: 'avocats',
                //     // name: "adminLawyers",
                //     component: AdminLawyers,
                //     children: [
                //         {
                //             path: '',
                //             name: 'adminLawyersIndex',
                //             component: AdminLawyersIndex
                //         },
                //         {
                //             path: 'ajouter',
                //             name: 'adminLawyersCreate',
                //             component: AdminLawyersCreate
                //         },
                //         {
                //             path: ':id/editer',
                //             name: 'adminLawyersEdit',
                //             component: AdminLawyersEdit
                //         }
                //     ]
                // },
                // {
                //     path: 'stagiaires',
                //     name: 'adminTraineesIndex',
                //     component: AdminTraineesIndex
                // },
                // {
                //     path: 'permanences',
                //     name: 'adminPermanencesIndex',
                //     component: AdminPermanencesIndex
                // },
                // {
                //     path: 'files',
                //     name: 'adminFilesIndex',
                //     component: AdminFilesIndex
                // }
            ]
        }
    ]
    // routes: [
    //     {
    //         path: "/admin/index",
    //         name: "adminIndex",
    //         component: AdminIndex
    //     },
    //     {
    //         path: "/admin/lawyers",
    //         name: "adminLawyers",
    //         component: AdminLawyers
    //     },
    //     {
    //         path: "/admin/users",
    //         name: "adminUsersIndex",
    //         component: AdminUsersIndex,
    //         children: [
    //             {
    //                 path: "create",
    //                 name: "adminUsersCreate",
    //                 component: AdminUsersCreate
    //             },
    //             {
    //                 path: ":id/edit",
    //                 name: "adminUsersEdit",
    //                 component: AdminUsersEdit
    //             }
    //         ]
    //     }
    // ]
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
    console.log('beforeEach 1')
    console.log("beforeEach store.getters['auth/auth']: ", store.getters['auth/auth'])
    console.log("beforeEach store.getters['auth/token']: ", store.getters['auth/token'])
    // Check auth
    // if (!store.getters['auth/auth'] && store.getters['auth/token']) {
    if (!store.getters['auth/auth']) {
        try {
            await store.dispatch('auth/setAuthUser')
        } catch (e) {}
    }
    console.log('beforeEach next()')
    return next()
})

router.beforeEach((to, from, next) => {
    console.log('beforeEach 2')
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
