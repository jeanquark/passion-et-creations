import store from '~/store'

export default async (to, from, next) => {
	console.log('[check-auth] middleware')
  	if (!store.getters['auth/auth']) {
    	try {
      		await store.dispatch('auth/setAuthUser')
    	} catch (e) { }
  	}

  	next()
}
