/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

module.exports = _assertThisInitialized;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _getPrototypeOf(o);
}

module.exports = _getPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/inherits.js":
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}

module.exports = _inherits;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"];

var assertThisInitialized = __webpack_require__(/*! ./assertThisInitialized.js */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return assertThisInitialized(self);
}

module.exports = _possibleConstructorReturn;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _setPrototypeOf(o, p);
}

module.exports = _setPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    module.exports = _typeof = function _typeof(obj) {
      return typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  } else {
    module.exports = _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  }

  return _typeof(obj);
}

module.exports = _typeof;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./src/blocks/blankspace.js":
/*!**********************************!*\
  !*** ./src/blocks/blankspace.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var Fragment = wp.element.Fragment;
var InspectorControls = wp.editor.InspectorControls;
var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path,
    PanelBody = _wp$components.PanelBody,
    RangeControl = _wp$components.RangeControl;
var withState = wp.compose.withState;
registerBlockType('jin-gb-block/blank-space', {
  title: __('余白'),
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    viewBox: "0 0 491 489"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("title", null, "space"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M479,35H20A16,16,0,0,1,20,3H479a16,16,0,0,1,0,32Z",
    transform: "translate(-4 -3)",
    fill: "#3b4675"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M479,492H20a16,16,0,0,1,0-32H479a16,16,0,0,1,0,32Z",
    transform: "translate(-4 -3)",
    fill: "#3b4675"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M297.89,351H266V150h31.89a7,7,0,0,0,5.75-10.93L255.75,69.39a7,7,0,0,0-11.5,0l-47.89,69.68A7,7,0,0,0,202.11,150H234V351H202.11a7,7,0,0,0-5.75,10.93l47.89,69.68a7,7,0,0,0,11.5,0l47.89-69.68A7,7,0,0,0,297.89,351Z",
    transform: "translate(-4 -3)",
    fill: "#3b4675"
  })),
  category: 'jin-block',
  attributes: {
    blankSpace: {
      type: 'number',
      default: 30
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes;

    var onChangeBlankSpace = function onChangeBlankSpace(newBlankSpace) {
      props.setAttributes({
        blankSpace: newBlankSpace
      });
    };

    var blankSpaceStyle = {
      height: attributes.blankSpace
    };
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u4F59\u767D\u306E\u30B5\u30A4\u30BA"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RangeControl, {
      label: "\u4F59\u767D\u306E\u5927\u304D\u3055",
      value: attributes.blankSpace,
      onChange: onChangeBlankSpace,
      min: 10,
      max: 100
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "blank-space",
      style: blankSpaceStyle
    }));
  },
  save: function save(props) {
    var blankSpaceStyle = {
      height: props.attributes.blankSpace
    };
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "blank-space",
      style: blankSpaceStyle
    });
  }
});

/***/ }),

/***/ "./src/blocks/blogcard.js":
/*!********************************!*\
  !*** ./src/blocks/blogcard.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    URLInput = _wp$editor.URLInput,
    InspectorControls = _wp$editor.InspectorControls;
var Fragment = wp.element.Fragment;
var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path,
    PanelBody = _wp$components.PanelBody;

var Blogcard = /*#__PURE__*/function (_React$Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(Blogcard, _React$Component);

  var _super = _createSuper(Blogcard);

  function Blogcard(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, Blogcard);

    _this = _super.call(this, props);
    _this.state = {
      pageTitle: "ブログカードのURLが設定されていません",
      pageDesc: "",
      pageImgSrc: jin_inst_dir_gb.install_dir + "/img/noimg480.png",
      isLoaded: true
    };
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(Blogcard, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this2 = this;

      if (this.props.url !== undefined && this.props.url !== "") {
        fetch(this.props.url).then(function (response) {
          return response.text();
        }).then(function (html) {
          var parser = new DOMParser();
          var doc = parser.parseFromString(html, 'text/html');
          var h1Title = doc.querySelector('h1.cps-post-title');
          var postDesc = doc.querySelectorAll('.cps-post-main p');
          var postDescJoin = postDesc[0].textContent + " " + postDesc[1].textContent + " " + postDesc[2].textContent;

          if (postDescJoin.length > 70) {
            postDescJoin = postDescJoin.substr(0, 68) + '…';
          }

          var imgSrc = doc.querySelector('.cps-post-thumb img');

          if (imgSrc !== "" && imgSrc !== undefined && imgSrc !== null) {
            imgSrc = doc.querySelector('.cps-post-thumb img').getAttribute('src');
          } else {
            imgSrc = jin_inst_dir_gb.install_dir + "/img/noimg480.png";
          }

          _this2.setState({
            isLoaded: true,
            pageTitle: h1Title.innerHTML,
            pageDesc: postDescJoin,
            pageImgSrc: imgSrc
          });
        }, function (error) {
          _this2.setState({
            isLoaded: true,
            error: error
          });
        });
      } else {
        this.setState({
          isLoaded: true,
          pageTitle: "ブログカード",
          pageImgSrc: jin_inst_dir_gb.install_dir + "/img/noimg480.png"
        });
      }
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps) {
      var _this3 = this;

      if (this.props.url !== prevProps.url) {
        if (this.props.url !== undefined && this.props.url !== "") {
          fetch(this.props.url).then(function (response) {
            return response.text();
          }).then(function (html) {
            var parser = new DOMParser();
            var doc = parser.parseFromString(html, 'text/html');
            var h1Title = doc.querySelector('h1.cps-post-title');
            var postDesc = doc.querySelectorAll('.cps-post-main p');
            var postDescJoin = postDesc[0].textContent + " " + postDesc[1].textContent + " " + postDesc[2].textContent;

            if (postDescJoin.length > 70) {
              postDescJoin = postDescJoin.substr(0, 68) + '…';
            }

            var imgSrc = doc.querySelector('.cps-post-thumb img');

            if (imgSrc !== "" && imgSrc !== undefined && imgSrc !== null) {
              imgSrc = doc.querySelector('.cps-post-thumb img').getAttribute('src');
            } else {
              imgSrc = jin_inst_dir_gb.install_dir + "/img/noimg480.png";
            }

            _this3.setState({
              isLoaded: true,
              pageTitle: h1Title.innerHTML,
              pageDesc: postDescJoin,
              pageImgSrc: imgSrc
            });
          }, function (error) {
            _this3.setState({
              isLoaded: true,
              error: error
            });
          });
        } else {
          this.setState({
            isLoaded: true,
            pageTitle: "ブログカード",
            pageImgSrc: jin_inst_dir_gb.install_dir + "/img/noimg480.png"
          });
        }
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this$state = this.state,
          error = _this$state.error,
          isLoaded = _this$state.isLoaded,
          pageTitle = _this$state.pageTitle,
          pageImgSrc = _this$state.pageImgSrc,
          pageDesc = _this$state.pageDesc;

      if (error) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", null, "Error: ", error.message);
      } else if (!isLoaded) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", null, "Loading...");
      } else {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(ClassChild, {
          title: this.state.pageTitle,
          desc: this.state.pageDesc,
          src: this.state.pageImgSrc
        });
      }
    }
  }]);

  return Blogcard;
}(React.Component);

var ClassChild = /*#__PURE__*/function (_React$Component2) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(ClassChild, _React$Component2);

  var _super2 = _createSuper(ClassChild);

  function ClassChild() {
    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, ClassChild);

    return _super2.apply(this, arguments);
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(ClassChild, [{
    key: "render",
    value: function render() {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("a", {
        href: "#",
        className: "blog-card"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "blog-card-hl-box"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("i", {
        className: "jic jin-ifont-post"
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "blog-card-hl"
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "blog-card-box"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "blog-card-thumbnail"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("img", {
        src: this.props.src
      })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", {
        className: "blog-card-content"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "blog-card-title"
      }, this.props.title), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "blog-card-excerpt"
      }, this.props.desc))));
    }
  }]);

  return ClassChild;
}(React.Component);

registerBlockType('jin-gb-block/blog-card', {
  title: __('ブログカード'),
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("svg", {
    viewBox: "0 0 490.28 318"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("title", null, "blogcard"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("rect", {
    x: "65.13",
    y: "110.27",
    width: "146",
    height: "120.73",
    rx: "11.24",
    fill: "#ccc"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("path", {
    d: "M477.54,127.05h-250v-16a5,5,0,0,0-5.05-5H62.07a5,5,0,0,0-5,5v16H22.48A17.64,17.64,0,0,0,4.87,144.67V406.39A17.63,17.63,0,0,0,22.48,424H477.54a17.63,17.63,0,0,0,17.61-17.61V144.67A17.64,17.64,0,0,0,477.54,127.05Zm-.39,279H22.87V145.05H57V161a5,5,0,0,0,5,5.05H222.51a5,5,0,0,0,5.05-5.05v-15.9H477.15Z",
    transform: "translate(-4.87 -106)",
    fill: "#3b4675"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("rect", {
    x: "257.13",
    y: "113",
    width: "178",
    height: "17",
    rx: "5.89",
    fill: "#ccc"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("rect", {
    x: "258.08",
    y: "163",
    width: "151.35",
    height: "17",
    rx: "5.89",
    fill: "#ccc"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("rect", {
    x: "259.04",
    y: "211",
    width: "122.79",
    height: "17",
    rx: "5.89",
    fill: "#ccc"
  })),
  category: 'jin-block',
  attributes: {
    url: {
      type: 'string'
    },
    text: {
      type: 'string'
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes;

    var onChangeUrl = function onChangeUrl(newUrl) {
      props.setAttributes({
        url: newUrl
      });
    };

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Blogcard, {
      url: attributes.url
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(URLInput, {
      className: "blogcard-url-input",
      value: attributes.url,
      onChange: onChangeUrl
    }));
  },
  save: function save(props) {
    return props.attributes.url;
  }
});

/***/ }),

/***/ "./src/blocks/border.js":
/*!******************************!*\
  !*** ./src/blocks/border.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var Fragment = wp.element.Fragment;
var _wp$editor = wp.editor,
    InspectorControls = _wp$editor.InspectorControls,
    PanelColorSettings = _wp$editor.PanelColorSettings,
    ColorPalette = _wp$editor.ColorPalette,
    getColorClassName = _wp$editor.getColorClassName,
    getColorObjectByColorValue = _wp$editor.getColorObjectByColorValue;
var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path,
    PanelBody = _wp$components.PanelBody,
    RadioControl = _wp$components.RadioControl,
    RangeControl = _wp$components.RangeControl;
registerBlockType('jin-gb-block/border', {
  title: __('区切り線'),
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    viewBox: "0 0 462 40"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("title", null, "line"), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    d: "M461,270H39a20,20,0,0,1,0-40H461a20,20,0,0,1,0,40Z",
    transform: "translate(-19 -230)",
    fill: "#3b4675"
  })),
  category: 'jin-block',
  attributes: {
    borderStyle: {
      type: 'string',
      default: 'jin-sen-solid'
    },
    borderCustomWidth: {
      type: 'number',
      default: 3
    },
    borderColor: {
      type: 'string',
      default: '#f7f7f7'
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes;

    var onChangeBorderStyle = function onChangeBorderStyle(newBorderStyle) {
      props.setAttributes({
        borderStyle: newBorderStyle
      });
    };

    var onChangeBorderCustomWidth = function onChangeBorderCustomWidth(newBorderCustomWidth) {
      props.setAttributes({
        borderCustomWidth: newBorderCustomWidth
      });
    };

    var borderStyleCSS = {
      borderWidth: attributes.borderCustomWidth,
      borderColor: attributes.borderColor
    };

    var onChangeBorderColor = function onChangeBorderColor(newBorderColor) {
      props.setAttributes({
        borderColor: newBorderColor
      });
    };

    var borderColors = [{
      name: 'グレー',
      color: '#ccc'
    }, {
      name: 'ブルー',
      color: '#93d2f0'
    }, {
      name: 'レッド',
      color: '#f48789'
    }, {
      name: 'イエロー',
      color: '#ffd75e'
    }, {
      name: 'グリーン',
      color: '#9ddd93'
    }];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u533A\u5207\u308A\u7DDA\u306E\u30B9\u30BF\u30A4\u30EB"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RadioControl, {
      selected: attributes.borderStyle,
      options: [{
        label: '実線',
        value: 'jin-sen-solid'
      }, {
        label: '破線',
        value: 'jin-sen-dashed'
      }, {
        label: '２重線',
        value: 'jin-sen-double'
      }],
      onChange: onChangeBorderStyle
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u533A\u5207\u308A\u7DDA\u306E\u592A\u3055"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RangeControl, {
      label: "\u7DDA\u306E\u592A\u3055",
      value: attributes.borderCustomWidth,
      onChange: onChangeBorderCustomWidth,
      min: 1,
      max: 20
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelColorSettings, {
      title: '区切り線の色',
      colorSettings: [{
        colors: borderColors,
        value: attributes.borderColor,
        label: '選択中の色',
        onChange: onChangeBorderColor,
        disableCustomColors: false
      }]
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "jin-sen"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: attributes.borderStyle,
      style: borderStyleCSS
    })));
  },
  save: function save(props) {
    var borderStyleCSS = {
      borderWidth: props.attributes.borderCustomWidth,
      borderColor: props.attributes.borderColor
    };
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "jin-sen"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: props.attributes.borderStyle,
      style: borderStyleCSS
    }));
  }
});

/***/ }),

/***/ "./src/blocks/fukidashi.js":
/*!*********************************!*\
  !*** ./src/blocks/fukidashi.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var Fragment = wp.element.Fragment;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    MediaUpload = _wp$editor.MediaUpload,
    InspectorControls = _wp$editor.InspectorControls,
    InnerBlocks = _wp$editor.InnerBlocks,
    PanelColorSettings = _wp$editor.PanelColorSettings,
    getColorClassName = _wp$editor.getColorClassName,
    getColorObjectByColorValue = _wp$editor.getColorObjectByColorValue;
var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path,
    PanelBody = _wp$components.PanelBody,
    RadioControl = _wp$components.RadioControl,
    Button = _wp$components.Button;
registerBlockType('jin-gb-block/chat-block', {
  title: __('吹き出し'),
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(SVG, {
    viewBox: "0 0 134.94 116.27"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#d1f8c2",
    d: "M113.91,108.06H59.16a50.51,50.51,0,0,0-5.37,0l-26,18.11a1.77,1.77,0,0,1-2.63-2l-1.06-13.93a1.84,1.84,0,0,0-1.7-2.26h-.28c-10,0-18.09-8.84-18.09-19.75V37c0-10.91,8.1-19.75,18.09-19.75h91.76c10,0,18.09,8.84,18.09,19.75V88.31C132,99.22,123.9,108.06,113.91,108.06Z",
    transform: "translate(-0.56 -13.75)"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#9ddd93",
    d: "M26.88,130a5.08,5.08,0,0,1-2.77-.82,5.4,5.4,0,0,1-2.44-5l-1-12.66C9.47,110.71.56,100.61.56,88.31V37c0-12.82,9.69-23.25,21.59-23.25h91.76c11.91,0,21.59,10.43,21.59,23.25V88.31c0,12.82-9.68,23.25-21.59,23.25H58.62c-1.94,0-3,0-3.59,0L29.82,129.09A5.19,5.19,0,0,1,26.88,130Zm.77-19.61.84,11.08,23.3-16.24c1.1-.77,1.9-.8,7-.69h55.14c8,0,14.59-7.29,14.59-16.25V37c0-9-6.54-16.25-14.59-16.25H22.15C14.11,20.75,7.56,28,7.56,37V88.31c0,9,6.55,16.25,14.59,16.25h.28a5.17,5.17,0,0,1,4,1.88A5.44,5.44,0,0,1,27.65,110.4Z",
    transform: "translate(-0.56 -13.75)"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    fill: "#9ddd93",
    cx: "36.33",
    cy: "48.39",
    r: "8.98"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    fill: "#9ddd93",
    cx: "67.47",
    cy: "48.39",
    r: "8.98"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    fill: "#9ddd93",
    cx: "98.61",
    cy: "48.39",
    r: "8.98"
  })),
  category: 'jin-block',
  attributes: {
    mediaID: {
      type: 'number'
    },
    mediaURL: {
      type: 'string',
      source: 'attribute',
      selector: 'img',
      attribute: 'src'
    },
    iconName: {
      type: 'array',
      source: 'children',
      selector: 'span',
      default: 'アイコン名を入力'
    },
    layout: {
      type: 'string',
      default: ' balloon-left'
    },
    iconFrame: {
      type: 'string',
      default: ' maru'
    },
    borderColor: {
      type: 'string',
      default: ' #ccc'
    },
    bgColor: {
      type: 'string',
      default: ' #efefef'
    }
  },
  edit: function edit(props) {
    var attributes = props.attributes;

    var onSelectImage = function onSelectImage(media) {
      props.setAttributes({
        mediaURL: media.url,
        mediaID: media.id
      });
    };

    var onChangeIconName = function onChangeIconName(newIconName) {
      props.setAttributes({
        iconName: newIconName
      });
    };

    var onChangeLayout = function onChangeLayout(newLayout) {
      props.setAttributes({
        layout: newLayout
      });
    };

    var onChangeIconFrame = function onChangeIconFrame(newIconFrame) {
      props.setAttributes({
        iconFrame: newIconFrame
      });
    };

    var onChangeBorderColor = function onChangeBorderColor(newBorderColor) {
      props.setAttributes({
        borderColor: newBorderColor
      });
    };

    var onChangeBgColor = function onChangeBgColor(newBgColor) {
      props.setAttributes({
        bgColor: newBgColor
      });
    };

    var borderColors = [{
      name: 'グレー',
      color: '#ccc'
    }, {
      name: 'ブルー',
      color: '#93d2f0'
    }, {
      name: 'レッド',
      color: '#f48789'
    }, {
      name: 'イエロー',
      color: '#ffd75e'
    }, {
      name: 'グリーン',
      color: '#9ddd93'
    }, {
      name: 'なし',
      color: '#fff'
    }];
    var bgColors = [{
      name: 'グレー',
      color: '#efefef'
    }, {
      name: 'ブルー',
      color: '#e2f6ff'
    }, {
      name: 'レッド',
      color: '#ffebeb'
    }, {
      name: 'イエロー',
      color: '#fff8d1'
    }, {
      name: 'グリーン',
      color: '#d1f8c2'
    }, {
      name: 'なし',
      color: '#fff'
    }];
    var borderColorClass = getColorClassName('ballon', attributes.borderColor);
    var bgColorClass = getColorClassName('bgballon', attributes.bgColor);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u30A2\u30A4\u30B3\u30F3\u306E\u67A0"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RadioControl, {
      selected: attributes.iconFrame,
      options: [{
        label: '丸',
        value: ' maru'
      }, {
        label: 'なし',
        value: ''
      }],
      onChange: onChangeIconFrame
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelColorSettings, {
      title: '吹き出しの枠色',
      colorSettings: [{
        colors: borderColors,
        value: attributes.borderColor,
        label: '選択中の色',
        onChange: onChangeBorderColor,
        disableCustomColors: true
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelColorSettings, {
      title: '吹き出しの背景色',
      colorSettings: [{
        colors: bgColors,
        value: attributes.bgColor,
        label: '選択中の色',
        onChange: onChangeBgColor,
        disableCustomColors: true
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u914D\u7F6E"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RadioControl, {
      selected: attributes.layout,
      options: [{
        label: '左',
        value: ' balloon-left'
      }, {
        label: '右',
        value: ' balloon-right'
      }],
      onChange: onChangeLayout
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: 'balloon-box' + attributes.layout + ' clearfix ' + borderColorClass + ' ' + bgColorClass
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "balloon-box-inner"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: 'balloon-icon' + attributes.iconFrame
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(MediaUpload, {
      onSelect: onSelectImage,
      type: "image",
      value: attributes.mediaID,
      render: function render(_ref) {
        var open = _ref.open;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
          className: attributes.mediaID ? 'image-button' : 'button button-large',
          onClick: open
        }, !attributes.mediaID ? __('画像を選択') : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: attributes.mediaURL,
          width: ""
        }));
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText, {
      tagName: "span",
      className: "icon-name",
      onChange: onChangeIconName,
      value: attributes.iconName
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "balloon-serif"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "balloon-content"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks, null)))));
  },
  save: function save(props) {
    var mediaURL = props.attributes.mediaURL;
    var borderColorClassSave = getColorClassName('ballon', props.attributes.borderColor);
    var bgColorClassSave = getColorClassName('bgballon', props.attributes.bgColor);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: 'balloon-box' + props.attributes.layout + ' clearfix ' + borderColorClassSave + ' ' + bgColorClassSave
    }, mediaURL && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: 'balloon-icon' + props.attributes.iconFrame
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
      src: mediaURL
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText.Content, {
      tagName: "span",
      className: "icon-name",
      value: props.attributes.iconName
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "balloon-serif"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "balloon-content"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks.Content, null))));
  }
});

/***/ }),

/***/ "./src/blocks/ranking.js":
/*!*******************************!*\
  !*** ./src/blocks/ranking.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var _wp$element = wp.element,
    Fragment = _wp$element.Fragment,
    RawHTML = _wp$element.RawHTML;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    InspectorControls = _wp$editor.InspectorControls,
    PlainText = _wp$editor.PlainText,
    InnerBlocks = _wp$editor.InnerBlocks;
var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path,
    PanelBody = _wp$components.PanelBody,
    RadioControl = _wp$components.RadioControl,
    SelectControl = _wp$components.SelectControl,
    TextareaControl = _wp$components.TextareaControl,
    ToggleControl = _wp$components.ToggleControl;
registerBlockType('jin-gb-block/ranking', {
  title: __('ランキング'),
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(SVG, {
    viewBox: "0 0 39.6 34.52"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#facf2c",
    d: "M31.32,22.07,25.38,11.5a1.59,1.59,0,0,0-2.17-.59,1.52,1.52,0,0,0-.59.59L16.68,22.07a1.59,1.59,0,0,1-2.17.59,1.39,1.39,0,0,1-.31-.23L8.61,17a1.57,1.57,0,0,0-2.23,0,1.55,1.55,0,0,0-.44,1.26L7.65,32.05h33l1.41-13.71A1.58,1.58,0,0,0,39.39,17L33.8,22.43a1.58,1.58,0,0,1-2.25-.05A1.39,1.39,0,0,1,31.32,22.07Z",
    transform: "translate(-4.2 -5.9)"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    fill: "#facf2c",
    cx: "19.8",
    cy: "1.76",
    r: "1.76"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    fill: "#facf2c",
    cx: "37.84",
    cy: "7.94",
    r: "1.76"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("circle", {
    fill: "#facf2c",
    cx: "1.76",
    cy: "7.94",
    r: "1.76"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("path", {
    fill: "#facf2c",
    d: "M7.52,34.65v4.67a1.1,1.1,0,0,0,1.1,1.1H39.38a1.1,1.1,0,0,0,1.1-1.1V34.65ZM24,39.29a1.76,1.76,0,1,1,1.76-1.76h0A1.76,1.76,0,0,1,24,39.29Z",
    transform: "translate(-4.2 -5.9)"
  })),
  category: 'jin-block',
  attributes: {
    rankingStyle: {
      type: 'string',
      default: ''
    },
    //未実装。どうする？
    rankingNumber: {
      type: 'string',
      default: '01'
    },
    rankingName: {
      type: 'array',
      source: 'children',
      selector: 'div.gb-ranking-name'
    },
    rankingDesc: {
      type: 'array',
      source: 'children',
      selector: 'div.gb-ranking-desc'
    },
    rankingAdTag: {
      type: 'string',
      default: ''
    },
    rankingButtonDelete: {
      type: 'boolean',
      default: false
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var rankingStyleSetting = [{
      label: 'シンプル',
      value: ''
    }, {
      label: 'リッチ',
      value: '-rich'
    }, {
      label: 'ガーリー',
      value: '-girly'
    }];
    var rankingNumberSetting = [{
      label: '１位',
      value: '01'
    }, {
      label: '２位',
      value: '02'
    }, {
      label: '３位',
      value: '03'
    }, {
      label: '４位以下',
      value: '04'
    }];
    var adBlankTitleStyle = {
      color: "#ddd",
      fontSize: "24px",
      textAlign: "center",
      paddingBottom: "30px",
      fontFamily: ""
    };
    var adBlankStyle = {
      border: "2px dashed #ddd",
      background: "#fafafa",
      width: "300px",
      height: "250px",
      borderRadius: "0px",
      padding: "60px",
      color: "#aaa",
      fontSize: "12px",
      textAlign: "center",
      whiteSpace: "pre-line"
    };
    var adDefaultText = "ブロック設定で広告タグを\n入力してください。";
    var BUTTON_TEMPLATE = [['jin-gb-block/two-buttons']];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u30E9\u30F3\u30AD\u30F3\u30B0\u9806\u4F4D"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(SelectControl, {
      value: attributes.rankingNumber,
      options: rankingNumberSetting,
      onChange: function onChange(rankingNumber) {
        return setAttributes({
          rankingNumber: rankingNumber
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u5E83\u544A\u30BF\u30B0\u8A2D\u5B9A"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextareaControl, {
      help: "ASP\u306E\u5E83\u544A\u30BF\u30B0\u3092\u305D\u306E\u307E\u307E\u8CBC\u308A\u4ED8\u3051\u3066\u304F\u3060\u3055\u3044\u3002",
      value: attributes.rankingAdTag,
      onChange: function onChange(rankingAdTag) {
        return setAttributes({
          rankingAdTag: rankingAdTag
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u30DC\u30BF\u30F3\u3092\u975E\u8868\u793A\u306B\u3059\u308B"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ToggleControl, {
      label: attributes.rankingButtonDelete ? 'ON' : 'OFF',
      checked: attributes.rankingButtonDelete,
      onChange: function onChange(rankingButtonDelete) {
        return setAttributes({
          rankingButtonDelete: rankingButtonDelete
        });
      }
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking01"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking-title" + attributes.rankingNumber
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
      className: "ranking-number",
      src: jin_inst_dir_gb.install_dir + "/img/rank" + attributes.rankingNumber + attributes.rankingStyle + ".png"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText, {
      tagName: "div",
      className: "gb-ranking-name",
      onChange: function onChange(rankingName) {
        return setAttributes({
          rankingName: rankingName
        });
      },
      value: attributes.rankingName,
      placeholder: __('ここに商品名を入力してください', 'custom-block'),
      keepPlaceholderOnFocus: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking-img01"
    }, attributes.rankingAdTag ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RawHTML, null, attributes.rankingAdTag) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      style: adBlankStyle
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      style: adBlankTitleStyle
    }, "NO IMAGE"), adDefaultText)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking-info01"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText, {
      tagName: "div",
      className: "gb-ranking-desc",
      onChange: function onChange(rankingDesc) {
        return setAttributes({
          rankingDesc: rankingDesc
        });
      },
      value: attributes.rankingDesc,
      placeholder: __('ここに説明を入力してください', 'custom-block'),
      keepPlaceholderOnFocus: true
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "clearfix"
    })), attributes.rankingButtonDelete || Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks, {
      template: BUTTON_TEMPLATE,
      templateLock: "all"
    })));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking01"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking-title" + attributes.rankingNumber
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
      className: "ranking-number",
      src: jin_inst_dir_gb.install_dir + "/img/rank" + attributes.rankingNumber + attributes.rankingStyle + ".png"
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText.Content, {
      tagName: "div",
      className: "gb-ranking-name",
      value: attributes.rankingName
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking-img01"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RawHTML, null, attributes.rankingAdTag)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "ranking-info01"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RichText.Content, {
      tagName: "div",
      className: "gb-ranking-desc",
      value: attributes.rankingDesc
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "clearfix"
    })), attributes.rankingButtonDelete || Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks.Content, null));
  }
});

/***/ }),

/***/ "./src/blocks/twobuttons.js":
/*!**********************************!*\
  !*** ./src/blocks/twobuttons.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var __ = wp.i18n.__;
var registerBlockType = wp.blocks.registerBlockType;
var _wp$element = wp.element,
    Fragment = _wp$element.Fragment,
    RawHTML = _wp$element.RawHTML;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    InspectorControls = _wp$editor.InspectorControls,
    PlainText = _wp$editor.PlainText,
    InnerBlocks = _wp$editor.InnerBlocks;
var _wp$components = wp.components,
    SVG = _wp$components.SVG,
    Path = _wp$components.Path,
    PanelBody = _wp$components.PanelBody,
    RadioControl = _wp$components.RadioControl,
    ToggleControl = _wp$components.ToggleControl,
    TextareaControl = _wp$components.TextareaControl;
registerBlockType('jin-gb-block/two-buttons', {
  title: __('横並びボタン'),
  icon: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
    viewBox: "0 0 48 10"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
    width: "22",
    height: "10",
    rx: "1.48",
    fill: "#ffcd44"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
    x: "26",
    width: "22",
    height: "10",
    rx: "1.48",
    fill: "#3b4675"
  })),
  category: 'jin-block',
  attributes: {
    twoButtonDesign: {
      type: 'string',
      default: 'SIMPLE_BUTTON'
    },
    twoButtonMobileFlex: {
      type: 'boolean',
      default: false
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var twoButtonStyle = [{
      label: 'シンプルボタン',
      value: 'SIMPLE_BUTTON'
    }, {
      label: 'リッチボタン',
      value: 'RICH_BUTTON'
    }];
    var SIMPLE_BUTTON = [['jin-gb-block/simple-button', {
      buttonText: '詳細ページ',
      buttonStyle: 'color-button01'
    }], ['jin-gb-block/simple-button', {
      buttonText: '公式ページ',
      buttonStyle: 'color-button02'
    }]];
    var RICH_BUTTON = [['jin-gb-block/rich-button', {
      buttonText: '詳細ページ'
    }], ['jin-gb-block/rich-button', {
      buttonText: '公式ページ',
      buttonColor1: '#f26a6a'
    }]];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u30DC\u30BF\u30F3\u30C7\u30B6\u30A4\u30F3"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(RadioControl, {
      selected: attributes.twoButtonDesign,
      options: twoButtonStyle,
      onChange: function onChange(twoButtonDesign) {
        return setAttributes({
          twoButtonDesign: twoButtonDesign
        });
      }
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, {
      title: "\u30B9\u30DE\u30DB\u3067\u6A2A\u4E26\u3073\u8868\u793A"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ToggleControl, {
      label: attributes.twoButtonMobileFlex ? 'ON' : 'OFF',
      checked: attributes.twoButtonMobileFlex,
      onChange: function onChange(twoButtonMobileFlex) {
        return setAttributes({
          twoButtonMobileFlex: twoButtonMobileFlex
        });
      }
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "gb-two-button-box"
    }, function () {
      if (attributes.twoButtonDesign == "SIMPLE_BUTTON") {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks, {
          template: SIMPLE_BUTTON,
          templateLock: "all"
        });
      } else {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks, {
          template: RICH_BUTTON,
          templateLock: "all"
        });
      }
    }()));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var value = attributes.twoButtonMobileFlex;
    var toggle = value ? 'jsb-sp-2col-on' : 'jsb-sp-2col-off';
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "gb-two-button-box " + toggle
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InnerBlocks.Content, null));
  }
});

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_fukidashi_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/fukidashi.js */ "./src/blocks/fukidashi.js");
/* harmony import */ var _blocks_blankspace_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/blankspace.js */ "./src/blocks/blankspace.js");
/* harmony import */ var _blocks_blogcard_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./blocks/blogcard.js */ "./src/blocks/blogcard.js");
/* harmony import */ var _blocks_border_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./blocks/border.js */ "./src/blocks/border.js");
/* harmony import */ var _blocks_ranking_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/ranking.js */ "./src/blocks/ranking.js");
/* harmony import */ var _blocks_twobuttons_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/twobuttons.js */ "./src/blocks/twobuttons.js");
//import







/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map