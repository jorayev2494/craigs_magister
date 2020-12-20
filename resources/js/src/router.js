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


import Vue from 'vue'
import Router from 'vue-router'
import auth from "@/auth/authService";

import firebase from 'firebase/app'
import 'firebase/auth'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,     // + ':8081',
    scrollBehavior () {
        return { x: 0, y: 0 }
    },
    routes: [
        {
    // =============================================================================
    // MAIN LAYOUT ROUTES
    // =============================================================================
            path: '/',
            name: 'admin-index',
            // redirect: '/admin/dashboard/analytics',
            component: () => import('./layouts/main/Main.vue'),
            meta: {
                authRequired: true,
                rule: 'admin',
            },
            children: [
        // =============================================================================
        // Theme Routes
        // =============================================================================
                {
                    path: '/admin/dashboard',
                    name: 'admin-dashboard',
                    redirect: { name: 'admin-dashboard-analytics' },
                    meta: {
                        authRequired: true,
                        rule: 'admin',
                    }
                },
                {
                    path: '/admin/dashboard/analytics',
                    name: 'admin-dashboard-analytics',
                    component: () => import('./views/DashboardAnalytics.vue'),
                    meta: {
                        authRequired: true,
                        rule: 'admin',
                    }
                },
                {
                    path: '/admin/dashboard/ecommerce',
                    name: 'admin-dashboard-ecommerce',
                    component: () => import('./views/DashboardECommerce.vue'),
                    meta: {
                        authRequired: true,
                        rule: 'admin'
                    }
                },


        // =============================================================================
        // Application Routes
        // =============================================================================
                {
                    path: '/admin/apps/todo',
                    redirect: '/admin/apps/todo/all',
                    name: 'admin-todo',
                },
                {
                    path: '/admin/apps/todo/:filter',
                    component: () => import('./views/apps/todo/Todo.vue'),
                    meta: {
                        authRequired: true,
                        rule: 'admin',
                        parent: "todo",
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/chat',
                    name: 'admin-chat',
                    component: () => import('./views/apps/chat/Chat.vue'),
                    meta: {
                        authRequired: true,
                        rule: 'admin',
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/email',
                    redirect: '/admin/apps/email/inbox',
                    name: 'admin-email',
                },
                {
                    path: '/admin/apps/email/:filter',
                    component: () => import('./views/apps/email/Email.vue'),
                    meta: {
                        authRequired: true,
                        rule: 'admin',
                        parent: 'email',
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/calendar/vue-simple-calendar',
                    name: 'admin-calendar-simple-calendar',
                    component: () => import('./views/apps/calendar/SimpleCalendar.vue'),
                    meta: {
                        authRequired: true,
                        rule: 'admin',
                        no_scroll: true,
                    }
                },
                {
                    path: '/admin/apps/eCommerce/shop',
                    name: 'admin-ecommerce-shop',
                    component: () => import('./views/apps/eCommerce/ECommerceShop.vue'),
                    meta: {
                        authRequired: true,
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce' },
                            { title: 'Shop', active: true },
                        ],
                        pageTitle: 'Shop',
                        rule: 'editor'
                    }
                },
                {
                    path: '/admin/announcements',
                    name: 'admin-announcements',
                    component: () => import('./views/apps/announcement/ListAnnouncements.vue'),
                    meta: {
                        authRequired: true,
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            // { title: 'eCommerce' },
                            // { title: 'Test' },
                            { title: 'Announcements', active: true },
                        ],
                        pageTitle: 'Announcements',
                        rule: 'editor'
                    }
                },
                {
                    path: '/admin/announcements/show/:id',
                    name: 'admin-announcement-show',
                    component: () => import('./views/apps/announcement/AnnouncementItemDetailView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: { name: 'admin-dashboard' } },
                            { title: 'Announcements', url: { name: 'admin-announcements'} },
                            { title: 'Announcement Details', active: true },
                        ],
                        parent: "ecommerce-item-detail-view",
                        pageTitle: 'Announcement Details',
                        rule: 'editor'
                    }
                },
                {
                    path: '/admin/apps/eCommerce/wish-list',
                    name: 'admin-ecommerce-wish-list',
                    component: () => import('./views/apps/eCommerce/ECommerceWishList.vue'),
                    meta: {
                        authRequired: true,
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce', url:'/apps/eCommerce/shop' },
                            { title: 'Wish List', active: true },
                        ],
                        pageTitle: 'Wish List',
                        rule: 'editor'
                    }
                },
                {
                    path: '/admin/apps/eCommerce/checkout',
                    name: 'admin-ecommerce-checkout',
                    component: () => import('./views/apps/eCommerce/ECommerceCheckout.vue'),
                    meta: {
                        authRequired: true,
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce', url:'/apps/eCommerce/shop'},
                            { title: 'Checkout', active: true },
                        ],
                        pageTitle: 'Checkout',
                        rule: 'editor'
                    }
                },
                /*
                  Below route is for demo purpose
                  You can use this route in your app
                    {
                        path: '/admin/apps/eCommerce/item/',
                        name: 'admin-ecommerce-item-detail-view',
                        redirect: '/admin/apps/eCommerce/shop',
                    }
                */
                {
                    path: '/admin/apps/eCommerce/item/',
                    redirect: '/admin/apps/eCommerce/item/5546604',
                },
                {
                    path: '/admin/apps/eCommerce/item/:item_id',
                    name: 'admin-ecommerce-item-detail-view',
                    component: () => import('./views/apps/eCommerce/ECommerceItemDetailView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce'},
                            { title: 'Shop', url: {name: 'admin-ecommerce-shop'} },
                            { title: 'Item Details', active: true },
                        ],
                        parent: "ecommerce-item-detail-view",
                        pageTitle: 'Item Details',
                        rule: 'editor'
                    }
                },
                {
                    path: '/admin/apps/user/user-list',
                    name: 'admin-app-user-list',
                    component: () => import('@/views/apps/user/user-list/UserList.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'User' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'User List',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/apps/user/user-view/:userId',
                    name: 'admin-app-user-view',
                    component: () => import('@/views/apps/user/UserView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'User' },
                            { title: 'View', active: true },
                        ],
                        pageTitle: 'User View',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/apps/user/user-edit/:userId',
                    name: 'admin-app-user-edit',
                    component: () => import('@/views/apps/user/user-edit/UserEdit.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'User' },
                            { title: 'Edit', active: true },
                        ],
                        pageTitle: 'User Edit',
                        rule: 'editor'
                    },
                },
                // #region Announcement Category
                {
                    path: '/admin/announcements/categories',
                    name: 'admin-announcements-categories',
                    component: () => import('@/views/templates/admin/management/category/CategoryListView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            // { title: 'Data List'},
                            { title: 'Categories', active: true },
                        ],
                        pageTitle: 'Categories',
                        rule: 'editor'
                    },
                },
                // #endregion
        // =============================================================================
        // UI ELEMENTS
        // =============================================================================
                {
                    path: '/admin/ui-elements/data-list/list-view',
                    name: 'admin-data-list-list-view',
                    component: () => import('@/views/ui-elements/data-list/list-view/DataListListView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Data List'},
                            { title: 'List View', active: true },
                        ],
                        pageTitle: 'List View',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/data-list/thumb-view',
                    name: 'admin-data-list-thumb-view',
                    component: () => import('@/views/ui-elements/data-list/thumb-view/DataListThumbView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Data List'},
                            { title: 'Thumb View', active: true },
                        ],
                        pageTitle: 'Thumb View',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/grid/vuesax',
                    name: 'admin-grid-vuesax',
                    component: () => import('@/views/ui-elements/grid/vuesax/GridVuesax.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Grid'},
                            { title: 'Vuesax', active: true },
                        ],
                        pageTitle: 'Grid',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/grid/tailwind',
                    name: 'admin-grid-tailwind',
                    component: () => import('@/views/ui-elements/grid/tailwind/GridTailwind.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Grid'},
                            { title: 'Tailwind', active: true },
                        ],
                        pageTitle: 'Tailwind Grid',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/colors',
                    name: 'admin-colors',
                    component: () => import('./views/ui-elements/colors/Colors.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Colors', active: true },
                        ],
                        pageTitle: 'Colors',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/card/basic',
                    name: 'admin-basic-cards',
                    component: () => import('./views/ui-elements/card/CardBasic.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Basic Cards', active: true },
                        ],
                        pageTitle: 'Basic Cards',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/card/statistics',
                    name: 'admin-statistics-cards',
                    component: () => import('./views/ui-elements/card/CardStatistics.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Statistics Cards', active: true },
                        ],
                        pageTitle: 'Statistics Card',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/card/analytics',
                    name: 'admin-analytics-cards',
                    component: () => import('./views/ui-elements/card/CardAnalytics.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Analytics Card', active: true },
                        ],
                        pageTitle: 'Analytics Card',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/card/card-actions',
                    name: 'admin-card-actions',
                    component: () => import('./views/ui-elements/card/CardActions.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Card Actions', active: true },
                        ],
                        pageTitle: 'Card Actions',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/card/card-colors',
                    name: 'admin-card-colors',
                    component: () => import('./views/ui-elements/card/CardColors.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Card Colors', active: true },
                        ],
                        pageTitle: 'Card Colors',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/table',
                    name: 'admin-table',
                    component: () => import('./views/ui-elements/table/Table.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Table', active: true },
                        ],
                        pageTitle: 'Table',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/ui-elements/ag-grid-table',
                    name: 'admin-ag-grid-table',
                    component: () => import('./views/ui-elements/ag-grid-table/AgGridTable.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'agGrid Table', active: true },
                        ],
                        pageTitle: 'agGrid Table',
                        rule: 'editor'
                    },
                },

        // =============================================================================
        // COMPONENT ROUTES
        // =============================================================================
                {
                    path: '/admin/components/alert',
                    name: 'admin-component-alert',
                    component: () => import('@/views/components/vuesax/alert/Alert.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Alert', active: true },
                        ],
                        pageTitle: 'Alert',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/avatar',
                    name: 'admin-component-avatar',
                    component: () => import('@/views/components/vuesax/avatar/Avatar.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Avatar', active: true },
                        ],
                        pageTitle: 'Avatar',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/breadcrumb',
                    name: 'admin-component-breadcrumb',
                    component: () => import('@/views/components/vuesax/breadcrumb/Breadcrumb.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Breadcrumb', active: true },
                        ],
                        pageTitle: 'Breadcrumb',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/button',
                    name: 'admin-component-button',
                    component: () => import('@/views/components/vuesax/button/Button.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Button', active: true },
                        ],
                        pageTitle: 'Button',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/button-group',
                    name: 'admin-component-button-group',
                    component: () => import('@/views/components/vuesax/button-group/ButtonGroup.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Button Group', active: true },
                        ],
                        pageTitle: 'Button Group',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/chip',
                    name: 'admin-component-chip',
                    component: () => import('@/views/components/vuesax/chip/Chip.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Chip', active: true },
                        ],
                        pageTitle: 'Chip',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/collapse',
                    name: 'admin-component-collapse',
                    component: () => import('@/views/components/vuesax/collapse/Collapse.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Collapse', active: true },
                        ],
                        pageTitle: 'Collapse',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/dialogs',
                    name: 'admin-component-dialog',
                    component: () => import('@/views/components/vuesax/dialogs/Dialogs.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Dialogs', active: true },
                        ],
                        pageTitle: 'Dialogs',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/divider',
                    name: 'admin-component-divider',
                    component: () => import('@/views/components/vuesax/divider/Divider.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Divider', active: true },
                        ],
                        pageTitle: 'Divider',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/dropdown',
                    name: 'admin-component-drop-down',
                    component: () => import('@/views/components/vuesax/dropdown/Dropdown.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Dropdown', active: true },
                        ],
                        pageTitle: 'Dropdown',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/list',
                    name: 'admin-component-list',
                    component: () => import('@/views/components/vuesax/list/List.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'List',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/loading',
                    name: 'admin-component-loading',
                    component: () => import('@/views/components/vuesax/loading/Loading.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Loading', active: true },
                        ],
                        pageTitle: 'Loading',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/navbar',
                    name: 'admin-component-navbar',
                    component: () => import('@/views/components/vuesax/navbar/Navbar.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Navbar', active: true },
                        ],
                        pageTitle: 'Navbar',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/notifications',
                    name: 'admin-component-notifications',
                    component: () => import('@/views/components/vuesax/notifications/Notifications.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Notifications', active: true },
                        ],
                        pageTitle: 'Notifications',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/pagination',
                    name: 'admin-component-pagination',
                    component: () => import('@/views/components/vuesax/pagination/Pagination.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Pagination', active: true },
                        ],
                        pageTitle: 'Pagination',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/popup',
                    name: 'admin-component-popup',
                    component: () => import('@/views/components/vuesax/popup/Popup.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Popup', active: true },
                        ],
                        pageTitle: 'Popup',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/progress',
                    name: 'admin-component-progress',
                    component: () => import('@/views/components/vuesax/progress/Progress.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Progress', active: true },
                        ],
                        pageTitle: 'Progress',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/sidebar',
                    name: 'admin-component-sidebar',
                    component: () => import('@/views/components/vuesax/sidebar/Sidebar.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Sidebar', active: true },
                        ],
                        pageTitle: 'Sidebar',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/slider',
                    name: 'admin-component-slider',
                    component: () => import('@/views/components/vuesax/slider/Slider.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Slider', active: true },
                        ],
                        pageTitle: 'Slider',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/tabs',
                    name: 'admin-component-tabs',
                    component: () => import('@/views/components/vuesax/tabs/Tabs.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Tabs', active: true },
                        ],
                        pageTitle: 'Tabs',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/tooltip',
                    name: 'admin-component-tooltip',
                    component: () => import('@/views/components/vuesax/tooltip/Tooltip.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Tooltip', active: true },
                        ],
                        pageTitle: 'Tooltip',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/components/upload',
                    name: 'admin-component-upload',
                    component: () => import('@/views/components/vuesax/upload/Upload.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Upload', active: true },
                        ],
                        pageTitle: 'Upload',
                        rule: 'editor'
                    },
                },


        // =============================================================================
        // FORMS
        // =============================================================================
            // =============================================================================
            // FORM ELEMENTS
            // =============================================================================
                {
                    path: '/admin/forms/form-elements/select',
                    name: 'admin-form-element-select',
                    component: () => import('./views/forms/form-elements/select/Select.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Select', active: true },
                        ],
                        pageTitle: 'Select',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-elements/switch',
                    name: 'admin-form-element-switch',
                    component: () => import('./views/forms/form-elements/switch/Switch.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Switch', active: true },
                        ],
                        pageTitle: 'Switch',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-elements/checkbox',
                    name: 'admin-form-element-checkbox',
                    component: () => import('./views/forms/form-elements/checkbox/Checkbox.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Checkbox', active: true },
                        ],
                        pageTitle: 'Checkbox',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-elements/radio',
                    name: 'admin-form-element-radio',
                    component: () => import('./views/forms/form-elements/radio/Radio.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Radio', active: true },
                        ],
                        pageTitle: 'Radio',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-elements/input',
                    name: 'admin-form-element-input',
                    component: () => import('./views/forms/form-elements/input/Input.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Input', active: true },
                        ],
                        pageTitle: 'Input',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-elements/number-input',
                    name: 'admin-form-element-number-input',
                    component: () => import('./views/forms/form-elements/number-input/NumberInput.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Number Input', active: true },
                        ],
                        pageTitle: 'Number Input',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-elements/textarea',
                    name: 'admin-form-element-textarea',
                    component: () => import('./views/forms/form-elements/textarea/Textarea.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Textarea', active: true },
                        ],
                        pageTitle: 'Textarea',
                        rule: 'editor'
                    },
                },
        // -------------------------------------------------------------------------------------------------------------------------------------------
                {
                    path: '/admin/forms/form-layouts',
                    name: 'admin-forms-form-layouts',
                    component: () => import('@/views/forms/FormLayouts.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Forms' },
                            { title: 'Form Layouts', active: true },
                        ],
                        pageTitle: 'Form Layouts',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-wizard',
                    name: 'admin-extra-component-form-wizard',
                    component: () => import('@/views/forms/form-wizard/FormWizard.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Form Wizard', active: true },
                        ],
                        pageTitle: 'Form Wizard',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/forms/form-validation',
                    name: 'admin-extra-component-form-validation',
                    component: () => import('@/views/forms/form-validation/FormValidation.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Form Validation', active: true },
                        ],
                        pageTitle: 'Form Validation',
                        rule: 'editor'
                    },
                },
                {
                  path: '/admin/forms/form-input-group',
                  name: 'admin-extra-component-form-input-group',
                  component: () => import('@/views/forms/form-input-group/FormInputGroup.vue'),
                  meta: {
                      breadcrumb: [
                          { title: 'Home', url: '/' },
                          { title: 'Extra Components' },
                          { title: 'Form Input Group', active: true },
                      ],
                      pageTitle: 'Form Input Group',
                      rule: 'editor'
                  },
                },

        // =============================================================================
        // Pages Routes
        // =============================================================================
                {
                    path: '/admin/pages/profile',
                    name: 'admin-page-profile',
                    component: () => import('@/views/pages/Profile.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'Profile', active: true },
                        ],
                        pageTitle: 'Profile',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/user-settings',
                    name: 'admin-page-user-settings',
                    component: () => import('@/views/pages/user-settings/UserSettings.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'User Settings', active: true },
                        ],
                        pageTitle: 'Settings',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/faq',
                    name: 'admin-page-faq',
                    component: () => import('@/views/pages/Faq.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'FAQ', active: true },
                        ],
                        pageTitle: 'FAQ',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/knowledge-base',
                    name: 'admin-page-knowledge-base',
                    component: () => import('@/views/pages/KnowledgeBase.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', active: true },
                        ],
                        pageTitle: 'KnowledgeBase',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/knowledge-base/category',
                    name: 'admin-page-knowledge-base-category',
                    component: () => import('@/views/pages/KnowledgeBaseCategory.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', url: '/pages/knowledge-base' },
                            { title: 'Category', active: true },
                        ],
                        parent: 'page-knowledge-base',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/knowledge-base/category/question',
                    name: 'admin-page-knowledge-base-category-question',
                    component: () => import('@/views/pages/KnowledgeBaseCategoryQuestion.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', url: '/pages/knowledge-base' },
                            { title: 'Category', url: '/pages/knowledge-base/category' },
                            { title: 'Question', active: true },
                        ],
                        parent: 'page-knowledge-base',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/search',
                    name: 'admin-page-search',
                    component: () => import('@/views/pages/Search.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'Search', active: true },
                        ],
                        pageTitle: 'Search',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/pages/invoice',
                    name: 'admin-page-invoice',
                    component: () => import('@/views/pages/Invoice.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'Invoice', active: true },
                        ],
                        pageTitle: 'Invoice',
                        rule: 'editor'
                    },
                },

        // =============================================================================
        // CHARTS & MAPS
        // =============================================================================
                {
                    path: '/admin/charts-and-maps/charts/apex-charts',
                    name: 'admin-extra-component-charts-apex-charts',
                    component: () => import('@/views/charts-and-maps/charts/apex-charts/ApexCharts.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Charts & Maps' },
                            { title: 'Apex Charts', active: true },
                        ],
                        pageTitle: 'Apex Charts',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/charts-and-maps/charts/echarts',
                    name: 'admin-extra-component-charts-echarts',
                    component: () => import('@/views/charts-and-maps/charts/echarts/Echarts.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Charts & Maps' },
                            { title: 'echarts', active: true },
                        ],
                        pageTitle: 'echarts',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/charts-and-maps/maps/google-map',
                    name: 'admin-extra-component-maps-google-map',
                    component: () => import('@/views/charts-and-maps/maps/google-map/GoogleMap.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Charts & Maps' },
                            { title: 'Google Map', active: true },
                        ],
                        pageTitle: 'Google Map',
                        rule: 'editor'
                    },
                },



        // =============================================================================
        // EXTENSIONS
        // =============================================================================
                {
                    path: '/admin/extensions/select',
                    name: 'admin-extra-component-select',
                    component: () => import('@/views/components/extra-components/select/Select.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Select', active: true },
                        ],
                        pageTitle: 'Select',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/quill-editor',
                    name: 'admin-extra-component-quill-editor',
                    component: () => import('@/views/components/extra-components/quill-editor/QuillEditor.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Quill Editor', active: true },
                        ],
                        pageTitle: 'Quill Editor',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/drag-and-drop',
                    name: 'admin-extra-component-drag-and-drop',
                    component: () => import('@/views/components/extra-components/drag-and-drop/DragAndDrop.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Drag & Drop', active: true },
                        ],
                        pageTitle: 'Drag & Drop',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/datepicker',
                    name: 'admin-extra-component-datepicker',
                    component: () => import('@/views/components/extra-components/datepicker/Datepicker.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Datepicker', active: true },
                        ],
                        pageTitle: 'Datepicker',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/datetime-picker',
                    name: 'admin-extra-component-datetime-picker',
                    component: () => import('@/views/components/extra-components/datetime-picker/DatetimePicker.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Datetime Picker', active: true },
                        ],
                        pageTitle: 'Datetime Picker',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/access-control',
                    name: 'admin-extra-component-access-control',
                    component: () => import('@/views/components/extra-components/access-control/AccessControl.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Access Control', active: true },
                        ],
                        pageTitle: 'Access Control',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/i18n',
                    name: 'admin-extra-component-i18n',
                    component: () => import('@/views/components/extra-components/I18n.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'I18n', active: true },
                        ],
                        pageTitle: 'I18n',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/carousel',
                    name: 'admin-extra-component-carousel',
                    component: () => import('@/views/components/extra-components/carousel/Carousel.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Carousel', active: true },
                        ],
                        pageTitle: 'Carousel',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/clipboard',
                    name: 'admin-extra-component-clipboard',
                    component: () => import('@/views/components/extra-components/clipboard/Clipboard.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Clipboard', active: true },
                        ],
                        pageTitle: 'Clipboard',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/context-menu',
                    name: 'admin-extra-component-context-menu',
                    component: () => import('@/views/components/extra-components/context-menu/ContextMenu.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Context Menu', active: true },
                        ],
                        pageTitle: 'Context Menu',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/star-ratings',
                    name: 'admin-extra-component-star-ratings',
                    component: () => import('@/views/components/extra-components/star-ratings/StarRatings.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Star Ratings', active: true },
                        ],
                        pageTitle: 'Star Ratings',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/autocomplete',
                    name: 'admin-extra-component-autocomplete',
                    component: () => import('@/views/components/extra-components/autocomplete/Autocomplete.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Autocomplete', active: true },
                        ],
                        pageTitle: 'Autocomplete',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/extensions/tree',
                    name: 'admin-extra-component-tree',
                    component: () => import('@/views/components/extra-components/tree/Tree.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Tree', active: true },
                        ],
                        pageTitle: 'Tree',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/import-export/import',
                    name: 'admin-import-excel',
                    component: () => import('@/views/components/extra-components/import-export/Import.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Import', active: true },
                        ],
                        pageTitle: 'Import Excel',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/import-export/export',
                    name: 'admin-export-excel',
                    component: () => import('@/views/components/extra-components/import-export/Export.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Export', active: true },
                        ],
                        pageTitle: 'Export Excel',
                        rule: 'editor'
                    },
                },
                {
                    path: '/admin/import-export/export-selected',
                    name: 'admin-export-excel-selected',
                    component: () => import('@/views/components/extra-components/import-export/ExportSelected.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Export Selected', active: true },
                        ],
                        pageTitle: 'Export Excel',
                        rule: 'editor'
                    },
                },
            ],
        },
    // =============================================================================
    // FULL PAGE LAYOUTS
    // =============================================================================
        {
            path: '/admin',
            component: () => import('@/layouts/full-page/FullPage.vue'),
            children: [
        // =============================================================================
        // PAGES
        // =============================================================================
                {
                    path: '/admin/callback',
                    name: 'admin-callback',        // admin-auth-callback
                    component: () => import('@/views/Callback.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/login',
                    name: 'admin-page-login',
                    component: () => import('@/views/pages/login/Login.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/register',
                    name: 'admin-page-register',
                    component: () => import('@/views/pages/register/Register.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/forgot-password',
                    name: 'admin-page-forgot-password',
                    component: () => import('@/views/pages/ForgotPassword.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/reset-password',
                    name: 'admin-page-reset-password',
                    component: () => import('@/views/pages/ResetPassword.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/lock-screen',
                    name: 'admin-page-lock-screen',
                    component: () => import('@/views/pages/LockScreen.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/comingsoon',
                    name: 'admin-page-coming-soon',
                    component: () => import('@/views/pages/ComingSoon.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/error-404',
                    name: 'admin-page-error-404',
                    component: () => import('@/views/pages/Error404.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/error-500',
                    name: 'admin-page-error-500',
                    component: () => import('@/views/pages/Error500.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/not-authorized',
                    name: 'admin-page-not-authorized',
                    component: () => import('@/views/pages/NotAuthorized.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
                {
                    path: '/admin/pages/maintenance',
                    name: 'admin-page-maintenance',
                    component: () => import('@/views/pages/Maintenance.vue'),
                    meta: {
                        rule: 'guest'
                    }
                },
            ]
        },
        // Redirect to 404 page, if no match found
        {
            path: '/admin/*',
            redirect: '/admin/pages/error-404'
        }
    ],
})

router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
    if (appLoading) {
        appLoading.style.display = "none";
    }
})

router.beforeEach((to, from, next) => {
    console.log('IsAuth:', auth.isAuthenticated());
    console.log('To route name:', to.name);

    // firebase.auth().onAuthStateChanged(() => {

        // get firebase current user
        // const firebaseCurrentUser = firebase.auth().currentUser

        // if (!auth.isAuthenticated()) {
        //     router.push({ name: 'admin-page-login', query: { to: to.path } })
        // }

        // If auth required, check login. If login fails redirect to login page
        // if(to.meta.authRequired) {
        //     if (!auth.isAuthenticated()) {
        //         router.push({ name: 'admin-page-login', query: { to: to.path } })
        //     }
        // }

        // if (auth.isAuthenticated()) {
            
        // }


        // if (
        //     to.name === 'admin-page-login' ||
        //     to.name === 'admin-page-register' ||
        //     to.name === 'admin-page-forgot-password' ||
        //     to.name === 'admin-page-reset-password' ||
        //     to.name === 'admin-page-error-404' ||
        //     to.name === 'admin-page-error-500' ||
        //     to.name === 'admin-callback' ||
        //     to.name === 'admin-page-coming-soon' ||
        //     to.name === 'admin-page-not-authorized' // ||
        // ) {
        //     if (auth.isAuthenticated()) {
        //         router.push({ name: 'admin-dashboard' });
        //     } else {
        //         // router.push({ name: 'admin-page-login' });
        //         // router.push({ name: 'admin-page-login' })
        //     }
        // }

        

        return next();
        // Specify the current path as the customState parameter, meaning it
        // will be returned to the application after auth
        // auth.login({ target: to.path });

    // });

});

export default router
