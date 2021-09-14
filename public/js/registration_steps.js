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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/clients/registration_steps.js":
/*!****************************************************!*\
  !*** ./resources/js/clients/registration_steps.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var importantValidationOptions = {
  validClass: "not-error",
  rules: {
    "full_name": {
      required: true,
      valid_full_name: true
    },
    "phone_number": {
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
    }
  },
  errorPlacement: function errorPlacement(error, element) {
    element.removeClass('not-error');
  },
  submitHandler: function submitHandler(form) {
    var data = $(form).serialize();
    $.ajax({
      url: '/client/important-information',
      type: "POST",
      data: data,
      success: function success(data) {
        console.log('id:', $(form).attr('data-id'));
        registrationStepsSwitch(Number($(form).attr('data-id')));
      },
      error: function error(request, status, _error) {
        console.log(request.responseText);
      }
    });
  }
};
var documentValidationOptions = {
  validClass: "not-error",
  rules: {
    "social_security": {
      required: true,
      extension: "jpg|jpeg|png",
      filesize: 1073741824
    },
    "driver_license": {
      required: true,
      extension: "jpg|jpeg|png",
      filesize: true
    }
  },
  errorPlacement: function errorPlacement(error, element) {
    element.removeClass('not-error');
  },
  submitHandler: function submitHandler(form) {
    var data = new FormData(form);
    $.ajax({
      url: '/client/add/driver-license-social-security',
      type: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function success(data) {
        setupReviewData(data);
        registrationStepsSwitch(Number($(form).attr('data-id')));
      },
      error: function error(request, status, _error2) {
        console.log(request.responseText);
      }
    });
  }
};
var reviewValidationOptions = {
  validClass: "not-error",
  rules: {
    "client[full_name]": {
      required: true
    },
    "client[dob]": {
      required: true
    },
    "client[ssn]": {
      required: true
    },
    "client[address]": {
      required: true,
      valid_address: true
    },
    "client[zip]": {
      required: true
    },
    "client[sex_uploaded]": {
      required: true
    }
  },
  errorPlacement: function errorPlacement(error, element) {
    element.removeClass('not-error');
  },
  submitHandler: function submitHandler(form) {
    var data = $(form).serialize();
    console.log('asd');
    $.ajax({
      url: $(form).attr('action'),
      type: "PUT",
      data: data,
      success: function success(data) {
        registrationStepsSwitch(Number($(form).attr('data-id')));
      },
      error: function error(request, status, _error3) {
        console.log(request.responseText);
      }
    });
  }
};

setupReviewData = function setupReviewData(data) {
  $form = $('#add_client_5');

  if (!!data.uploadedData.first_name || !!data.uploadedData.last_name) {
    $form.find('[name="client[full_name]"]').val("".concat(data.uploadedData.first_name, " ").concat(data.uploadedData.last_name));
  }

  if (!!data.uploadedData.dob) {
    $form.find('[name="client[dob]"]').val(data.uploadedData.dob);
  }

  if (!!data.uploadedData.ssn) {
    $form.find('[name="client[ssn]"]').val(data.uploadedData.ssn);
  }

  if (!!data.uploadedData.number || !!data.uploadedData.name || !!data.uploadedData.city || !!data.uploadedData.state || !!data.uploadedData.zip) {
    $form.find('[name="client[address]"]').val("".concat(data.uploadedData.number, " ").concat(data.uploadedData.name, " ").concat(data.uploadedData.city, " ").concat(data.uploadedData.state, " ").concat(data.uploadedData.zip));
  }
};

var credentials = function credentials(form) {
  data = $(form).serialize();
  $.ajax({
    url: '/client/credentials-store',
    type: "POST",
    data: data,
    success: function success(data) {
      registrationStepsSwitch(Number($(form).attr('data-id')));
    },
    error: function error(request, status, _error4) {
      console.log(request.responseText);
    }
  });
};

$.validator.addMethod("valid_full_name", function (value, element) {
  return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
}, "Please write your full name in this pattern first name middle name last name!!");
$.validator.addMethod('filesize', function (value, element) {
  return this.optional(element) || element.files[0].size <= 10485760;
}, 'File size must be less than 1mb');
$.validator.addMethod("extension", function (value, element, param) {
  param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g";
  return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
}, "Please enter a value with a valid extension.");
$.validator.addMethod("valid_address", function (value, element) {
  // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
  return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
}, "Not valid address format.");

registrationStepsSwitch = function registrationStepsSwitch($old_id) {
  var $forms_count = Number($('.additional-reg:last').attr('data-id'));
  var $new_id = $old_id + 1;
  console.log($new_id, $forms_count, $old_id == $forms_count);

  if ($old_id == $forms_count) {
    $('.finish').removeClass('none');
    $('.finish').addClass('active').show();
    $(".additional-reg[data-id=\"".concat($old_id, "\"]")).addClass('none').removeClass('active').hide();
    $(".registration-stage[data-id=\"".concat($old_id, "\"]")).addClass('active');
    $(".stage-img[data-id=\"".concat($old_id, "\"]")).removeClass('nonactive');
    $(".registration-stage[data-id=\"finish\"]").addClass('prepare');
  } else if ($new_id <= $forms_count) {
    $(".additional-reg[data-id=\"".concat($old_id, "\"]")).addClass('none').removeClass('active').hide();
    $(".additional-reg[data-id=\"".concat($new_id, "\"]")).addClass('active').removeClass('none').show();
    $(".registration-stage[data-id=\"".concat($old_id, "\"]")).addClass('active');
    $(".stage-img[data-id=\"".concat($old_id, "\"]")).removeClass('nonactive');
    $(".registration-stage[data-id=\"".concat($new_id, "\"]")).addClass('prepare');
  }

  if ($new_id == 3) {
    $('.register-form').removeClass('big').addClass('large');
  }

  if ($new_id > 3) {
    $('.register-form').removeClass('large').addClass('big');
  }

  $('html, body').animate({
    scrollTop: $('.register-form').offset().top - 50
  }, 1000);
};

$(document).ready(function () {
  $(document).on('change', '#secret_question', function () {
    if ($(this).val() == "other") {
      $("#custom-secret-question").removeClass('none');
    } else {
      $("#custom-secret-question").addClass('none');
    }
  });
  $('.phone').mask('(000) 000-0000');
  $('.ssn').mask('000-00-0000');
  $('#register_form').validate(importantValidationOptions);
  $('#add_client_3').validate(documentValidationOptions);
  $('#add_client_4').submit(function (e) {
    e.preventDefault();
    credentials(this);
  });
  $('#add_client_5').validate(reviewValidationOptions);
});

/***/ }),

/***/ "./resources/js/registration_steps.js":
/*!********************************************!*\
  !*** ./resources/js/registration_steps.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./clients/registration_steps.js */ "./resources/js/clients/registration_steps.js");

/***/ }),

/***/ 3:
/*!**************************************************!*\
  !*** multi ./resources/js/registration_steps.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\credit_repair\resources\js\registration_steps.js */"./resources/js/registration_steps.js");


/***/ })

/******/ });