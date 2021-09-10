import store from '../store'

export default async ({ next, to }) => {
    console.log('[auth] middleware')
    // await store.dispatch('auth/setAuthUser')
    // console.log("store.getters['auth/auth']: ", store.getters['auth/auth'])
    // return next();
  	if (!store.getters['auth/auth']) {
    	next('/login')
  	} else {
	    next()
  	}
}
