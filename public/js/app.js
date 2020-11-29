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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/adminDatatable.js":
/*!****************************************!*\
  !*** ./resources/js/adminDatatable.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  var pendingtable = $(".waiting-approval-user-data").DataTable({
    processing: true,
    serverSide: true,
    bDestroy: true,
    ajax: "pending-user-data",
    columns: [{
      data: "id",
      name: "id"
    }, {
      data: "industry",
      name: "industry"
    }, {
      data: "country",
      name: "country"
    }, {
      data: "fullname",
      name: "fullname"
    }, {
      data: "email",
      name: "email"
    }, {
      data: "link",
      name: "link"
    }, {
      data: "action",
      name: "action"
    }],
    scrollX: true,
    pagingType: "full",
    initComplete: function initComplete() {
      var column = this.api().column(1);
      var select = $('<select class=" ml-2 custom-select custom-select-sm form-control form-control-sm"><option value=""></option></select>').appendTo($("#DataTables_Table_0_length")).on("change", function () {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        column.search(val ? "^" + val + "$" : "", true, false).draw();
      });
      column.data().unique().sort(function (d, j) {
        select.append('<option value="' + d + '">' + d + "</option>");
      });
    }
  });
  var userListtable = $(".active-user-data").DataTable({
    processing: true,
    serverSide: true,
    bDestroy: true,
    ajax: "active-user-data",
    columns: [{
      data: "id",
      name: "id"
    }, {
      data: "industry",
      name: "industry"
    }, {
      data: "country",
      name: "country"
    }, {
      data: "fullname",
      name: "fullname"
    }, {
      data: "email",
      name: "email"
    }, {
      data: "link",
      name: "link"
    }, {
      data: "action",
      name: "action"
    }],
    scrollX: true,
    pagingType: "full",
    initComplete: function initComplete() {
      var column = this.api().column(1);
      var select = $('<select class=" ml-2 custom-select custom-select-sm form-control form-control-sm"><option value=""></option></select>').appendTo($("#DataTables_Table_1_length")).on("change", function () {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        column.search(val ? "^" + val + "$" : "", true, false).draw();
      });
      column.data().unique().sort(function (d, j) {
        select.append('<option value="' + d + '">' + d + "</option>");
      });
    }
  });
  $(document).on("click", ".approve-button", function () {
    var userid = parseInt($(this).attr("id"));
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "POST",
      url: "approve-user",
      data: {
        approve_id: userid
      },
      success: function success(data) {
        pendingtable.ajax.reload();
        userListtable.ajax.reload();
      }
    });
  });
  $(document).on("click", ".unpublish-button", function () {
    var userid = parseInt($(this).attr("id"));
    $.ajaxSetup({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      }
    });
    $.ajax({
      type: "POST",
      url: "unpublish-user",
      data: {
        unpublish_id: userid
      },
      success: function success(data) {
        pendingtable.ajax.reload();
        userListtable.ajax.reload();
      }
    });
  });
  $(document).on("click", ".delete-button", function () {
    var userid = parseInt($(this).attr("id"));
    var confirmation = confirm("Are you sure to Delete the data");

    if (confirmation == true) {
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      });
      $.ajax({
        type: "POST",
        url: "remove-user",
        data: {
          delete_id: userid
        },
        success: function success(data) {
          pendingtable.ajax.reload();
        }
      });
    }
  });
  $(document).on("click", ".delete-active-user-button", function () {
    var userid = parseInt($(this).attr("id"));
    var confirmation = confirm("Are you sure to Delete the data");

    if (confirmation == true) {
      $.ajaxSetup({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
      });
      $.ajax({
        type: "POST",
        url: "remove-user",
        data: {
          delete_id: userid
        },
        success: function success(data) {
          userListtable.ajax.reload();
        }
      });
    }
  });
});

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require("./bootstrap");
__webpack_require__(/*! ./frontendDatatable */ "./resources/js/frontendDatatable.js");

__webpack_require__(/*! ./adminDatatable */ "./resources/js/adminDatatable.js");

__webpack_require__(/*! ./updateProfilePicture */ "./resources/js/updateProfilePicture.js"); // require("./approveDecline");
// window.Vue = require("vue");
// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component(
//     "example-component",
//     require("./components/ExampleComponent.vue").default
// );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// const app = new Vue({
//     el: "#app"
// });

/***/ }),

/***/ "./resources/js/frontendDatatable.js":
/*!*******************************************!*\
  !*** ./resources/js/frontendDatatable.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $(".user-data").DataTable({
    processing: true,
    serverSide: true,
    ajax: "userdata",
    columns: [{
      data: "name",
      name: "name"
    }, {
      data: "industry",
      name: "industry"
    }, {
      data: "location",
      name: "location"
    }],
    scrollX: true,
    pagingType: "full",
    initComplete: function initComplete() {
      var column = this.api().column(1);
      var select = $('<select class="ml-2 custom-select custom-select-sm form-control form-control-sm"><option value=""></option></select>').appendTo($("#DataTables_Table_0_length")).on("change", function () {
        var val = $.fn.dataTable.util.escapeRegex($(this).val());
        column.search(val ? "^" + val + "$" : "", true, false).draw();
      });
      column.data().unique().sort(function (d, j) {
        select.append('<option value="' + d + '">' + d + "</option>");
      });
    }
  });
});

/***/ }),

/***/ "./resources/js/updateProfilePicture.js":
/*!**********************************************!*\
  !*** ./resources/js/updateProfilePicture.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var readURL = function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(".profile-pic").attr("src", e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  };

  $(".file-upload").on("change", function () {
    readURL(this);
  });
  $(".upload-button").on("click", function () {
    $(".file-upload").click();
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\apps\xampp_2020\htdocs\Uavpilots_main\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! D:\apps\xampp_2020\htdocs\Uavpilots_main\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });