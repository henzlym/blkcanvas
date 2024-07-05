/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/bootstrap-navbar/src/edit.js":
/*!*********************************************!*\
  !*** ./blocks/bootstrap-navbar/src/edit.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/core-data */ "@wordpress/core-data");
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _inspector__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./inspector */ "./blocks/bootstrap-navbar/src/inspector.js");
/* harmony import */ var _use_navigation_entities__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./use-navigation-entities */ "./blocks/bootstrap-navbar/src/use-navigation-entities.js");







function Edit({
  attributes,
  setAttributes
}) {
  const {
    navbarBrand,
    selectedMenu,
    enableSearch,
    searchLabel,
    searchPlaceholder,
    searchButtonText
  } = attributes;
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)({
    className: "navbar navbar-expand-lg bg-body-tertiary"
  });
  const {
    title
  } = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)(select => {
    const siteEntities = select(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__.store).getEntityRecord("root", "__unstableBase");
    return {
      title: siteEntities?.name
    };
  }, []);
  const {
    menus,
    menuItems
  } = (0,_use_navigation_entities__WEBPACK_IMPORTED_MODULE_6__["default"])(selectedMenu);
  const onSelectImage = media => {
    setAttributes({
      navbarBrand: media.url
    });
  };
  const onRemoveImage = () => {
    setAttributes({
      navbarBrand: ""
    });
  };
  const renderMenuItems = (items, parentId = 0) => {
    return items.filter(item => item.parent === parentId).map(item => {
      const children = items.filter(child => child.parent === item.id);
      return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
        key: item.id,
        className: `nav-item ${children.length > 0 ? "dropdown" : ""}`
      }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
        className: `nav-link ${children.length > 0 ? "dropdown-toggle" : ""}`,
        href: item.url,
        ...(children.length > 0 ? {
          "data-bs-toggle": "dropdown"
        } : {})
      }, item.title.rendered), children.length > 0 && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
        className: "dropdown-menu"
      }, renderMenuItems(items, item.id)));
    });
  };
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("nav", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "container-fluid"
  }, navbarBrand ? (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    src: navbarBrand,
    alt: title,
    className: "navbar-brand"
  }) : (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "navbar-brand",
    href: "#"
  }, title), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.MediaUploadCheck, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.MediaUpload, {
    onSelect: onSelectImage,
    allowedTypes: ["image"],
    value: navbarBrand,
    render: ({
      open
    }) => (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
      onClick: open,
      variant: "primary"
    }, navbarBrand ? "Change Image" : "Upload Image"), navbarBrand && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.Button, {
      onClick: onRemoveImage,
      variant: "secondary",
      className: "ml-2"
    }, "Remove Image"))
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_inspector__WEBPACK_IMPORTED_MODULE_5__["default"], {
    attributes,
    setAttributes
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "navbar-toggler",
    type: "button",
    "data-bs-toggle": "collapse",
    "data-bs-target": "#navbarSupportedContent",
    "aria-controls": "navbarSupportedContent",
    "aria-expanded": "false",
    "aria-label": "Toggle navigation"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "navbar-toggler-icon"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "collapse navbar-collapse",
    id: "navbarSupportedContent"
  }, selectedMenu && menuItems && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    className: "navbar-nav me-auto mb-2 mb-lg-0"
  }, renderMenuItems(menuItems)), enableSearch && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("form", {
    className: "d-flex",
    role: "search"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    htmlFor: "navbarSearch",
    className: "visually-hidden"
  }, searchLabel), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    className: "form-control me-2",
    type: "search",
    id: "navbarSearch",
    placeholder: searchPlaceholder,
    "aria-label": searchLabel
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "btn btn-outline-success",
    type: "submit"
  }, searchButtonText)))));
}

/***/ }),

/***/ "./blocks/bootstrap-navbar/src/index.js":
/*!**********************************************!*\
  !*** ./blocks/bootstrap-navbar/src/index.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./blocks/bootstrap-navbar/src/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./blocks/bootstrap-navbar/src/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./blocks/bootstrap-navbar/src/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./blocks/bootstrap-navbar/src/block.json");
/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */


/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */


/**
 * Internal dependencies
 */




/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  /**
   * @see ./edit.js
   */
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  /**
   * @see ./save.js
   */
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./blocks/bootstrap-navbar/src/inspector.js":
/*!**************************************************!*\
  !*** ./blocks/bootstrap-navbar/src/inspector.js ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Inspector)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/core-data */ "@wordpress/core-data");
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_4__);





function Inspector({
  attributes,
  setAttributes
}) {
  const {
    selectedMenu,
    enableSearch,
    searchLabel,
    searchPlaceholder,
    searchButtonText
  } = attributes;
  const menus = (0,_wordpress_data__WEBPACK_IMPORTED_MODULE_4__.useSelect)(select => {
    return select(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_3__.store).getMenus();
  }, []);
  const menuOptions = menus ? menus.map(menu => ({
    value: menu.id,
    label: menu.name
  })) : [];
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: "Navbar Settings",
    initialOpen: true
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: "Select Menu",
    value: selectedMenu,
    options: [{
      value: "",
      label: "None"
    }, ...menuOptions],
    onChange: selectedMenu => setAttributes({
      selectedMenu
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: "Enable Search Form",
    checked: enableSearch,
    onChange: enableSearch => setAttributes({
      enableSearch
    })
  }), enableSearch && (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(react__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: "Search Input Label",
    value: searchLabel,
    onChange: searchLabel => setAttributes({
      searchLabel
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: "Search Input Placeholder",
    value: searchPlaceholder,
    onChange: searchPlaceholder => setAttributes({
      searchPlaceholder
    })
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.TextControl, {
    label: "Search Button Text",
    value: searchButtonText,
    onChange: searchButtonText => setAttributes({
      searchButtonText
    })
  }))));
}

/***/ }),

/***/ "./blocks/bootstrap-navbar/src/save.js":
/*!*********************************************!*\
  !*** ./blocks/bootstrap-navbar/src/save.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var clsx__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! clsx */ "./node_modules/clsx/dist/clsx.mjs");



function save() {
  const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps.save({
    className: (0,clsx__WEBPACK_IMPORTED_MODULE_2__["default"])({
      "navbar navbar-expand-lg bg-body-tertiary": true
    })
  });
  return (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("nav", {
    ...blockProps
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "container-fluid"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "navbar-brand",
    href: "#"
  }, "Navbar"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "navbar-toggler",
    type: "button",
    "data-bs-toggle": "collapse",
    "data-bs-target": "#navbarSupportedContent",
    "aria-controls": "navbarSupportedContent",
    "aria-expanded": "false",
    "aria-label": "Toggle navigation"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    className: "navbar-toggler-icon"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "collapse navbar-collapse",
    id: "navbarSupportedContent"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    className: "navbar-nav me-auto mb-2 mb-lg-0"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: "nav-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "nav-link active",
    "aria-current": "page",
    href: "#"
  }, "Home")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: "nav-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "nav-link",
    href: "#"
  }, "Link")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: "nav-item dropdown"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "nav-link dropdown-toggle",
    href: "#",
    role: "button",
    "data-bs-toggle": "dropdown",
    "aria-expanded": "false"
  }, "Dropdown"), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    className: "dropdown-menu"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "dropdown-item",
    href: "#"
  }, "Action")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "dropdown-item",
    href: "#"
  }, "Another action")), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("hr", {
    className: "dropdown-divider"
  })), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "dropdown-item",
    href: "#"
  }, "Something else here")))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: "nav-item"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    className: "nav-link disabled",
    "aria-disabled": "true"
  }, "Disabled"))), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("form", {
    className: "d-flex",
    role: "search"
  }, (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    className: "form-control me-2",
    type: "search",
    placeholder: "Search",
    "aria-label": "Search"
  }), (0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("button", {
    className: "btn btn-outline-success",
    type: "submit"
  }, "Search")))));
}

/***/ }),

/***/ "./blocks/bootstrap-navbar/src/use-navigation-entities.js":
/*!****************************************************************!*\
  !*** ./blocks/bootstrap-navbar/src/use-navigation-entities.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ useNavigationEntities)
/* harmony export */ });
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/core-data */ "@wordpress/core-data");
/* harmony import */ var _wordpress_core_data__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_core_data__WEBPACK_IMPORTED_MODULE_0__);
/**
 * WordPress dependencies
 */


/**
 * @typedef {Object} NavigationEntitiesData
 * @property {Array|undefined} pages                - a collection of WP Post entity objects of post type "Page".
 * @property {boolean}         isResolvingPages     - indicates whether the request to fetch pages is currently resolving.
 * @property {boolean}         hasResolvedPages     - indicates whether the request to fetch pages has finished resolving.
 * @property {Array|undefined} menus                - a collection of Menu entity objects.
 * @property {boolean}         isResolvingMenus     - indicates whether the request to fetch menus is currently resolving.
 * @property {boolean}         hasResolvedMenus     - indicates whether the request to fetch menus has finished resolving.
 * @property {Array|undefined} menusItems           - a collection of Menu Item entity objects for the current menuId.
 * @property {boolean}         hasResolvedMenuItems - indicates whether the request to fetch menuItems has finished resolving.
 * @property {boolean}         hasPages             - indicates whether there is currently any data for pages.
 * @property {boolean}         hasMenus             - indicates whether there is currently any data for menus.
 */

/**
 * Manages fetching and resolution state for all entities required
 * for the Navigation block.
 *
 * @param {number} menuId the menu for which to retrieve menuItem data.
 * @return { NavigationEntitiesData } the entity data.
 */
function useNavigationEntities(menuId) {
  const {
    records: menus,
    isResolving: isResolvingMenus,
    hasResolved: hasResolvedMenus
  } = (0,_wordpress_core_data__WEBPACK_IMPORTED_MODULE_0__.useEntityRecords)("root", "menu", {
    per_page: -1,
    context: "view"
  });
  const {
    records: pages,
    isResolving: isResolvingPages,
    hasResolved: hasResolvedPages
  } = (0,_wordpress_core_data__WEBPACK_IMPORTED_MODULE_0__.useEntityRecords)("postType", "page", {
    parent: 0,
    order: "asc",
    orderby: "id",
    per_page: -1,
    context: "view"
  });
  const {
    records: menuItems,
    hasResolved: hasResolvedMenuItems
  } = (0,_wordpress_core_data__WEBPACK_IMPORTED_MODULE_0__.useEntityRecords)("root", "menuItem", {
    menus: menuId,
    per_page: -1,
    context: "view"
  }, {
    enabled: !!menuId
  });
  return {
    pages,
    isResolvingPages,
    hasResolvedPages,
    hasPages: !!(hasResolvedPages && pages?.length),
    menus,
    isResolvingMenus,
    hasResolvedMenus,
    hasMenus: !!(hasResolvedMenus && menus?.length),
    menuItems,
    hasResolvedMenuItems
  };
}

/***/ }),

/***/ "./blocks/bootstrap-navbar/src/style.scss":
/*!************************************************!*\
  !*** ./blocks/bootstrap-navbar/src/style.scss ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ ((module) => {

module.exports = window["React"];

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/core-data":
/*!**********************************!*\
  !*** external ["wp","coreData"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["coreData"];

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["data"];

/***/ }),

/***/ "./node_modules/clsx/dist/clsx.mjs":
/*!*****************************************!*\
  !*** ./node_modules/clsx/dist/clsx.mjs ***!
  \*****************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   clsx: () => (/* binding */ clsx),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
function r(e){var t,f,n="";if("string"==typeof e||"number"==typeof e)n+=e;else if("object"==typeof e)if(Array.isArray(e)){var o=e.length;for(t=0;t<o;t++)e[t]&&(f=r(e[t]))&&(n&&(n+=" "),n+=f)}else for(f in e)e[f]&&(n&&(n+=" "),n+=f);return n}function clsx(){for(var e,t,f=0,n="",o=arguments.length;f<o;f++)(e=arguments[f])&&(t=r(e))&&(n&&(n+=" "),n+=t);return n}/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (clsx);

/***/ }),

/***/ "./blocks/bootstrap-navbar/src/block.json":
/*!************************************************!*\
  !*** ./blocks/bootstrap-navbar/src/block.json ***!
  \************************************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"create-block/bootstrap-navbar","version":"0.1.0","title":"Bootstrap Navbar","category":"widgets","icon":"menu","description":"A custom block for adding a Bootstrap navbar.","example":{},"supports":{"html":false},"attributes":{"navbarBrand":{"type":"string","default":""},"selectedMenu":{"type":"number"},"enableSearch":{"type":"boolean","default":false},"searchLabel":{"type":"string","default":"Search"},"searchPlaceholder":{"type":"string","default":"Search"},"searchButtonText":{"type":"string","default":"Search"}},"textdomain":"bootstrap-navbar","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","viewScript":"file:./view.js"}');

/***/ })

/******/ 	});
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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"index": 0,
/******/ 			"./style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkbootstrap_container"] = globalThis["webpackChunkbootstrap_container"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["./style-index"], () => (__webpack_require__("./blocks/bootstrap-navbar/src/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map