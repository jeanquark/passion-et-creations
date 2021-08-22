import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'
Vue.use(VueRouter)

import AdminLayout from '../views/admin/layout'
import AdminIndex from '../views/admin/index'
import AdminLawyers from '../views/admin/lawyers/layout'
// import AdminLawyersHome from "../views/admin/lawyers/home"
import AdminLawyersIndex from '../views/admin/lawyers/index'
import AdminLawyersCreate from '../views/admin/lawyers/create'
import AdminLawyersEdit from '../views/admin/lawyers/edit'
import AdminTraineesIndex from '../views/admin/trainees/index'
import AdminPermanencesIndex from '../views/admin/permanences/index'
// import AdminUsersIndex from "../views/admin/users/index";
// import AdminUsersCreate from "../views/admin/users/create";
// import AdminUsersEdit from "../views/admin/users/edit";
// import AdminLawyers from "../views/admin/lawyers";
import AdminFilesIndex from '../views/admin/files/index'
import Student from '../views/student'
import Lawyer from '../views/lawyer'
import Permanences from '../views/permanences'
import Slider from '../views/slider'
import Portfolio from '../views/portfolio'

import log from '../middleware/log'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/student',
            name: 'student',
            component: Student,
            beforeEnter: (to, from, next) => {
                console.log('to: ', to)
                console.log('from: ', from)
                console.log('store.state.auth.auth: ', store.state.auth.auth)
                // if (store.state.auth.auth == 'student') {
                //     next()
                // } else {
                //     alert('Not authorized!')
                // }
                next()
            }
        },
        {
            path: '/lawyer',
            name: 'lawyer',
            component: Lawyer
        },
        {
            path: '/slider',
            name: 'slider',
            component: Slider,
            meta: {
                layout: 'no-sidebar',
                middleware: log
            }
        },
        {
            path: '/portfolio',
            name: 'portfolio',
            component: Portfolio,
            meta: {
                middleware: log
            }
        },
        {
            path: '/admin',
            name: 'adminLayout',
            component: AdminLayout,
            children: [
                {
                    path: 'index',
                    name: 'adminIndex',
                    component: AdminIndex
                },
                {
                    path: 'avocats',
                    // name: "adminLawyers",
                    component: AdminLawyers,
                    children: [
                        {
                            path: '',
                            name: 'adminLawyersIndex',
                            component: AdminLawyersIndex
                        },
                        {
                            path: 'ajouter',
                            name: 'adminLawyersCreate',
                            component: AdminLawyersCreate
                        },
                        {
                            path: ':id/editer',
                            name: 'adminLawyersEdit',
                            component: AdminLawyersEdit
                        }
                    ]
                },
                {
                    path: 'stagiaires',
                    name: 'adminTraineesIndex',
                    component: AdminTraineesIndex
                },
                {
                    path: 'permanences',
                    name: 'adminPermanencesIndex',
                    component: AdminPermanencesIndex
                },
                {
                    path: 'files',
                    name: 'adminFilesIndex',
                    component: AdminFilesIndex
                }
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
