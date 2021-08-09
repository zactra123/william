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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admins/furnishers.js":
/*!*******************************************!*\
  !*** ./resources/js/admins/furnishers.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $(".go-to").click(function () {
    var page = $(this).parents('.page-navigation-container').find(".go-to-page").val();
    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search.slice(1));
    params.append('page', page);
    url.search = params;
    location.href = url.toString();
  });
  $('.go-to-page').keypress(function (e) {
    var key = e.which;

    if (key == 13) {
      var page = $(this).parents('.page-navigation-container').find(".go-to-page").val();
      var url = new URL(window.location.href);
      var params = new URLSearchParams(url.search.slice(1));
      params.append('page', page);
      url.search = params;
      location.href = url.toString();
    }
  });
  $('[data-toggle="popover"]').popover({
    html: true,
    title: "ARE YOU SURE?",
    content: function content() {
      var $this = $(this);
      return $("#confirmation").html().replace('{bank_id}', $($this).attr('data-id'));
    }
  }).click(function (e) {
    $('[data-toggle=popover]').not(this).popover('hide');
  });
  $(document).click(function (e) {
    if ($('[data-toggle=popover]').has(e.target).length == 0 && ($('.popover').has(e.target).length == 0 || $(e.target).is('.cancel'))) {
      $('[data-toggle=popover]').popover('hide');
    }
  });
  $(document).on('click', ".delete-bank", function (e) {
    var id = $(this).attr('data-id'),
        token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
      url: "/admins/furnishers/logo/" + id,
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token
      },
      success: function success() {
        location.reload();
      }
    });
  }); // $(".selectize-type").selectize({});

  $('.selectize-multiple').selectize({
    plugins: ['remove_button'],
    placeholder: "FILTER BY TYPE"
  }); // var $mSelect = $('#multi-select').selectize({ placeholder: "Select a value" });

  $('.selectize-single').selectize({
    selectOnTab: true
  });
  $(document).on('change', '#bank-type', function () {
    var bankType = $('#bank-type').val();
    console.log(bankType);

    if (bankType.includes("2") || bankType.includes("55")) {
      $('.state-filter').removeClass('hide');
    } else {
      $('.state-filter').addClass('hide');
    }
  });

  if ($(".autocomplete-search").length > 0) {
    $(".autocomplete-search").autocomplete({
      source: function source(request, response) {
        $.ajax({
          url: '/admins/furnishers/parent-bank',
          dataType: "json",
          data: {
            search_key: request.term
          },
          success: function success(data) {
            response(data);
          }
        });
      },
      select: function select(event, ui) {
        ui.item.value = ui.item.name;
      }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
      return $("<li>").attr("data-value", item.name).append(item.name).appendTo(ul);
    };
  }
});

/***/ }),

/***/ 4:
/*!*************************************************!*\
  !*** multi ./resources/js/admins/furnishers.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /opt/lampp/htdocs/credit_repair/resources/js/admins/furnishers.js */"./resources/js/admins/furnishers.js");


/***/ })

/******/ });