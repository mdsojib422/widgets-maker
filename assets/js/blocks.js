/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({



/***/ "./src/block.js":
/*!**********************!*\
  !*** ./src/block.js ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

    eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ \"@wordpress/blocks\");\n/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ \"@wordpress/block-editor\");\n/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);\n\n\n(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)('widgets-maker/widgets-maker-block', {\n  title: 'Widgets Maker',\n  icon: 'smiley',\n  category: 'common',\n  attributes: {\n    content: {\n      type: 'string',\n      source: 'html',\n      selector: 'p'\n    }\n  },\n  edit: function edit(_ref) {\n    var attributes = _ref.attributes,\n      setAttributes = _ref.setAttributes;\n    return /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText, {\n      tagName: \"p\",\n      value: attributes.content,\n      onChange: function onChange(content) {\n        return setAttributes({\n          content: content\n        });\n      },\n      placeholder: \"Enter your text here...\"\n    });\n  },\n  save: function save(_ref2) {\n    var attributes = _ref2.attributes;\n    return /*#__PURE__*/React.createElement(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText.Content, {\n      tagName: \"p\",\n      value: attributes.content\n    });\n  }\n});\n\n//# sourceURL=webpack:///./src/block.js?");

    /***/ }),
    
    /***/ "@wordpress/block-editor":
    /*!*************************************!*\
      !*** external ["wp","blockEditor"] ***!
      \*************************************/
    /***/ ((module) => {
    
    module.exports = wp.blockEditor;
    
    /***/ }),
    
    /***/ "@wordpress/blocks":
    /*!********************************!*\
      !*** external ["wp","blocks"] ***!
      \********************************/
    /***/ ((module) => {
    
    module.exports = wp.blocks;
    
    /***/ })
    
    /******/ 	});
    console.log(widmkr);
    
    /************************************************************************/
    /******/ 	// The module cache
    /******/ 	var __webpack_module_cache__ = {};
    /******/ 	
    /******/ 	// The require function
    /******/ 	function __webpack_require__(moduleId) {
    /******/ 		// Check if module is in cache
    /******/ 		var cachedModule = __webpack_module_cache__[moduleId];
    /******/ 		if (cachedModule !== undefined) {
    /******/ 			return cachedModule.exports;
    /******/ 		}
    /******/ 		// Create a new module (and put it into the cache)
    /******/ 		var module = __webpack_module_cache__[moduleId] = {
    /******/ 			// no module.id needed
    /******/ 			// no module.loaded needed
    /******/ 			exports: {}
    /******/ 		};
    /******/ 	
    /******/ 		// Execute the module function
    /******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
    /******/ 	
    /******/ 		// Return the exports of the module
    /******/ 		return module.exports;
    /******/ 	}
    /******/ 	
    /************************************************************************/
    /******/ 	/* webpack/runtime/compat get default export */
    /******/ 	(() => {
    /******/ 		// getDefaultExport function for compatibility with non-harmony modules
    /******/ 		__webpack_require__.n = (module) => {
    /******/ 			var getter = module && module.__esModule ?
    /******/ 				() => (module['default']) :
    /******/ 				() => (module);
    /******/ 			__webpack_require__.d(getter, { a: getter });
    /******/ 			return getter;
    /******/ 		};
    /******/ 	})();
    /******/ 	
    /******/ 	/* webpack/runtime/define property getters */
    /******/ 	(() => {
    /******/ 		// define getter functions for harmony exports
    /******/ 		__webpack_require__.d = (exports, definition) => {
    /******/ 			for(var key in definition) {
    /******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
    /******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
    /******/ 				}
    /******/ 			}
    /******/ 		};
    /******/ 	})();
    /******/ 	
    /******/ 	/* webpack/runtime/hasOwnProperty shorthand */
    /******/ 	(() => {
    /******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
    /******/ 	})();
    /******/ 	
    /******/ 	/* webpack/runtime/make namespace object */
    /******/ 	(() => {
    /******/ 		// define __esModule on exports
    /******/ 		__webpack_require__.r = (exports) => {
    /******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
    /******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
    /******/ 			}
    /******/ 			Object.defineProperty(exports, '__esModule', { value: true });
    /******/ 		};
    /******/ 	})();
    /******/ 	
    /************************************************************************/
    /******/ 	
    /******/ 	// startup
    /******/ 	// Load entry module and return exports
    /******/ 	// This entry module can't be inlined because the eval devtool is used.
    /******/ 	var __webpack_exports__ = __webpack_require__("./src/block.js");
    /******/ 	
    /******/ })()
    ;