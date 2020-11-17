(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[84],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/user/UserView.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _store_user_management_moduleUserManagement_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/store/user-management/moduleUserManagement.js */ "./resources/js/src/store/user-management/moduleUserManagement.js");
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
  data: function data() {
    return {
      user_data: null,
      user_not_found: false
    };
  },
  computed: {
    userAddress: function userAddress() {
      var str = "";

      for (var field in this.user_data.location) {
        str += field + " ";
      }

      return str;
    }
  },
  methods: {
    confirmDeleteRecord: function confirmDeleteRecord() {
      this.$vs.dialog({
        type: 'confirm',
        color: 'danger',
        title: "Confirm Delete",
        text: "You are about to delete \"".concat(this.user_data.full_name, "\""),
        accept: this.deleteRecord,
        acceptText: "Delete"
      });
    },
    deleteRecord: function deleteRecord() {
      /* Below two lines are just for demo purpose */
      this.$router.push({
        name: 'app-user-list'
      });
      this.showDeleteSuccess();
      /* UnComment below lines for enabling true flow if deleting user */
      // this.$store.dispatch("userManagement/removeRecord", this.user_data.id)
      //   .then(()   => { this.$router.push({name:'app-user-list'}); this.showDeleteSuccess() })
      //   .catch(err => { console.error(err)       })
    },
    showDeleteSuccess: function showDeleteSuccess() {
      this.$vs.notify({
        color: 'success',
        title: 'User Deleted',
        text: 'The selected user was successfully deleted'
      });
    }
  },
  created: function created() {
    var _this = this;

    // Register Module UserManagement Module
    if (!_store_user_management_moduleUserManagement_js__WEBPACK_IMPORTED_MODULE_0__["default"].isRegistered) {
      this.$store.registerModule('userManagement', _store_user_management_moduleUserManagement_js__WEBPACK_IMPORTED_MODULE_0__["default"]);
      _store_user_management_moduleUserManagement_js__WEBPACK_IMPORTED_MODULE_0__["default"].isRegistered = true;
    }

    var userId = this.$route.params.userId;
    this.$store.dispatch("userManagement/fetchUser", userId).then(function (respose) {
      _this.user_data = respose.data;
    })["catch"](function (err) {
      if (err.response.status === 404) {
        _this.user_not_found = true;
        return;
      }

      console.error(err);
    });
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "#avatar-col {\n  width: 10rem;\n}\n#page-user-view table td {\n  vertical-align: top;\n  min-width: 140px;\n  word-break: break-all;\n}\n[dir] #page-user-view table td {\n  padding-bottom: 0.8rem;\n}\n@media screen and (max-width: 370px) {\n#page-user-view table:not(.permissions-table) td {\n    display: block;\n}\n}\n@media screen and (min-width: 1201px) and (max-width: 1211px), only screen and (min-width: 636px) and (max-width: 991px) {\n#account-info-col-1 {\n    width: calc(100% - 12rem) !important;\n}\n}", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--8-2!./node_modules/sass-loader/dist/cjs.js??ref--8-3!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../../node_modules/css-loader!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./UserView.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=template&id=3bf8e1be&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/src/views/apps/user/UserView.vue?vue&type=template&id=3bf8e1be& ***!
  \********************************************************************************************************************************************************************************************************************/
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
    { attrs: { id: "page-user-view" } },
    [
      _c(
        "vs-alert",
        {
          attrs: {
            color: "danger",
            title: "User Not Found",
            active: _vm.user_not_found
          },
          on: {
            "update:active": function($event) {
              _vm.user_not_found = $event
            }
          }
        },
        [
          _c("span", [
            _vm._v(
              "User record with id: " +
                _vm._s(_vm.$route.params.userId) +
                " not found. "
            )
          ]),
          _vm._v(" "),
          _c(
            "span",
            [
              _c("span", [_vm._v("Check ")]),
              _vm._v(" "),
              _c(
                "router-link",
                {
                  staticClass: "text-inherit underline",
                  attrs: { to: { name: "page-user-list" } }
                },
                [_vm._v("All Users")]
              )
            ],
            1
          )
        ]
      ),
      _vm._v(" "),
      _vm.user_data
        ? _c(
            "div",
            { attrs: { id: "user-data" } },
            [
              _c(
                "vx-card",
                { staticClass: "mb-base", attrs: { title: "Account" } },
                [
                  _c("div", { staticClass: "vx-row" }, [
                    _c(
                      "div",
                      { staticClass: "vx-col", attrs: { id: "avatar-col" } },
                      [
                        _c("div", { staticClass: "img-container mb-4" }, [
                          _c("img", {
                            staticClass: "rounded w-full",
                            attrs: { src: _vm.user_data.avatar }
                          })
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "vx-col flex-1",
                        attrs: { id: "account-info-col-1" }
                      },
                      [
                        _c("table", [
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Username")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.full_name))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("First name")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.first_name))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Last name")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.last_name))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Email")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.email))])
                          ])
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "vx-col flex-1",
                        attrs: { id: "account-info-col-2" }
                      },
                      [
                        _c("table", [
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Actived")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.active))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Role")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.role))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Company")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.company))])
                          ])
                        ])
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "vx-col w-full flex",
                        attrs: { id: "account-manage-buttons" }
                      },
                      [
                        _c(
                          "vs-button",
                          {
                            staticClass: "mr-4",
                            attrs: {
                              "icon-pack": "feather",
                              icon: "icon-edit",
                              to: {
                                name: "admin-app-user-edit",
                                params: { userId: _vm.$route.params.userId }
                              }
                            }
                          },
                          [_vm._v("Edit")]
                        ),
                        _vm._v(" "),
                        _c(
                          "vs-button",
                          {
                            attrs: {
                              type: "border",
                              color: "danger",
                              "icon-pack": "feather",
                              icon: "icon-trash"
                            },
                            on: {
                              click: function($event) {
                                return _vm.confirmDeleteRecord()
                              }
                            }
                          },
                          [_vm._v("Delete")]
                        )
                      ],
                      1
                    )
                  ])
                ]
              ),
              _vm._v(" "),
              _c("div", { staticClass: "vx-row" }, [
                _c(
                  "div",
                  { staticClass: "vx-col lg:w-1/2 w-full" },
                  [
                    _c(
                      "vx-card",
                      {
                        staticClass: "mb-base",
                        attrs: { title: "Information" }
                      },
                      [
                        _c("table", [
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Birth Date")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.dob))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Mobile")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.mobile))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Website")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.website))])
                          ]),
                          _vm._v(" "),
                          _c("tr", [
                            _c("td", { staticClass: "font-semibold" }, [
                              _vm._v("Gender")
                            ]),
                            _vm._v(" "),
                            _c("td", [_vm._v(_vm._s(_vm.user_data.gender))])
                          ])
                        ])
                      ]
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "vx-col lg:w-1/2 w-full" },
                  [
                    _c("vx-card", {
                      staticClass: "mb-base",
                      attrs: { title: "Social Links" }
                    })
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("vx-card", [
                _c("div", { staticClass: "vx-row" }, [
                  _c(
                    "div",
                    { staticClass: "vx-col w-full" },
                    [
                      _c(
                        "div",
                        { staticClass: "flex items-end px-3" },
                        [
                          _c("feather-icon", {
                            staticClass: "mr-2",
                            attrs: { svgClasses: "w-6 h-6", icon: "LockIcon" }
                          }),
                          _vm._v(" "),
                          _c(
                            "span",
                            { staticClass: "font-medium text-lg leading-none" },
                            [_vm._v("Permissions")]
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("vs-divider")
                    ],
                    1
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "block overflow-x-auto" }, [
                  _c(
                    "table",
                    { staticClass: "w-full permissions-table" },
                    [
                      _c(
                        "tr",
                        _vm._l(
                          ["Module", "Read", "Write", "Create", "Delete"],
                          function(heading) {
                            return _c(
                              "th",
                              {
                                key: heading,
                                staticClass:
                                  "font-semibold text-base text-left px-3 py-2"
                              },
                              [
                                _vm._v(
                                  "\n                            " +
                                    _vm._s(heading)
                                )
                              ]
                            )
                          }
                        ),
                        0
                      ),
                      _vm._v(" "),
                      _vm._l(_vm.user_data.permissions, function(val, name) {
                        return _c(
                          "tr",
                          { key: name },
                          [
                            _c("td", { staticClass: "px-3 py-2" }, [
                              _vm._v(_vm._s(name))
                            ]),
                            _vm._v(" "),
                            _vm._l(val, function(permission, name) {
                              return _c(
                                "td",
                                {
                                  key: name + permission,
                                  staticClass: "px-3 py-2"
                                },
                                [
                                  _c("vs-checkbox", {
                                    staticClass: "pointer-events-none",
                                    model: {
                                      value: val[name],
                                      callback: function($$v) {
                                        _vm.$set(val, name, $$v)
                                      },
                                      expression: "val[name]"
                                    }
                                  })
                                ],
                                1
                              )
                            })
                          ],
                          2
                        )
                      })
                    ],
                    2
                  )
                ])
              ])
            ],
            1
          )
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/src/store/user-management/moduleUserManagement.js":
/*!************************************************************************!*\
  !*** ./resources/js/src/store/user-management/moduleUserManagement.js ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _moduleUserManagementState_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./moduleUserManagementState.js */ "./resources/js/src/store/user-management/moduleUserManagementState.js");
/* harmony import */ var _moduleUserManagementMutations_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./moduleUserManagementMutations.js */ "./resources/js/src/store/user-management/moduleUserManagementMutations.js");
/* harmony import */ var _moduleUserManagementActions_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./moduleUserManagementActions.js */ "./resources/js/src/store/user-management/moduleUserManagementActions.js");
/* harmony import */ var _moduleUserManagementGetters_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./moduleUserManagementGetters.js */ "./resources/js/src/store/user-management/moduleUserManagementGetters.js");
/*=========================================================================================
  File Name: moduleUserManagement.js
  Description: Calendar Module
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/




/* harmony default export */ __webpack_exports__["default"] = ({
  isRegistered: false,
  namespaced: true,
  state: _moduleUserManagementState_js__WEBPACK_IMPORTED_MODULE_0__["default"],
  mutations: _moduleUserManagementMutations_js__WEBPACK_IMPORTED_MODULE_1__["default"],
  actions: _moduleUserManagementActions_js__WEBPACK_IMPORTED_MODULE_2__["default"],
  getters: _moduleUserManagementGetters_js__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./resources/js/src/store/user-management/moduleUserManagementActions.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/src/store/user-management/moduleUserManagementActions.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /home/jorayev2494/Рабочий стол/Diplom/Craigs/resources/js/src/store/user-management/moduleUserManagementActions.js: Unexpected token, expected \",\" (65:12)\n\n\u001b[0m \u001b[90m 63 | \u001b[39m                    resolve(response)\u001b[0m\n\u001b[0m \u001b[90m 64 | \u001b[39m                }\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 65 | \u001b[39m            })\u001b[33m.\u001b[39m\u001b[36mcatch\u001b[39m((error) \u001b[33m=>\u001b[39m {\u001b[0m\n\u001b[0m \u001b[90m    | \u001b[39m            \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 66 | \u001b[39m                reject(error)\u001b[0m\n\u001b[0m \u001b[90m 67 | \u001b[39m            })\u001b[0m\n\u001b[0m \u001b[90m 68 | \u001b[39m        })\u001b[33m;\u001b[39m\u001b[0m\n    at Object._raise (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:766:17)\n    at Object.raiseWithData (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:759:17)\n    at Object.raise (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:753:17)\n    at Object.unexpected (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:8966:16)\n    at Object.expect (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:8952:28)\n    at Object.parseCallExpressionArguments (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:10033:14)\n    at Object.parseCoverCallAndAsyncArrowHead (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9960:29)\n    at Object.parseSubscript (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9896:19)\n    at Object.parseSubscripts (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9867:19)\n    at Object.parseExprSubscripts (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9850:17)\n    at Object.parseUpdate (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9824:21)\n    at Object.parseMaybeUnary (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9813:17)\n    at Object.parseExprOps (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9683:23)\n    at Object.parseMaybeConditional (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9657:23)\n    at Object.parseMaybeAssign (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9620:21)\n    at Object.parseExpressionBase (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9564:23)\n    at allowInAnd (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9558:39)\n    at Object.allowInAnd (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:11303:12)\n    at Object.parseExpression (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9558:17)\n    at Object.parseStatementContent (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:11562:23)\n    at Object.parseStatement (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:11431:17)\n    at Object.parseBlockOrModuleBlockBody (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:12013:25)\n    at Object.parseBlockBody (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:11999:10)\n    at Object.parseBlock (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:11983:10)\n    at Object.parseFunctionBody (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:10963:24)\n    at Object.parseArrowExpression (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:10932:10)\n    at Object.parseParenAndDistinguishExpression (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:10501:12)\n    at Object.parseExprAtom (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:10177:21)\n    at Object.parseExprAtom (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:4718:20)\n    at Object.parseExprSubscripts (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9844:23)\n    at Object.parseUpdate (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9824:21)\n    at Object.parseMaybeUnary (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9813:17)\n    at Object.parseExprOps (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9683:23)\n    at Object.parseMaybeConditional (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9657:23)\n    at Object.parseMaybeAssign (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9620:21)\n    at allowInAnd (/home/jorayev2494/Рабочий стол/Diplom/Craigs/node_modules/@babel/parser/lib/index.js:9586:39)");

/***/ }),

/***/ "./resources/js/src/store/user-management/moduleUserManagementGetters.js":
/*!*******************************************************************************!*\
  !*** ./resources/js/src/store/user-management/moduleUserManagementGetters.js ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: moduleCalendarGetters.js
  Description: Calendar Module Getters
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
/* harmony default export */ __webpack_exports__["default"] = ({});

/***/ }),

/***/ "./resources/js/src/store/user-management/moduleUserManagementMutations.js":
/*!*********************************************************************************!*\
  !*** ./resources/js/src/store/user-management/moduleUserManagementMutations.js ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: moduleCalendarMutations.js
  Description: Calendar Module Mutations
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
/* harmony default export */ __webpack_exports__["default"] = ({
  SET_USERS: function SET_USERS(state, users) {
    state.users = users;
  },
  REMOVE_RECORD: function REMOVE_RECORD(state, itemId) {
    var userIndex = state.users.findIndex(function (u) {
      return u.id == itemId;
    });
    state.users.splice(userIndex, 1);
  }
});

/***/ }),

/***/ "./resources/js/src/store/user-management/moduleUserManagementState.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/src/store/user-management/moduleUserManagementState.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*=========================================================================================
  File Name: moduleCalendarState.js
  Description: Calendar Module State
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
/* harmony default export */ __webpack_exports__["default"] = ({
  users: []
});

/***/ }),

/***/ "./resources/js/src/views/apps/user/UserView.vue":
/*!*******************************************************!*\
  !*** ./resources/js/src/views/apps/user/UserView.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _UserView_vue_vue_type_template_id_3bf8e1be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./UserView.vue?vue&type=template&id=3bf8e1be& */ "./resources/js/src/views/apps/user/UserView.vue?vue&type=template&id=3bf8e1be&");
/* harmony import */ var _UserView_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./UserView.vue?vue&type=script&lang=js& */ "./resources/js/src/views/apps/user/UserView.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./UserView.vue?vue&type=style&index=0&lang=scss& */ "./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _UserView_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _UserView_vue_vue_type_template_id_3bf8e1be___WEBPACK_IMPORTED_MODULE_0__["render"],
  _UserView_vue_vue_type_template_id_3bf8e1be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/src/views/apps/user/UserView.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/src/views/apps/user/UserView.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/src/views/apps/user/UserView.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./UserView.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss& ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/style-loader!../../../../../../node_modules/css-loader!../../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../node_modules/postcss-loader/src??ref--8-2!../../../../../../node_modules/sass-loader/dist/cjs.js??ref--8-3!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./UserView.vue?vue&type=style&index=0&lang=scss& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=style&index=0&lang=scss&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_8_2_node_modules_sass_loader_dist_cjs_js_ref_8_3_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_style_index_0_lang_scss___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/src/views/apps/user/UserView.vue?vue&type=template&id=3bf8e1be&":
/*!**************************************************************************************!*\
  !*** ./resources/js/src/views/apps/user/UserView.vue?vue&type=template&id=3bf8e1be& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_template_id_3bf8e1be___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./UserView.vue?vue&type=template&id=3bf8e1be& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/src/views/apps/user/UserView.vue?vue&type=template&id=3bf8e1be&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_template_id_3bf8e1be___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_UserView_vue_vue_type_template_id_3bf8e1be___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);