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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {


document.addEventListener('DOMContentLoaded', function () {

    // Dropzone
    Dropzone.options.formGalleryProject = {
        maxFiles: 1,
        accept: function accept(file, done) {
            done();
        },
        init: function init() {
            this.on("maxfilesexceeded", function (file) {
                alert("No more files please!");
            });
        }
    };

    // Wysiwyg
    var optionsCkEditor = {
        language: 'fr'
    };

    var aboutTextarea = document.querySelector('textarea.about');
    if (document.body.contains(aboutTextarea)) CKEDITOR.replace('about', optionsCkEditor);

    var descriptionTextarea = document.querySelector('textarea.description');
    if (document.body.contains(descriptionTextarea)) CKEDITOR.replace('description', optionsCkEditor);

    // Input type file and preview
    var readURL = function readURL(inputId, previewId) {

        var input = document.getElementById(inputId);
        var preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                preview.style.backgroundImage = "url(" + e.target.result + ")";
            };

            reader.readAsDataURL(input.files[0]);
        }
    };

    var inputAvatar = document.getElementById("avatar");
    if (document.body.contains(inputAvatar)) inputAvatar.addEventListener('change', function () {
        readURL("avatar", "previewAvatar");
    });

    var inputBgimg = document.getElementById("bgimg");
    if (document.body.contains(inputBgimg)) inputBgimg.addEventListener('change', function () {
        readURL("bgimg", "previewBgImg");
    });

    var inputUne = document.getElementById("une");
    if (document.body.contains(inputUne)) inputUne.addEventListener('change', function () {
        readURL("une", "previewUne");
    });

    // EVENTS
    // Delete projects
    [].forEach.call(document.querySelectorAll('.delete-project'), function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            e = e || window.event;
            var src = e.target || e.srcElement;

            while ("undefined" === src.getAttribute('data-id') || !src.getAttribute('data-id')) {
                src = src.parentElement;
            }

            var idproject = src.getAttribute('data-id');
            var token = src.getAttribute('data-token');

            var httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('project-' + idproject).style.display = 'none';
            };
            httpRequest.open('DELETE', 'projects/' + idproject);
            httpRequest.send();
        });
    });

    // Delete attachment
    [].forEach.call(document.querySelectorAll('.delete-attachment'), function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            e = e || window.event;
            var src = e.target || e.srcElement;

            while ("undefined" === src.getAttribute('data-id') || !src.getAttribute('data-id')) {
                src = src.parentElement;
            }

            var id = src.getAttribute('data-id');
            var token = src.getAttribute('data-token');
            var url = src.getAttribute('data-url');

            var httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('attach-' + id).style.display = 'none';
            };
            httpRequest.open('POST', url);
            httpRequest.send();
        });
    });

    // PAGE TECHNOS
    // Click on preview
    var previewsIconTechno = document.querySelectorAll('.previewTechno');
    if (previewsIconTechno) {
        [].forEach.call(previewsIconTechno, function (elt) {
            elt.addEventListener('click', function () {
                var input = elt.dataset.input;
                document.getElementById(input).click();
            });
        });
    }

    // Change image
    var inputsIconTechno = document.querySelectorAll('.inputIconTechno');
    if (inputsIconTechno) {
        [].forEach.call(inputsIconTechno, function (elt) {
            elt.addEventListener('change', function () {
                var reader = new FileReader();
                var techno = elt.id;
                var previewId = 'preview-' + techno;

                reader.onload = function (e) {
                    document.getElementById(previewId).setAttribute('src', e.target.result);
                };

                reader.readAsDataURL(elt.files[0]);
            });
        });
    }

    // Delete technos
    [].forEach.call(document.querySelectorAll('.delete-techno'), function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            e = e || window.event;
            var src = e.target || e.srcElement;

            while ("undefined" === src.getAttribute('data-id') || !src.getAttribute('data-id')) {
                src = src.parentElement;
            }

            var idtechno = src.getAttribute('data-id');
            var token = src.getAttribute('data-token');

            var httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('form-techno-' + idtechno).style.display = 'none';
            };
            httpRequest.open('DELETE', 'technos/' + idtechno);
            httpRequest.send();
        });
    });

    // Add techno User
    var btnAddUserTechno = document.getElementById('btnAddUserTechno');
    btnAddUserTechno.addEventListener('click', function (e) {
        e.preventDefault();

        e = e || window.event;
        var src = e.target || e.srcElement;

        var errormsg = document.getElementById('error-add-techno');
        var listUserTechnos = document.getElementById('list-technos-user');
        var inputTechno = document.getElementById('inputTechno');
        var idTechno = inputTechno.value;
        var labelTechno = inputTechno.options[inputTechno.selectedIndex].innerHTML;
        var versionTechno = document.getElementById('inputVersion').value;
        var percentTechno = document.getElementById('inputPercent').value;

        var httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = function (data) {
            if (data.target.readyState === 4) {
                if (data.target.status === 200) {
                    var li = document.createElement("li");
                    li.setAttribute("class", "row");
                    li.setAttribute("id", "techno-" + idTechno);

                    var html = "<div class=\"col-xs-3\">\n                                    Techno : <input type=\"text\" disabled value=\"" + labelTechno + "\" />\n                                </div>\n                                <div class=\"col-xs-3\">\n                                    Version : <input type=\"text\" disabled value=\"" + versionTechno + "\" />\n                                </div>\n                                <div class=\"col-xs-3\">\n                                    <input type=\"text\" disabled value=\"" + percentTechno + "\" /> %\n                                </div>\n                                <div class=\"col-xs-3 text-right\">\n                                    Refresh\n                                </div>";

                    li.innerHTML = html;
                    listUserTechnos.appendChild(li);
                } else {
                    errormsg.innerHTML = 'Error, check fields please !';
                }
            }
        };
        httpRequest.open('POST', '/iamanevangelist/techno-user/add/' + idTechno + '/' + versionTechno + '/' + percentTechno);
        httpRequest.send();
    });

    // Delete techno User
    [].forEach.call(document.querySelectorAll('.delete-techno-user'), function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            e = e || window.event;
            var src = e.target || e.srcElement;

            while ("undefined" === src.getAttribute('data-id-techno') || !src.getAttribute('data-id-techno')) {
                src = src.parentElement;
            }

            var idtechno = src.getAttribute('data-id-techno');
            var token = src.getAttribute('data-token');

            var httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function (data) {
                document.getElementById('techno-' + idtechno).style.display = 'none';
            };
            httpRequest.open('POST', '/iamanevangelist/techno-user/delete/' + idtechno);
            httpRequest.send();
        });
    });
});

/***/ }),
/* 1 */,
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(0);
__webpack_require__(2);
module.exports = __webpack_require__(3);


/***/ })
/******/ ]);