function page (path) {
    return () => import(/* webpackChunkName: '' */ `../views/${path}`).then(m => m.default || m)
  }
  
  
  export default [
      { path: '/', name: 'index', component: page('index.vue') },
      { path: '/slider', name: 'slider', component: page('slider.vue') },
  
      { path: '*', component: page('errors/404.vue') }
  ]
  