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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/clients/registration.js":
/*!**********************************************!*\
  !*** ./resources/js/clients/registration.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// $(document).ready(function($) {
//     /
//
//     $('.ssn').mask('000-00-0000')
//     $('.ein').mask('00-0000000')
//     $('.phone').mask('(000) 000-0000')
//     $('#phone_number').mask('(000) 000-0000');
//
//     $.validator.addMethod("valid_full_name", function (value, element) {
//         return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
//     }, "Please write your full name in this pattern first name middle name last name!!");
//
//     $.validator.addMethod("password_requirements", function (value, element) {
//         var valid_length = !!value.match(/^(.{8,20})$/gm)
//         var upper_lower = !!value.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
//         var digit = !!value.match(/\d/gm)
//         var special = !!value.match(/\W|_/g)
//
//         return valid_length && upper_lower && digit && special
//             // && other_special && repeating && consecutive && spaces && !include_email
//     }, "Please pay attention on password requirements");
//
//     // $('#password,#password-confirm').on('focus keyup', function(){
//     $('#password').on('focus keyup', function(){
//         var $this = this;
//         $($this).popover({
//             html: true,
//             trigger: 'manual',
//             content: function () {
//                 var default_class = 'fa-check-circle text-secondary',
//                     success_class = 'fa-check-circle text-success',
//                     failed_class = 'fa-minus-circle text-danger',
//                     password_requirements_template = $('#password-requirements').html(),
//                     password = $($this).val();
//
//                 if (!password.length) {
//                     password_requirements = password_requirements_template
//                         .replace('{length-class}', default_class)
//                         .replace('{letters-class}', default_class)
//                         .replace('{digit-class}', default_class)
//                         .replace('{special-class}', default_class)
//                 } else {
//                     valid_length = !!password.match(/^(.{8,20})$/gm)
//                     upper_lower = !!password.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
//                     digit = !!password.match(/\d/gm)
//                     special = !!password.match(/\W|_/g)
//
//                     password_requirements = password_requirements_template
//                         .replace('{length-class}', valid_length ? success_class : failed_class)
//                         .replace('{letters-class}', upper_lower ? success_class : failed_class)
//                         .replace('{digit-class}', digit ? success_class : failed_class)
//                         .replace('{special-class}', special ? success_class : failed_class)
//                 }
//
//
//                 return password_requirements
//             },
//             title: 'Password Requirements',
//             placement: (window.innerWidth <1000 ? 'bottom' : 'right')
//         })
//
//         $($this).popover('show')
//         $($this).popover('update')
//     })
//
//     $('#password').on('focusout', function(){
//         $(this).popover('hide')
//     })
//
//     $('#password-confirm').bind("cut copy paste",function(e) {
//         e.preventDefault();
//     });
//
//
//
//     $('#registration-form').validate()
//
//
//     $('#client-registration-form').submit(function () {
//         if (!$(this).valid()){
//             $('#client-registration-form .form-control.error')[0].focus()
//         }
//     })
//
//     $('#secret_question').on('change', function(){
//         if ($(this).val() == "other") {
//             $("#custom-secret-question").removeClass('hidden')
//         } else {
//             $("#custom-secret-question").addClass('hidden')
//         }
//     })
// });
var validationOptions = {
  validClass: "not-error",
  rules: {
    "full_name": {
      required: true,
      valid_full_name: true
    },
    "phone_number": {
      required: true
    },
    'ssn': {
      required: {
        depends: function depends() {
          return $('input[name="ein"]').val() == undefined || $('input[name="ein"]').val() == '';
        }
      },
      valid_length: {
        param: 11,
        depends: function depends(element) {
          return $('input[name="ssn"]').val() != '';
        }
      }
    },
    'ein': {
      required: {
        depends: function depends() {
          return $('input[name="ssn"]').val() == undefined || !$('input[name="ssn"]').valid();
        }
      },
      valid_length: {
        param: 10,
        depends: function depends(element) {
          return $('input[name="ein"]').val() != undefined && $('input[name="ein"]').val() != '';
        }
      }
    },
    "dob": {
      required: true
    },
    "sex": {
      required: true
    },
    "secret_question": {
      required: true
    },
    "secret_answer": {
      required: true
    },
    "email": {
      required: true,
      email: true
    },
    "address": {
      required: true,
      valid_address: true
    },
    "password": {
      required: true,
      password_requirements: true
    },
    "password_confirmation": {
      required: true,
      equalTo: "#register_password_confirm"
    }
  },
  messages: {
    "password": 'Please use valid password format',
    "password_confirmation": {
      equalTo: "Password confirmation doesn't match Password"
    }
  },
  errorPlacement: function errorPlacement(error, element) {
    element.removeClass('not-error');
  }
};
$.validator.addMethod("password_requirements", function (value, element) {
  var valid_length = !!value.match(/^(.{8,20})$/gm);
  var upper_lower = !!value.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm);
  var digit = !!value.match(/\d/gm);
  var special = !!value.match(/\W|_/g);
  return valid_length && upper_lower && digit && special; // && other_special && repeating && consecutive && spaces && !include_email
}, "Please pay attention on password requirements");
$.validator.addMethod("valid_full_name", function (value, element) {
  return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
}, "Please write your full name in this pattern first name middle name last name!!");
$.validator.addMethod("valid_length", function (value, element, require_length) {
  return value.length == require_length;
}, "This field is not valid!");
$.validator.addMethod("valid_address", function (value, element) {
  // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
  return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
}, "Not valid address format.");
$(document).ready(function () {
  $('.ssn').mask('000-00-0000');
  $('.ein').mask('00-0000000');
  $('.phone').mask('(000) 000-0000');
  var $type = 'client';
  $('form.additional-reg').on('submit', function (e) {
    e.preventDefault();
    $type = $("input[type='radio']:checked").val();
    $form = $("[id=\"".concat($type, "-registration-form\"]")).html();
    $(".register_form").html($form);
    $('.ssn').mask('000-00-0000');
    $('.ein').mask('00-0000000');
    $('.phone').mask('(000) 000-0000'); //Validation Start

    $('#register_form').validate(validationOptions); //Validation End
    // autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
    // google.maps.event.addListener(autocomplete, 'place_changed', function() {
    //     var place = autocomplete.getPlace();
    //     for (var i = 0; i < place.address_components.length; i++) {
    //         for (var j = 0; j < place.address_components[i].types.length; j++) {
    //             if (place.address_components[i].types[j] == "postal_code") {
    //                 $("#zip").val(place.address_components[i].long_name);
    //
    //             }
    //         }
    //     }
    // });

    $(document).bind("cut copy paste", '#register_password', function (e) {
      e.preventDefault();
    });
    var $old_id = Number($(this).attr('data-id'));
    var $new_id = $old_id + 1;
    $(".additional-reg[data-id=\"".concat($old_id, "\"]")).addClass('none').removeClass('active').hide();
    $(".additional-reg[data-id=\"".concat($new_id, "\"]")).addClass('active').removeClass('none').show();
    $(".registration-stage[data-id=\"".concat($old_id, "\"]")).addClass('active');
    $(".stage-img[data-id=\"".concat($old_id, "\"]")).removeClass('nonactive');
    $(".registration-stage[data-id=\"".concat($new_id, "\"]")).addClass('prepare');
    $('html, body').animate({
      scrollTop: $('.register-form').offset().top - 50
    }, 1000);
  });
  $(document).on('change', '#secret_question', function () {
    if ($(this).val() == "other") {
      $("#custom-secret-question").removeClass('none');
    } else {
      $("#custom-secret-question").addClass('none');
    }
  });
  var $register_type = $('input[name="register_type"]');
  $register_type.on('change', function () {
    $(this).parents('.register-type').addClass('active');
    $(this).parents('.register-type').siblings('.active').removeClass('active');

    if ($(this).val() == "broker") {
      $('.registration-stage[data-type="only_broker"]').addClass('up');
      setTimeout(function () {
        $('.registration-stage[data-type="only_broker"]').addClass('hidden');
        $('.registration-stages').addClass('center');
      }, 100);
    } else {
      $('.registration-stage[data-type="only_broker"]').removeClass('hidden');
      setTimeout(function () {
        $('.registration-stage[data-type="only_broker"]').removeClass('up');
      }, 100);
      setTimeout(function () {
        $('.registration-stages').removeClass('center');
      }, 800);
    }
  });
  $(document).on('focus keyup', '#register_password', function () {
    var $this = this;
    $($this).popover({
      html: true,
      trigger: 'manual',
      content: function content() {
        var default_class = 'fa-check-circle text-secondary',
            success_class = 'fa-check-circle text-success',
            failed_class = 'fa-minus-circle text-danger',
            password_requirements_template = $('#password-requirements').html(),
            password = $($this).val();

        if (!password.length) {
          password_requirements = password_requirements_template.replace('{length-class}', default_class).replace('{letters-class}', default_class).replace('{digit-class}', default_class).replace('{special-class}', default_class);
        } else {
          valid_length = !!password.match(/^(.{8,20})$/gm);
          upper_lower = !!password.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm);
          digit = !!password.match(/\d/gm);
          special = !!password.match(/\W|_/g);
          password_requirements = password_requirements_template.replace('{length-class}', valid_length ? success_class : failed_class).replace('{letters-class}', upper_lower ? success_class : failed_class).replace('{digit-class}', digit ? success_class : failed_class).replace('{special-class}', special ? success_class : failed_class);
        }

        return password_requirements;
      },
      title: 'Password Requirements',
      placement: window.innerWidth < 1000 ? 'bottom' : 'right'
    });
    $($this).popover('show');
    $($this).popover('update');
  });
  $(document).on('focusout', '#register_password', function () {
    $(this).popover('hide');
  });
});

/***/ }),

/***/ "./resources/js/registration.js":
/*!**************************************!*\
  !*** ./resources/js/registration.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./clients/registration.js */ "./resources/js/clients/registration.js");

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/registration.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /opt/lampp/htdocs/credit_repair/resources/js/registration.js */"./resources/js/registration.js");


/***/ })

/******/ });