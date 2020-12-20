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
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
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
                },
                // #region User Profile
                {
                    path: '/user/profile/:user_id',
                    name: 'user-profile',
                    component: () => import('../components/templates/user/UserProfileComponent.vue'),
                    props: true
                },
                // #endregion
                // #region Announcements
                {
                    path: '/announcements',
                    name: 'announcements',
                    component: () => import('../components/templates/announcements/ListAnnouncementsComponent.vue'),
                },
                {
                    path: '/announcement-show/:id',
                    name: 'announcement-show',
                    component: () => import('../components/templates/announcements/ShowAnnouncementComponent.vue'),
                },
                // #endregion

                // #region Blogs
                {
                    path: '/blogs',
                    name: 'blogs',
                    component: () => import('../components/templates/Blogs/BlogIndexComponent.vue'),
                },
                {
                    path: '/blogs/:id',
                    name: 'blogs-show',
                    component: () => import('../components/templates/Blogs/BlogShowComponent.vue'),
                },
                // #endregion
                // #region Authorize
                {
                    path: '/auth/forgot_password/send_reset_token_email',
                    name: 'auth.forgot_password.send_reset_token_email',
                    component: () => import('../components/templates/auth/forgot_password/SendResetTokenEmailComponent.vue'),
                },
                {
                    path: '/auth/forgot_password/reset_password',
                    name: 'auth.forgot_password.reset_password',
                    component: () => import('../components/templates/auth/forgot_password/ResetPasswordComponent.vue'),
                },
                // #endregion
            ]
        },
        // #region User Dashboard
        {
            path: '/',
            name: 'dashboard',
            component: () => import('../components/layouts/DashboardComponent.vue'),
            redirect: { name: 'dashboard-index' },
            children: [
                {
                    path: '/dashboard',
                    name: 'dashboard-index',
                    component: () => import('../components/templates/dashboard/DashboardIndexComponent.vue'),
                },
                {
                    path: '/dashboard/my-profile',
                    name: 'dashboard-my-profile',
                    component: () => import('../components/templates/dashboard/DashboardMyProfileComponent.vue'),
                },
                // #region Announcement
                {
                    path: '/dashboard/add-new-announcement',
                    name: 'dashboard-add-new-announcement',
                    component: () => import('../components/templates/dashboard/announcements/DashAddNewAnnouncementComponent.vue'),
                },
                {
                    path: '/dashboard/my/announcements',
                    name: 'dashboard-my-announcements',
                    component: () => import('../components/templates/dashboard/announcements/DashMyAnnouncementsComponent.vue'),
                },
                {
                    path: '/dashboard/show-announcement/:id',
                    name: 'dashboard-show-announcement',
                    component: () => import('../components/templates/dashboard/announcements/DashShowAnnouncementComponent.vue'),
                },
                {
                    path: '/dashboard/edit-announcement/:id',
                    name: 'dashboard-edit-announcement',
                    component: () => import('../components/templates/dashboard/announcements/DashEditAnnouncementComponent.vue'),
                },
                // #endregion

                // #region Reviews
                {
                    path: '/dashboard/announcement/reviews',
                    name: 'dashboard-announcement-reviews',
                    component: () => import('../components/templates/dashboard/reviews/DashAnnouncementsReviewComponent.vue'),
                },
                {
                    path: '/dashboard/my/reviews',
                    name: 'dashboard-my-reviews',
                    component: () => import('../components/templates/dashboard/reviews/DashMyReviewComponent.vue'),
                },
                {
                    path: '/dashboard/my/recorded/reviews',
                    name: 'dashboard-my-recorded-reviews',
                    component: () => import('../components/templates/dashboard/reviews/DashMyRecordedReviewComponent.vue'),
                },
                // #endregion
            ]
        },
        // #endregion
    ]
});

export default router;