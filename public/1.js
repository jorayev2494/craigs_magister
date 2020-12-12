(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: {
    dataImages: {
      type: Object,
      required: true
    },
    methodSend: {
      type: Function,
      required: true
    }
  },
  data: function data() {
    return {
      files: [],
      images: [],
      isEdit: false
    };
  },
  methods: {
    changeImages: function changeImages(event) {
      this.files = this.imagesComp = 'clear';
      this.files = event.target.files;
      if (this.files.length <= 0) return;

      for (var i = this.files.length - 1; i >= 0; i -= 1) {
        var file = this.files[i];
        this.dataImages[i] = file; // console.log("set: ", i);

        this.imagesComp = file;
      }
    },
    deleteByIndex: function deleteByIndex(event, image, name) {
      var tempFiles = this.files;
      this.files = [];

      for (var i = 0; i < tempFiles.length; i++) {
        if (tempFiles[i].name == name) {
          this.$delete(this.dataImages, i);
          this.$delete(this.images, i);
          continue;
        }

        this.files.push(tempFiles[i]);
      }
    }
  },
  computed: {
    imagesComp: {
      get: function get() {
        return this.images;
      },
      set: function set(value) {
        if (this.isEdit) {
          this.images = [];
          this.isEdit = false;
        }

        if (typeof value == 'string' && value == 'clear') {
          this.images = [];
          return;
        } else if (typeof value == 'string') {
          value = value;
        } else {
          value = URL.createObjectURL(value);
        }

        this.images.push({
          url: value,
          name: value.name
        });
      }
    }
  },
  mounted: function mounted() {
    var _this = this;

    // console.table(this.dataImages);
    setTimeout(function () {
      for (var i = 0; i < Object.keys(_this.dataImages).length; i++) {
        var img = _this.dataImages[i];
        console.log('img: ', img);
        _this.imagesComp = img;
      }

      _this.isEdit = true;
    }, 1000);
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true&":
/*!***************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "my_dashboard_review mt30" }, [
    _c("div", { staticClass: "row" }, [
      _vm._m(0),
      _vm._v(" "),
      _c("div", { staticClass: "col-lg-12" }, [
        _c(
          "ul",
          { staticClass: "mb0" },
          _vm._l(_vm.imagesComp, function(image, key) {
            return _c("li", { key: key, staticClass: "list-inline-item" }, [
              _c("div", { staticClass: "portfolio_item" }, [
                _vm.isEdit
                  ? _c("img", {
                      directives: [
                        {
                          name: "server-image",
                          rawName: "v-server-image:200",
                          value: image.url,
                          expression: "image.url",
                          arg: "200"
                        }
                      ],
                      staticClass: "img-fluid"
                    })
                  : _c("img", {
                      staticClass: "img-fluid",
                      attrs: { src: image.url, alt: image.url }
                    })
              ])
            ])
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-xl-12" }, [
        _c("div", { staticClass: "resume_uploader mb30" }, [
          _c("h4", [_vm._v("Attachments")]),
          _vm._v(" "),
          _c("form", { staticClass: "form-inline" }, [
            _c("input", { staticClass: "upload-path" }),
            _vm._v(" "),
            _c("label", { staticClass: "upload" }, [
              _c("input", {
                attrs: { type: "file", accept: "image/*", multiple: "" },
                on: {
                  change: function($event) {
                    return _vm.changeImages($event)
                  }
                }
              }),
              _vm._v(
                "\n                        Select Attachment\n                    "
              )
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "col-xl-12" }, [
        _c("div", { staticClass: "my_profile_setting_input" }, [
          _c(
            "button",
            {
              staticClass: "btn btn2 float-right",
              on: {
                click: function($event) {
                  return _vm.methodSend($event)
                }
              }
            },
            [_vm._v("Next")]
          )
        ])
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-12" }, [
      _c("h4", { staticClass: "mb30" }, [_vm._v("Property media")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue":
/*!**************************************************************************************************!*\
  !*** ./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue ***!
  \**************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImagesComponent_vue_vue_type_template_id_728ee874_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true& */ "./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true&");
/* harmony import */ var _ImagesComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ImagesComponent.vue?vue&type=script&lang=js& */ "./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ImagesComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ImagesComponent_vue_vue_type_template_id_728ee874_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ImagesComponent_vue_vue_type_template_id_728ee874_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "728ee874",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************!*\
  !*** ./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ImagesComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ImagesComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ImagesComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true&":
/*!*********************************************************************************************************************************************!*\
  !*** ./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true& ***!
  \*********************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ImagesComponent_vue_vue_type_template_id_728ee874_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../../../node_modules/vue-loader/lib??vue-loader-options!./ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/client/components/includes/dashboard/announcements/base/ImagesComponent.vue?vue&type=template&id=728ee874&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ImagesComponent_vue_vue_type_template_id_728ee874_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ImagesComponent_vue_vue_type_template_id_728ee874_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);