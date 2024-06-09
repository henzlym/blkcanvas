/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/color-mode.js":
/*!******************************!*\
  !*** ./src/js/color-mode.js ***!
  \******************************/
/***/ (() => {

eval("(function () {\n  'use strict';\n\n  var getStoredTheme = function getStoredTheme() {\n    return localStorage.getItem('theme');\n  };\n  var setStoredTheme = function setStoredTheme(theme) {\n    return localStorage.setItem('theme', theme);\n  };\n  var getPreferredTheme = function getPreferredTheme() {\n    var storedTheme = getStoredTheme();\n    if (storedTheme) {\n      return storedTheme;\n    }\n    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';\n  };\n  var setTheme = function setTheme(theme) {\n    if (theme === 'auto') {\n      document.documentElement.setAttribute('data-bs-theme', window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');\n    } else {\n      document.documentElement.setAttribute('data-bs-theme', theme);\n    }\n  };\n  setTheme(getPreferredTheme());\n  var showActiveTheme = function showActiveTheme(theme) {\n    var focus = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;\n    var themeSwitcher = document.querySelector('#bd-theme');\n    if (!themeSwitcher) {\n      return;\n    }\n    var themeSwitcherText = document.querySelector('#bd-theme-text');\n    var btnToActive = document.querySelector(\"[data-bs-theme-value=\\\"\".concat(theme, \"\\\"]\"));\n    document.querySelectorAll('[data-bs-theme-value]').forEach(function (element) {\n      element.classList.remove('active');\n      element.setAttribute('aria-pressed', 'false');\n    });\n    btnToActive.classList.add('active');\n    btnToActive.setAttribute('aria-pressed', 'true');\n    var themeSwitcherLabel = \"\".concat(themeSwitcherText.textContent, \" (\").concat(btnToActive.dataset.bsThemeValue, \")\");\n    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel);\n    if (focus) {\n      themeSwitcher.focus();\n    }\n  };\n  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function () {\n    var storedTheme = getStoredTheme();\n    if (storedTheme !== 'light' && storedTheme !== 'dark') {\n      setTheme(getPreferredTheme());\n    }\n  });\n  window.addEventListener('DOMContentLoaded', function () {\n    showActiveTheme(getPreferredTheme());\n    console.log('color-modes');\n    document.querySelectorAll('[data-bs-theme-value]').forEach(function (toggle) {\n      toggle.addEventListener('click', function () {\n        var theme = toggle.getAttribute('data-bs-theme-value');\n        setStoredTheme(theme);\n        setTheme(theme);\n        showActiveTheme(theme, true);\n      });\n    });\n  });\n})();\n\n//# sourceURL=webpack://website-framework/./src/js/color-mode.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./src/js/color-mode.js"]();
/******/ 	
/******/ })()
;