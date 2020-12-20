/*=========================================================================================
  File Name: sidebarItems.js
  Description: Sidebar Items list. Add / Remove menu items from here.
  Strucutre:
          url     => router path
          name    => name to display in sidebar
          slug    => router path name
          icon    => Feather Icon component/icon name
          tag     => text to display on badge
          tagColor  => class to apply on badge element
          i18n    => Internationalization
          submenu   => submenu of current item (current item will become dropdown )
                NOTE: Submenu don't have any icon(you can add icon if u want to display)
          isDisabled  => disable sidebar item/group
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default [
    // {
    //   url: "/admin/apps/email",
    //   name: "Email",
    //   slug: "admin-email",
    //   icon: "MailIcon",
    //   i18n: "Email",
    // },
    {
        url: null,
        name: "Dashboard",
        tag: "2",
        tagColor: "warning",
        icon: "HomeIcon",
        i18n: "Dashboard",
        submenu: [{
                url: '/admin/dashboard/analytics',
                name: "Analytics",
                slug: "admin-dashboard-analytics",
                i18n: "Analytics",
            },
            {
                url: '/admin/dashboard/ecommerce',
                name: "eCommerce",
                slug: "admin-dashboard-ecommerce",
                i18n: "eCommerce",
            },
        ]
    },
    {
        header: "Apps",
        icon: "PackageIcon",
        i18n: "Apps",
        items: [{
                url: "/admin/apps/email",
                name: "Email",
                slug: "admin-email",
                icon: "MailIcon",
                i18n: "Email",
            },
            {
                url: "/admin/apps/chat",
                name: "Chat",
                slug: "admin-chat",
                icon: "MessageSquareIcon",
                i18n: "Chat",
            },
            {
                url: "/admin/apps/todo",
                name: "Todo",
                slug: "admin-todo",
                icon: "CheckSquareIcon",
                i18n: "Todo",
            },
            {
                url: "/admin/apps/calendar/vue-simple-calendar",
                name: "Calendar",
                slug: "admin-calendar-simple-calendar",
                icon: "CalendarIcon",
                tagColor: "success",
                i18n: "Calendar",
            },
            {
                url: null,
                name: "eCommerce",
                icon: "ShoppingCartIcon",
                i18n: "eCommerce",
                submenu: [{
                        url: '/admin/apps/eCommerce/shop',
                        name: "Shop",
                        slug: "admin-ecommerce-shop",
                        i18n: "Shop",
                    },
                    {
                        url: '/admin/apps/eCommerce/item/',
                        name: "Item Details",
                        slug: "admin-ecommerce-item-detail-view",
                        i18n: "ItemDetails",
                    },
                    {
                        url: '/admin/apps/eCommerce/wish-list',
                        name: "Wish List",
                        slug: "admin-ecommerce-wish-list",
                        i18n: "WishList",
                    },
                    {
                        url: '/admin/apps/eCommerce/checkout',
                        name: "Checkout",
                        slug: "admin-ecommerce-checkout",
                        i18n: "Checkout",
                    },
                ]
            },
            {
                url: null,
                name: "Managements",
                icon: "UserIcon",
                i18n: "managements",
                submenu: [
                    {
                        url: '/admin/apps/user/user-list',
                        name: "Users",
                        slug: "admin-app-user-list",
                        i18n: "users",
                    },
                    {
                        url: '/admin/announcements',
                        name: "announcements",
                        slug: "admin-announcements",
                        i18n: "announcements",
                    },
                    {
                        url: '/admin/announcements/categories',
                        name: "Categories",
                        slug: "admin-announcements-categories",
                        i18n: "categories",
                    }
                    // {
                    //     url: '/admin/apps/user/user-view/268',
                    //     name: "View",
                    //     slug: "admin-app-user-view",
                    //     i18n: "View",
                    // },
                    // {
                    //     url: '/admin/apps/user/user-edit/268',
                    //     name: "Edit",
                    //     slug: "admin-app-user-edit",
                    //     i18n: "Edit",
                    // },
                ]
            },
        ]
    },
    {
        header: "UI",
        icon: "LayersIcon",
        i18n: "UI",
        items: [{
                url: null,
                name: "Data List",
                tag: "new",
                tagColor: "primary",
                icon: "ListIcon",
                i18n: "DataList",
                submenu: [{
                        url: '/admin/ui-elements/data-list/list-view',
                        name: "List View",
                        slug: "admin-data-list-list-view",
                        i18n: "ListView",
                    },
                    {
                        url: '/admin/ui-elements/data-list/thumb-view',
                        name: "Thumb View",
                        slug: "admin-data-list-thumb-view",
                        i18n: "ThumbView",
                    },
                ]
            },
            {
                url: null,
                name: "Grid",
                icon: "LayoutIcon",
                i18n: "Grid",
                submenu: [{
                        url: '/admin/ui-elements/grid/vuesax',
                        name: "Vuesax",
                        slug: "admin-grid-vuesax",
                        i18n: "Vuesax",
                    },
                    {
                        url: '/admin/ui-elements/grid/tailwind',
                        name: "Tailwind",
                        slug: "admin-grid-tailwind",
                        i18n: "Tailwind",
                    },
                ]
            },
            {
                url: "/ui-elements/colors",
                name: "Colors",
                slug: "admin-colors",
                icon: "DropletIcon",
                i18n: "Colors",
            },
            {
                url: null,
                name: "Card",
                icon: "CreditCardIcon",
                i18n: "Card",
                submenu: [{
                        url: '/admin/ui-elements/card/basic',
                        name: "Basic",
                        slug: "admin-basic-cards",
                        i18n: "Basic",
                    },
                    {
                        url: '/admin/ui-elements/card/statistics',
                        name: "Statistics",
                        slug: "admin-statistics-cards",
                        i18n: "Statistics",
                    },
                    {
                        url: '/admin/ui-elements/card/analytics',
                        name: "Analytics",
                        slug: "admin-analytics-cards",
                        i18n: "Analytics",
                    },
                    {
                        url: '/admin/ui-elements/card/card-actions',
                        name: "Card Actions",
                        slug: "admin-card-actions",
                        i18n: "CardActions",
                    },
                    {
                        url: '/admin/ui-elements/card/card-colors',
                        name: "Card Colors",
                        slug: "admin-card-colors",
                        i18n: "CardColors",
                    }
                ]
            },
            {
                url: null,
                name: "Components",
                icon: "ArchiveIcon",
                i18n: "Components",
                submenu: [{
                        url: '/admin/components/alert',
                        name: "Alert",
                        slug: "admin-component-alert",
                        i18n: "Alert",
                    },
                    {
                        url: '/admin/components/avatar',
                        name: "Avatar",
                        slug: "admin-component-avatar",
                        i18n: "Avatar",
                    },
                    {
                        url: '/admin/components/breadcrumb',
                        name: "Breadcrumb",
                        slug: "admin-component-breadcrumb",
                        i18n: "Breadcrumb",
                    },
                    {
                        url: '/admin/components/button',
                        name: "Button",
                        slug: "admin-component-button",
                        i18n: "Button",
                    },
                    {
                        url: '/admin/components/button-group',
                        name: "Button Group",
                        slug: "admin-component-button-group",
                        i18n: "ButtonGroup",
                    },
                    {
                        url: '/admin/components/chip',
                        name: "Chip",
                        slug: "admin-component-chip",
                        i18n: "Chip",
                    },
                    {
                        url: '/admin/components/collapse',
                        name: "Collapse",
                        slug: "admin-component-collapse",
                        i18n: "Collapse",
                    },
                    {
                        url: '/admin/components/dialogs',
                        name: "Dialogs",
                        slug: "admin-component-dialog",
                        i18n: "Dialogs",
                    },
                    {
                        url: '/admin/components/divider',
                        name: "Divider",
                        slug: "admin-component-divider",
                        i18n: "Divider",
                    },
                    {
                        url: '/admin/components/dropdown',
                        name: "DropDown",
                        slug: "admin-component-drop-down",
                        i18n: "DropDown",
                    },
                    {
                        url: '/admin/components/list',
                        name: "List",
                        slug: "admin-component-list",
                        i18n: "List",
                    },
                    {
                        url: '/admin/components/loading',
                        name: "Loading",
                        slug: "admin-component-loading",
                        i18n: "Loading",
                    },
                    {
                        url: '/admin/components/navbar',
                        name: "Navbar",
                        slug: "admin-component-navbar",
                        i18n: "Navbar",
                    },
                    {
                        url: '/admin/components/notifications',
                        name: "Notifications",
                        slug: "admin-component-notifications",
                        i18n: "Notifications",
                    },
                    {
                        url: '/admin/components/pagination',
                        name: "Pagination",
                        slug: "admin-component-pagination",
                        i18n: "Pagination",
                    },
                    {
                        url: '/admin/components/popup',
                        name: "Popup",
                        slug: "admin-component-popup",
                        i18n: "Popup",
                    },
                    {
                        url: '/admin/components/progress',
                        name: "Progress",
                        slug: "admin-component-progress",
                        i18n: "Progress",
                    },
                    {
                        url: '/admin/components/sidebar',
                        name: "Sidebar",
                        slug: "admin-component-sidebar",
                        i18n: "Sidebar",
                    },
                    {
                        url: '/admin/components/slider',
                        name: "Slider",
                        slug: "admin-component-slider",
                        i18n: "Slider",
                    },
                    {
                        url: '/admin/components/tabs',
                        name: "Tabs",
                        slug: "admin-component-tabs",
                        i18n: "Tabs",
                    },
                    {
                        url: '/admin/components/tooltip',
                        name: "Tooltip",
                        slug: "admin-component-tooltip",
                        i18n: "Tooltip",
                    },
                    {
                        url: '/admin/components/upload',
                        name: "Upload",
                        slug: "admin-component-upload",
                        i18n: "Upload",
                    },
                ]
            },
            {
                url: null,
                name: "Extensions",
                icon: "PlusCircleIcon",
                i18n: "Extensions",
                submenu: [{
                        url: '/admin/extensions/select',
                        name: "Select",
                        icon: "PocketIcon",
                        slug: "admin-extra-component-select",
                        i18n: "Select",
                    },
                    {
                        url: '/admin/extensions/quill-editor',
                        name: "Quill Editor",
                        icon: "EditIcon",
                        slug: "admin-extra-component-quill-editor",
                        i18n: "QuillEditor",
                    },
                    {
                        url: '/admin/extensions/drag-and-drop',
                        name: "Drag & Drop",
                        icon: "DropletIcon",
                        slug: "admin-extra-component-drag-and-drop",
                        i18n: "DragAndDrop",
                    },
                    {
                        url: '/admin/extensions/datepicker',
                        name: "Datepicker",
                        icon: "CalendarIcon",
                        slug: "admin-extra-component-datepicker",
                        i18n: "Datepicker",
                    },
                    {
                        url: '/admin/extensions/datetime-picker',
                        name: "Datetime Picker",
                        icon: "ClockIcon",
                        slug: "admin-extra-component-datetime-picker",
                        i18n: "DatetimePicker",
                    },
                    {
                        url: '/admin/extensions/access-control',
                        name: "Access Control",
                        slug: "admin-extra-component-access-control",
                        i18n: "AccessControl",
                    },
                    {
                        url: '/admin/extensions/i18n',
                        name: "I18n",
                        slug: "admin-extra-component-i18n",
                        i18n: "I18n",
                    },
                    {
                        url: '/admin/extensions/carousel',
                        name: "Carousel",
                        icon: "LayersIcon",
                        slug: "admin-extra-component-carousel",
                        i18n: "Carousel",
                    },
                    {
                        url: '/admin/extensions/clipboard',
                        name: "Clipboard",
                        icon: "CopyIcon",
                        slug: "admin-extra-component-clipboard",
                        i18n: "Clipboard",
                    },
                    {
                        url: '/admin/extensions/context-menu',
                        name: "Context Menu",
                        icon: "MoreHorizontalIcon",
                        slug: "admin-extra-component-context-menu",
                        i18n: "ContextMenu",
                    },
                    {
                        url: '/admin/extensions/star-ratings',
                        name: "Star Ratings",
                        icon: "StarIcon",
                        slug: "admin-extra-component-star-ratings",
                        i18n: "StarRatings",
                    },
                    {
                        url: '/admin/extensions/autocomplete',
                        name: "Autocomplete",
                        icon: "Edit3Icon",
                        slug: "admin-extra-component-autocomplete",
                        i18n: "Autocomplete",
                    },
                    {
                        url: '/admin/extensions/tree',
                        name: "Tree",
                        icon: "GitPullRequestIcon",
                        slug: "admin-extra-component-tree",
                        i18n: "Tree",
                    },
                    // {
                    //   name: "Import/Export",
                    //   i18n: "Import/Export",
                    //   submenu: [

                    //   ]
                    // },
                    {
                        url: "/import-export/import",
                        name: "Import",
                        icon: "HomeIcon",
                        slug: "admin-import",
                        i18n: "Import"
                    },
                    {
                        url: "/import-export/export",
                        name: "Export",
                        icon: "HomeIcon",
                        slug: "admin-export",
                        i18n: "Export"
                    },
                    {
                        url: "/import-export/export-selected",
                        name: "Export Selected",
                        icon: "HomeIcon",
                        slug: "admin-export-selected",
                        i18n: "ExportSelected"
                    }
                ]
            },
        ]
    },
    {
        header: "Forms & Table",
        icon: "Edit3Icon",
        i18n: "FormsAndTable",
        items: [{
                url: null,
                name: "Form Elements",
                icon: "CopyIcon",
                i18n: "FormElements",
                submenu: [
                    // {
                    //  url: '/admin/forms/form-elements/select',
                    //  name: "Select",
                    //  slug: "admin-form-element-select",
                    //  i18n: "Select",
                    // },
                    {
                        url: '/admin/forms/form-elements/switch',
                        name: "Switch",
                        slug: "admin-form-element-switch",
                        i18n: "Switch",
                    },
                    {
                        url: '/admin/forms/form-elements/checkbox',
                        name: "Checkbox",
                        slug: "admin-form-element-checkbox",
                        i18n: "Checkbox",
                    },
                    {
                        url: '/admin/forms/form-elements/radio',
                        name: "Radio",
                        slug: "admin-form-element-radio",
                        i18n: "Radio",
                    },
                    {
                        url: '/admin/forms/form-elements/input',
                        name: "Input",
                        slug: "admin-form-element-input",
                        i18n: "Input",
                    },
                    {
                        url: '/admin/forms/form-elements/number-input',
                        name: "Number Input",
                        slug: "admin-form-element-number-input",
                        i18n: "NumberInput",
                    },
                    {
                        url: '/admin/forms/form-elements/textarea',
                        name: "Textarea",
                        slug: "admin-form-element-textarea",
                        i18n: "Textarea",
                    },
                ]
            },
            {
                url: '/admin/forms/form-layouts',
                name: "Form Layouts",
                icon: "PackageIcon",
                slug: "admin-forms-form-layouts",
                i18n: "FormLayouts",
            },
            {
                url: '/admin/forms/form-wizard',
                name: "Form Wizard",
                icon: "PackageIcon",
                slug: "admin-extra-component-form-wizard",
                i18n: "FormWizard",
            },
            {
                url: '/admin/forms/form-validation',
                name: "Form Validation",
                icon: "CheckCircleIcon",
                slug: "admin-extra-component-form-validation",
                i18n: "FormValidation",
            },
            {
                url: '/admin/forms/form-input-group',
                name: "Form Input Group",
                icon: "MenuIcon",
                slug: "admin-extra-component-form-input-group",
                i18n: "FormInputGroup",
            },
            {
                url: "/ui-elements/table",
                name: "Table",
                slug: "admin-table",
                icon: "GridIcon",
                i18n: "Table",
            },
            {
                url: "/ui-elements/ag-grid-table",
                name: "agGrid Table",
                slug: "admin-ag-grid-table",
                icon: "GridIcon",
                i18n: "agGridTable",
            },
        ]
    },
    {
        header: "Pages",
        icon: "FileIcon",
        i18n: "Pages",
        items: [{
                url: '/admin/pages/profile',
                slug: 'page-profile',
                name: "Profile",
                icon: "UserIcon",
                i18n: "Profile",
            },
            {
                url: '/admin/pages/user-settings',
                slug: 'page-user-settings',
                name: "User Settings",
                icon: "SettingsIcon",
                i18n: "UserSettings",
            },
            {
                url: '/admin/pages/faq',
                slug: 'page-faq',
                name: "FAQ",
                icon: "HelpCircleIcon",
                i18n: "FAQ",
            },
            {
                url: '/admin/pages/knowledge-base',
                slug: 'page-knowledge-base',
                name: "Knowledge Base",
                icon: "InfoIcon",
                i18n: "KnowledgeBase",
            },
            {
                url: '/admin/pages/search',
                slug: 'page-search',
                name: "Search",
                icon: "SearchIcon",
                i18n: "Search",
            },
            {
                url: '/admin/pages/invoice',
                slug: 'page-invoice',
                name: "Invoice",
                icon: "InfoIcon",
                i18n: "Invoice",
            },
            {
                url: null,
                name: "Authentication",
                icon: "PieChartIcon",
                i18n: "Authentication",
                submenu: [{
                        url: '/admin/pages/login',
                        name: "Login",
                        slug: "admin-pages-login",
                        i18n: "Login",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/register',
                        name: "Register",
                        slug: "admin-pages-register",
                        i18n: "Register",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/forgot-password',
                        name: "Forgot Password",
                        slug: "admin-pages-forgot-password",
                        i18n: "ForgotPassword",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/reset-password',
                        name: "Reset Password",
                        slug: "admin-pages-reset-password",
                        i18n: "ResetPassword",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/lock-screen',
                        name: "Lock Screen",
                        slug: "admin-pages-lock-screen",
                        i18n: "LockScreen",
                        target: '_blank',
                    },
                ]
            },
            {
                url: null,
                name: "Miscellaneous",
                icon: "CoffeeIcon",
                i18n: "Miscellaneous",
                submenu: [{
                        url: '/admin/pages/not-authorized',
                        name: "Not Authorized",
                        slug: "admin-page-not-authorized",
                        icon: "XCircleIcon",
                        i18n: "NotAuthorized",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/maintenance',
                        name: "Maintenance",
                        slug: "admin-page-maintenance",
                        icon: "AnchorIcon",
                        i18n: "Maintenance",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/comingsoon',
                        slug: 'page-coming-soon',
                        name: "Coming Soon",
                        icon: "ClockIcon",
                        i18n: "ComingSoon",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/error-404',
                        name: "404",
                        slug: "admin-page-error-404",
                        i18n: "404",
                        target: '_blank',
                    },
                    {
                        url: '/admin/pages/error-500',
                        name: "500",
                        slug: "admin-page-error-500",
                        i18n: "500",
                        target: '_blank',
                    }
                ]
            },
        ]
    },
    {
        header: "Charts & Maps",
        icon: "PieChartIcon",
        i18n: "ChartsAndMaps",
        items: [{
                url: null,
                name: "Charts",
                icon: "PieChartIcon",
                tag: '3',
                tagColor: 'success',
                i18n: "Charts",
                submenu: [{
                        url: '/admin/charts-and-maps/charts/apex-charts',
                        name: "Apex Charts",
                        slug: "admin-extra-component-charts-apex-charts",
                        i18n: "ApexCharts",
                    },
                    {
                        url: '/admin/charts-and-maps/charts/chartjs',
                        name: "chartjs",
                        slug: "admin-extra-component-charts-chartjs",
                        i18n: "chartjs",
                    },
                    {
                        url: '/admin/charts-and-maps/charts/echarts',
                        name: "echarts",
                        slug: "admin-extra-component-charts-echarts",
                        i18n: "echarts",
                    },
                ]
            },
            {
                url: '/admin/charts-and-maps/maps/google-map',
                name: "Google Map",
                icon: "MapIcon",
                slug: "admin-extra-component-maps-google-map",
                i18n: "GoogleMap",
            },
        ]
    },
    {
        header: "Others",
        icon: "MoreHorizontalIcon",
        i18n: "Others",
        items: [{
                url: null,
                name: "Menu Levels",
                icon: "MenuIcon",
                i18n: "MenuLevels",
                submenu: [{
                        url: null,
                        name: "Menu Level 2.1",
                        i18n: "MenuLevel2p1",
                    },
                    {
                        url: null,
                        name: "Menu Level 2.2",
                        i18n: "MenuLevel2p2",
                        submenu: [{
                                url: null,
                                name: "Menu Level 3.1",
                                i18n: "MenuLevel3p1",
                            },
                            {
                                url: null,
                                name: "Menu Level 3.2",
                                i18n: "MenuLevel3p2",
                            },
                        ]
                    },
                ]
            },
            {
                url: null,
                name: "Disabled Menu",
                icon: "EyeOffIcon",
                i18n: "DisabledMenu",
                isDisabled: true,
            },
            {
                url: null,
                name: "Support",
                icon: "SmileIcon",
                i18n: "Support",
                submenu: [{
                        url: 'https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/',
                        name: "Documentation",
                        icon: "BookOpenIcon",
                        slug: "admin-external",
                        i18n: "Documentation",
                        target: "_blank"
                    },
                    {
                        url: 'https://pixinvent.ticksy.com/',
                        name: "Raise Support",
                        icon: "LifeBuoyIcon",
                        slug: "admin-external",
                        i18n: "RaiseSupport",
                        target: "_blank"
                    },
                ]
            },
        ]
    },
]
