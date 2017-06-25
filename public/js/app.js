/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ 1:
/***/ (function(module, exports) {

// Scroll to a section
var scrollTo = function scrollTo(target) {
    var distance = document.querySelector(target).offsetTop;
    var scrollInterval = setInterval(function () {
        if (window.scrollY < distance) {
            if (window.scrollY + 25 <= distance) {
                window.scrollBy(0, 25);
            } else {
                var exceed = distance - window.scrollY;
                window.scrollBy(0, exceed);
            }
        } else {
            clearInterval(scrollInterval);
        }
    }, 10);
};

// One by One
var oneByOne = function oneByOne(group, interval) {
    var obj_ev = group.children;
    var arr_ev = Object.keys(obj_ev).map(function (key) {
        return obj_ev[key];
    });
    var length = arr_ev.length;

    var _loop = function _loop(i) {
        setTimeout(function () {
            var max = length - i;
            var random = Math.floor(Math.random() * max + 0);
            arr_ev[random].classList.add('loaded');
            arr_ev.splice(random, 1);
        }, interval * i);
    };

    for (var i = 0; i < length; i++) {
        _loop(i);
    }
};

document.addEventListener('DOMContentLoaded', function () {
    var body = document.querySelector('body');

    // Fadein content
    body.classList.add('loaded');

    // OneByOne effect
    var evangelists = document.querySelector('.evangelists');
    if (document.body.contains(evangelists)) oneByOne(evangelists, evangelists.getAttribute('data-interval'));

    var projects = document.querySelector('.projects');
    if (document.body.contains(projects)) oneByOne(projects, projects.getAttribute('data-interval'));

    /*
    * HOMEPAGE
    * */
    // Scroll to section
    document.body.onclick = function (e) {
        if (e.target.closest('button.btn-down')) {
            var target = e.target.closest('button').getAttribute('data-target');
            scrollTo(target);
        }
    };

    // Section Welcome animations
    var homepage = document.querySelector('#homepage');

    if (document.body.contains(homepage)) setTimeout(function () {
        document.querySelector('#homepage .bandes-container .bandes').classList.add('loaded');
        document.querySelector('#homepage .slogan-container').classList.add('loaded');
        [].forEach.call(document.querySelectorAll('#homepage .link-container .btn-down'), function (btn) {
            btn.classList.add('loaded');
        });
    }, 400);
});

/***/ }),

/***/ 5:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(1);


/***/ })

/******/ });