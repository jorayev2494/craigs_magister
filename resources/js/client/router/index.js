/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  Object Strucutre:
                    path => router path
                    name => router name
                    component(lazy loading) => component to load
                    meta : {
                      rule => which user can have access (ACL)
                      breadcrumb => Add breadcrumb to specific page
                      pageTitle => Display title besides breadcrumb
                    }
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,     // + ':8081',
    routes: [
        {
            path: '/',
            // name: 'index',
            component: () => import('../components/layouts/MainComponent.vue'),
            children: [
                {
                    path: '/',
                    name: 'index',
                    component: () => import('../components/templates/IndexComponent.vue'),
                    meta: { 
                        pageTitle: 'Index',
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce'},
                            { title: 'Shop', active: true },
                        ],
                        // rule: 'editor'
                     }
                }
            ]
        }
    ]
});

export default router;