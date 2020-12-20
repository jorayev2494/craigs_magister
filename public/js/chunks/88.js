(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[88],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-instantsearch */ "./node_modules/vue-instantsearch/dist/vue-instantsearch.esm.js");
/* harmony import */ var algoliasearch_lite__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! algoliasearch/lite */ "./node_modules/algoliasearch/src/browser/builds/algoliasearchLite.js");
/* harmony import */ var algoliasearch_lite__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(algoliasearch_lite__WEBPACK_IMPORTED_MODULE_2__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    ItemGridView: function ItemGridView() {
      return __webpack_require__.e(/*! import() */ 96).then(__webpack_require__.bind(null, /*! ./components/ItemGridView.vue */ "./resources/js/src/views/apps/announcement/components/ItemGridView.vue"));
    },
    ItemListView: function ItemListView() {
      return __webpack_require__.e(/*! import() */ 97).then(__webpack_require__.bind(null, /*! ./components/ItemListView.vue */ "./resources/js/src/views/apps/announcement/components/ItemListView.vue"));
    },
    AisClearRefinements: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisClearRefinements"],
    AisConfigure: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisConfigure"],
    AisHierarchicalMenu: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisHierarchicalMenu"],
    AisHits: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisHits"],
    AisInstantSearch: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisInstantSearch"],
    AisNumericMenu: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisNumericMenu"],
    AisPagination: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisPagination"],
    AisRangeInput: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisRangeInput"],
    AisRatingMenu: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisRatingMenu"],
    AisRefinementList: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisRefinementList"],
    AisSearchBox: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisSearchBox"],
    AisSortBy: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisSortBy"],
    AisStats: vue_instantsearch__WEBPACK_IMPORTED_MODULE_1__["AisStats"]
  },
  data: function data() {
    return {
      searchClient: algoliasearch_lite__WEBPACK_IMPORTED_MODULE_2___default()('latency', '6be0576ff61c053d5f9a3225e2a90f76'),
      // Filter Sidebar
      isFilterSidebarActive: true,
      clickNotClose: true,
      currentItemView: 'item-grid-view',
      numericItems: [{
        label: 'All'
      }, {
        label: '<= $10',
        end: 10
      }, {
        label: '$10 - $100',
        start: 10,
        end: 100
      }, {
        label: '$100 - $500',
        start: 100,
        end: 500
      }, {
        label: '>= $500',
        start: 500
      }],
      algoliaCategories: ['hierarchicalCategories.lvl0', 'hierarchicalCategories.lvl1', 'hierarchicalCategories.lvl2', 'hierarchicalCategories.lvl3'],
      announcements: [],
      accouncementDeleteId: null,
      categories: null
    };
  },
  methods: {
    setSidebarWidth: function setSidebarWidth() {
      if (this.windowWidth < 992) {
        this.isFilterSidebarActive = this.clickNotClose = false;
      } else {
        this.isFilterSidebarActive = this.clickNotClose = true;
      }
    },
    // GRID VIEW - ACTIONS
    toggleFilterSidebar: function toggleFilterSidebar() {
      if (this.clickNotClose) return;
      this.isFilterSidebarActive = !this.isFilterSidebarActive;
    },
    toggleItemInWishList: function toggleItemInWishList(item) {
      this.$store.dispatch('eCommerce/toggleItemInWishList', item);
    },
    additemInCart: function additemInCart(item) {
      this.$store.dispatch('eCommerce/additemInCart', item);
    },
    cartButtonClicked: function cartButtonClicked(item) {
      this.isInCart(item.objectID) ? this.$router.push('/apps/eCommerce/checkout')["catch"](function () {}) : this.additemInCart(item);
    },
    openConfirmDelete: function openConfirmDelete(event, accouncement) {
      this.accouncementDeleteId = accouncement.id;
      var test = this.$vs.dialog({
        type: 'confirm',
        color: 'danger',
        title: 'Confirm',
        text: "You want delete ".concat(accouncement.title, "?"),
        accept: this.accouncementDelete
      });
    },
    accouncementDelete: function accouncementDelete() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                if (!(_this.accouncementDeleteId != null)) {
                  _context.next = 4;
                  break;
                }

                _context.next = 3;
                return _this.$http["delete"]("/api/admin/managements/announcements/".concat(_this.accouncementDeleteId)).then(function (response) {
                  if (response.status == 204) {
                    _this.acceptAlert();
                  }
                })["catch"](function (err) {});

              case 3:
                _this.accouncementDeleteId = null;

              case 4:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    acceptAlert: function acceptAlert() {
      this.$vs.notify({
        color: 'danger',
        title: 'Deleted image',
        text: 'The selected image was successfully deleted'
      });
    },
    loadAnnouncements: function loadAnnouncements() {
      var _arguments = arguments,
          _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var page;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                page = _arguments.length > 0 && _arguments[0] !== undefined ? _arguments[0] : 1;
                _context2.next = 3;
                return _this2.$http.get('/api/admin/managements/announcements?per_page=16&current_page=' + page).then(function (response) {
                  _this2.announcements = response.data;
                  console.log('Paginated: ', response.data);
                })["catch"](function (err) {});

              case 3:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  },
  computed: {
    toValue: function toValue() {
      return function (value, range) {
        return [value.min !== null ? value.min : range.min, value.max !== null ? value.max : range.max];
      };
    },
    // GRID VIEW
    isInCart: function isInCart() {
      var _this3 = this;

      return function (itemId) {
        return _this3.$store.getters['eCommerce/isInCart'](itemId);
      };
    },
    isInWishList: function isInWishList() {
      var _this4 = this;

      return function (itemId) {
        return _this4.$store.getters['eCommerce/isInWishList'](itemId);
      };
    },
    windowWidth: function windowWidth() {
      return this.$store.state.windowWidth;
    }
  },
  watch: {
    windowWidth: function windowWidth() {
      this.setSidebarWidth();
    }
  },
  created: function created() {
    var _this5 = this;

    return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              _this5.setSidebarWidth();

              _this5.loadAnnouncements(1); // await this.$http.get('/api/admin/managements/announcements').then((response) => {
              //     this.announcements = response.data;
              //     console.log('managements', response);
              // }).catch((err) => {
              // });


              _context3.next = 4;
              return _this5.$http.get('/api/admin/managements/categories').then(function (response) {
                _this5.categories = response.data;
                console.log('categories: ', response);
              })["catch"](function (err) {});

            case 4:
            case "end":
              return _context3.stop();
          }
        }
      }, _callee3);
    }))();
  },
  mounted: function mounted() {
    console.log('Items: ', this.items);
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "#algolia-instant-search-demo .algolia-header .algolia-filters-label {\n  width: calc(260px + 2.4rem);\n}\n#algolia-instant-search-demo #algolia-content-container .vs-sidebar {\n  position: relative;\n}\n[dir=ltr] #algolia-instant-search-demo #algolia-content-container .vs-sidebar {\n  float: left;\n}\n[dir=rtl] #algolia-instant-search-demo #algolia-content-container .vs-sidebar {\n  float: right;\n}\n[dir] #algolia-instant-search-demo .algolia-search-input-right-aligned-icon {\n  padding: 1rem 1.5rem;\n}\n#algolia-instant-search-demo .algolia-price-slider {\n  min-width: unset;\n}\n#algolia-instant-search-demo .item-view-primary-action-btn {\n  color: #2c2c2c !important;\n  min-width: 50%;\n}\n[dir] #algolia-instant-search-demo .item-view-primary-action-btn {\n  background-color: #f6f6f6;\n}\n#algolia-instant-search-demo .item-view-secondary-action-btn {\n  min-width: 50%;\n}\n[dir] .theme-dark #algolia-instant-search-demo #algolia-content-container .vs-sidebar {\n  background-color: #10163a;\n}\n@media (min-width: 992px) {\n[dir] .vs-sidebar-rounded .vs-sidebar {\n    border-radius: 0.5rem;\n}\n[dir] .vs-sidebar-rounded .vs-sidebar--items {\n    border-radius: 0.5rem;\n}\n}\n@media (max-width: 992px) {\n#algolia-content-container .vs-sidebar {\n    position: absolute !important;\n}\n[dir] #algolia-content-container .vs-sidebar {\n    float: none !important;\n}\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListAnnouncements.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=template&id=169dcc6e&":
/*!*************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=template&id=169dcc6e& ***!
  \*************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c(
        "ais-instant-search",
        {
          attrs: {
            "search-client": _vm.searchClient,
            "index-name": "instant_search",
            id: "algolia-instant-search-demo"
          }
        },
        [
          _c("ais-configure", { attrs: { hitsPerPage: 12 } }),
          _vm._v(" "),
          _c("div", { staticClass: "algolia-header mb-4" }, [
            _c(
              "div",
              {
                staticClass:
                  "flex md:items-end items-center justify-between flex-wrap"
              },
              [
                _c("feather-icon", {
                  staticClass: "inline-flex lg:hidden cursor-pointer mr-4",
                  attrs: { icon: "MenuIcon" },
                  on: {
                    click: function($event) {
                      $event.stopPropagation()
                      return _vm.toggleFilterSidebar($event)
                    }
                  }
                }),
                _vm._v(" "),
                _c(
                  "p",
                  {
                    staticClass:
                      "lg:inline-flex hidden font-semibold algolia-filters-label"
                  },
                  [_vm._v("Filters")]
                )
              ],
              1
            )
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              class: { "sidebar-spacer-with-margin": (_vm.clickNotClose = 0) }
            },
            [
              _c("ais-hits", {
                scopedSlots: _vm._u([
                  {
                    key: "default",
                    fn: function(ref) {
                      var items = ref.items
                      return _c(
                        "div",
                        {},
                        [
                          _vm.currentItemView == "item-grid-view"
                            ? [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "items-grid-view vx-row match-height"
                                  },
                                  _vm._l(_vm.announcements.data, function(
                                    item
                                  ) {
                                    return _c(
                                      "div",
                                      {
                                        key: item.id,
                                        staticClass:
                                          "vx-col lg:w-1/4 sm:w-1/2 w-full"
                                      },
                                      [
                                        _c(
                                          "item-grid-view",
                                          { attrs: { item: item } },
                                          [
                                            _c(
                                              "template",
                                              { slot: "action-buttons" },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "flex flex-wrap"
                                                  },
                                                  [
                                                    _c(
                                                      "router-link",
                                                      {
                                                        staticClass:
                                                          "item-view-primary-action-btn p-3 flex flex-grow items-center justify-center cursor-pointer",
                                                        attrs: {
                                                          tag: "div",
                                                          to: {
                                                            name:
                                                              "admin-announcement-show",
                                                            params: {
                                                              id: item.id
                                                            }
                                                          }
                                                        }
                                                      },
                                                      [
                                                        _c("feather-icon", {
                                                          attrs: {
                                                            icon:
                                                              "CreditCardIcon",
                                                            svgClasses: [
                                                              {
                                                                "text-danger fill-current": _vm.isInWishList(
                                                                  item.id
                                                                )
                                                              },
                                                              "h-4 w-4"
                                                            ]
                                                          }
                                                        }),
                                                        _vm._v(" "),
                                                        _c(
                                                          "span",
                                                          {
                                                            staticClass:
                                                              "text-sm font-semibold ml-2"
                                                          },
                                                          [_vm._v("SHOW")]
                                                        )
                                                      ],
                                                      1
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass:
                                                          "item-view-secondary-action-btn bg-danger p-3 flex flex-grow items-center justify-center text-white cursor-pointer",
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            return _vm.openConfirmDelete(
                                                              $event,
                                                              item
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [
                                                        _c("feather-icon", {
                                                          attrs: {
                                                            icon:
                                                              "ShoppingBagIcon",
                                                            svgClasses:
                                                              "h-4 w-4"
                                                          }
                                                        }),
                                                        _vm._v(" "),
                                                        _c(
                                                          "span",
                                                          {
                                                            staticClass:
                                                              "text-sm font-semibold ml-2"
                                                          },
                                                          [_vm._v("DELETE")]
                                                        )
                                                      ],
                                                      1
                                                    )
                                                  ],
                                                  1
                                                )
                                              ]
                                            )
                                          ],
                                          2
                                        )
                                      ],
                                      1
                                    )
                                  }),
                                  0
                                )
                              ]
                            : _vm._e()
                        ],
                        2
                      )
                    }
                  }
                ])
              }),
              _vm._v(" "),
              _c("advanced-laravel-vue-paginate", {
                attrs: { data: _vm.announcements },
                on: { paginateTo: _vm.loadAnnouncements }
              }),
              _vm._v(" "),
              _c("img", {
                staticClass: "flex mt-4 mx-auto h-8",
                attrs: {
                  src: __webpack_require__(/*! @assets/images/pages/eCommerce/Algolia-logo.png */ "./resources/assets/images/pages/eCommerce/Algolia-logo.png"),
                  alt: "algolia-logo"
                }
              })
            ],
            1
          )
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/assets/images/pages/eCommerce/Algolia-logo.png":
/*!******************************************************************!*\
  !*** ./resources/assets/images/pages/eCommerce/Algolia-logo.png ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = "/images/Algolia-logo.png?224640caab6194bdfc027e442bb2374c";

/***/ }),

/***/ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue":
/*!************************************************************************!*\
  !*** ./resources/js/src/views/apps/announcement/ListAnnouncements.vue ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ListAnnouncements_vue_vue_type_template_id_169dcc6e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ListAnnouncements.vue?vue&type=template&id=169dcc6e& */ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=template&id=169dcc6e&");
/* harmony import */ var _ListAnnouncements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ListAnnouncements.vue?vue&type=script&lang=js& */ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ListAnnouncements.vue?vue&type=style&index=0&lang=scss& */ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _ListAnnouncements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ListAnnouncements_vue_vue_type_template_id_169dcc6e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ListAnnouncements_vue_vue_type_template_id_169dcc6e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/apps/announcement/ListAnnouncements.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListAnnouncements.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss& ***!
  \**********************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/style-loader!../../../../../../node_modules/css-loader!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListAnnouncements.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=template&id=169dcc6e&":
/*!*******************************************************************************************************!*\
  !*** ./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=template&id=169dcc6e& ***!
  \*******************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_template_id_169dcc6e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ListAnnouncements.vue?vue&type=template&id=169dcc6e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/announcement/ListAnnouncements.vue?vue&type=template&id=169dcc6e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_template_id_169dcc6e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ListAnnouncements_vue_vue_type_template_id_169dcc6e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);