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
/******/ 	return __webpack_require__(__webpack_require__.s = 59);
/******/ })
/************************************************************************/
/******/ ({

/***/ 59:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(60);


/***/ }),

/***/ 60:
/***/ (function(module, exports, __webpack_require__) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

function gestionarErrores(input, errores) {
    var noEnviarFormulario = false;
    input = $(input);
    if ((typeof errores === "undefined" ? "undefined" : _typeof(errores)) !== ( true ? "undefined" : _typeof(undefined))) {
        input.removeClass("is-invalid");
        input.addClass("is-invalid");
        input.nextAll(".invalid-feedback").remove();
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
            for (var _iterator = errores[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
                var error = _step.value;

                input.after("<div class=\"invalid-feedback\">\n                <strong> " + error + " </strong>\n            </div>");
            }
        } catch (err) {
            _didIteratorError = true;
            _iteratorError = err;
        } finally {
            try {
                if (!_iteratorNormalCompletion && _iterator.return) {
                    _iterator.return();
                }
            } finally {
                if (_didIteratorError) {
                    throw _iteratorError;
                }
            }
        }

        noEnviarFormulario = true;
    } else {
        input.removeClass("is-invalid");
        input.addClass("is-valid");
        input.nextAll(".invalid-feedback").remove();
    }
    return noEnviarFormulario;
}

function validateTarget(target) {
    var formData = new FormData();
    formData.append(target.id, target.value);
    $(target).parent().next(".spinner").addClass("loader");
    axios.post('/createProducto/validate', formData).then(function (response) {
        $(target).parent().next(".spinner").removeClass("loader");
        switch (target.id) {
            case "nombre":
                gestionarErrores(target, response.data.nombre);
                break;
            case "precio":
                gestionarErrores(target, response.data.precio);
                break;
            case "stock":
                gestionarErrores(target, response.data.stock);
                break;
            case "sabor":
                gestionarErrores(target, response.data.sabor);
                break;
            case "caracteristicas":
                gestionarErrores(target, response.data.caracteristicas);
                break;
        }
    }).catch(function (error) {
        console.log(error);
    });
}

$(function () {
    $("#nombre,#precio,#stock,#sabor,#caracteristicas").on('change', function (e) {
        validateTarget(e.target);
    });

    $("#botonCrearProducto").click(function (e) {
        e.preventDefault();
        var enviarFormulario = true;
        var formData = new FormData();
        formData.append('nombre', $("#nombre").val());
        formData.append('precio', $("#precio").val());
        formData.append('stock', $("#stock").val());
        formData.append('sabor', $("#sabor").val());
        formData.append('caracteristicas', $("#caracteristicas").val());

        axios.post('/createProducto/validate', formData).then(function (response) {
            if (gestionarErrores("#nombre", response.data.nombre)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#precio", response.data.precio)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#stock", response.data.stock)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#sabor", response.data.sabor)) {
                enviarFormulario = false;
            }

            if (gestionarErrores("#caracteristicas", response.data.caracteristicas)) {
                enviarFormulario = false;
            }

            if (enviarFormulario === true) {
                $("#formularioCrearProducto").submit();
            }
        });
    });
});

/***/ })

/******/ });