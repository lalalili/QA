(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
var Vue // late bind
var map = window.__VUE_HOT_MAP__ = Object.create(null)
var installed = false
var isBrowserify = false
var initHookName = 'beforeCreate'

exports.install = function (vue, browserify) {
  if (installed) return
  installed = true

  Vue = vue
  isBrowserify = browserify

  // compat with < 2.0.0-alpha.7
  if (Vue.config._lifecycleHooks.indexOf('init') > -1) {
    initHookName = 'init'
  }

  exports.compatible = Number(Vue.version.split('.')[0]) >= 2
  if (!exports.compatible) {
    console.warn(
      '[HMR] You are using a version of vue-hot-reload-api that is ' +
      'only compatible with Vue.js core ^2.0.0.'
    )
    return
  }
}

/**
 * Create a record for a hot module, which keeps track of its constructor
 * and instances
 *
 * @param {String} id
 * @param {Object} options
 */

exports.createRecord = function (id, options) {
  var Ctor = null
  if (typeof options === 'function') {
    Ctor = options
    options = Ctor.options
  }
  makeOptionsHot(id, options)
  map[id] = {
    Ctor: Vue.extend(options),
    instances: []
  }
}

/**
 * Make a Component options object hot.
 *
 * @param {String} id
 * @param {Object} options
 */

function makeOptionsHot (id, options) {
  injectHook(options, initHookName, function () {
    map[id].instances.push(this)
  })
  injectHook(options, 'beforeDestroy', function () {
    var instances = map[id].instances
    instances.splice(instances.indexOf(this), 1)
  })
}

/**
 * Inject a hook to a hot reloadable component so that
 * we can keep track of it.
 *
 * @param {Object} options
 * @param {String} name
 * @param {Function} hook
 */

function injectHook (options, name, hook) {
  var existing = options[name]
  options[name] = existing
    ? Array.isArray(existing)
      ? existing.concat(hook)
      : [existing, hook]
    : [hook]
}

function tryWrap (fn) {
  return function (id, arg) {
    try { fn(id, arg) } catch (e) {
      console.error(e)
      console.warn('Something went wrong during Vue component hot-reload. Full reload required.')
    }
  }
}

exports.rerender = tryWrap(function (id, fns) {
  var record = map[id]
  record.Ctor.options.render = fns.render
  record.Ctor.options.staticRenderFns = fns.staticRenderFns
  record.instances.slice().forEach(function (instance) {
    instance.$options.render = fns.render
    instance.$options.staticRenderFns = fns.staticRenderFns
    instance._staticTrees = [] // reset static trees
    instance.$forceUpdate()
    // force update on direct children for potential slot content update
    instance.$children.forEach(function (child) {
      if (Object.keys(child.$slots).length > 0) {
        child.$forceUpdate()
      }
    })
  })
})

exports.reload = tryWrap(function (id, options) {
  makeOptionsHot(id, options)
  var record = map[id]
  record.Ctor.extendOptions = options
  var newCtor = Vue.extend(options)
  record.Ctor.options = newCtor.options
  record.Ctor.cid = newCtor.cid
  if (newCtor.release) {
    // temporary global mixin strategy used in < 2.0.0-alpha.6
    newCtor.release()
  }
  record.instances.slice().forEach(function (instance) {
    if (instance.$parent) {
      instance.$parent.$forceUpdate()
    } else {
      console.warn('Root or manually mounted instance modified. Full reload required.')
    }
  })
})

},{}],2:[function(require,module,exports){
var inserted = exports.cache = {}

exports.insert = function (css) {
  if (inserted[css]) return
  inserted[css] = true

  var elem = document.createElement('style')
  elem.setAttribute('type', 'text/css')

  if ('textContent' in elem) {
    elem.textContent = css
  } else {
    elem.styleSheet.cssText = css
  }

  document.getElementsByTagName('head')[0].appendChild(elem)
  return elem
}

},{}],3:[function(require,module,exports){
(function (global){
var __vueify_insert__ = require("vueify/lib/insert-css")
var __vueify_style__ = __vueify_insert__.insert(".alert[_v-084e9d62] {\n  padding: 10px;\n}\n.alert-area[_v-084e9d62] {\n  margin-bottom: 10px;\n}\n.alert-icon[_v-084e9d62] {\n  width: 20px;\n  display: inline-block;\n  float: left;\n}\n.alert-close[_v-084e9d62] {\n  cursor: pointer;\n  float: right;\n}\n.alert-text[_v-084e9d62] {\n  word-break: break-all;\n  margin-left: 20px;\n  margin-right: 10px;\n}\n.alert-info[_v-084e9d62] {\n  background: #c7e0f2;\n  color: #0082d5;\n  border: 1px solid #0082d5;\n}\n.alert-success[_v-084e9d62] {\n  background: #8ac48a;\n}\n.alert-error[_v-084e9d62] {\n  background: #f00;\n  color: #fff;\n}\n")
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});
exports.default = {
    props: {
        type: {
            default: 'info'
        },
        show: {
            type: Boolean,
            default: true
        }
    },
    computed: {
        typeClass: function typeClass() {
            return 'alert-' + this.type;
        }
    }
};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "<div v-if=\"show\" class=\"alert-area\" _v-084e9d62=\"\"><div :class=\"typeClass\" class=\"alert\" _v-084e9d62=\"\"><span @click=\"show=false\" class=\"alert-close\" _v-084e9d62=\"\">x</span><i style=\"font-size: 16px;line-height: 20px;\" class=\"fa fa-info-circle alert-icon\" _v-084e9d62=\"\"></i><div class=\"alert-text\" _v-084e9d62=\"\"><slot _v-084e9d62=\"\"></slot></div></div></div>"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install((typeof window !== "undefined" ? window['Vue'] : typeof global !== "undefined" ? global['Vue'] : null), true)
  if (!hotAPI.compatible) return
  module.hot.dispose(function () {
    __vueify_insert__.cache[".alert[_v-084e9d62] {\n  padding: 10px;\n}\n.alert-area[_v-084e9d62] {\n  margin-bottom: 10px;\n}\n.alert-icon[_v-084e9d62] {\n  width: 20px;\n  display: inline-block;\n  float: left;\n}\n.alert-close[_v-084e9d62] {\n  cursor: pointer;\n  float: right;\n}\n.alert-text[_v-084e9d62] {\n  word-break: break-all;\n  margin-left: 20px;\n  margin-right: 10px;\n}\n.alert-info[_v-084e9d62] {\n  background: #c7e0f2;\n  color: #0082d5;\n  border: 1px solid #0082d5;\n}\n.alert-success[_v-084e9d62] {\n  background: #8ac48a;\n}\n.alert-error[_v-084e9d62] {\n  background: #f00;\n  color: #fff;\n}\n"] = false
    document.head.removeChild(__vueify_style__)
  })
  if (!module.hot.data) {
    hotAPI.createRecord("_v-084e9d62", module.exports)
  } else {
    hotAPI.update("_v-084e9d62", module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{"vue-hot-reload-api":1,"vueify/lib/insert-css":2}],4:[function(require,module,exports){
(function (global){
"use strict";

var _vue = (typeof window !== "undefined" ? window['Vue'] : typeof global !== "undefined" ? global['Vue'] : null);

var _vue2 = _interopRequireDefault(_vue);

var _Hello = require("../views/Hello.vue");

var _Hello2 = _interopRequireDefault(_Hello);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

_vue2.default.config.debug = true;

Promise.all([new Promise(function (resolve) {
    if (window.addEventListener) {
        window.addEventListener('DOMContentLoaded', resolve);
    } else {
        window.attachEvent('onload', resolve);
    }
})]).then(function (event) {
    new _vue2.default(_Hello2.default);
});

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{"../views/Hello.vue":5}],5:[function(require,module,exports){
(function (global){
var __vueify_insert__ = require("vueify/lib/insert-css")
var __vueify_style__ = __vueify_insert__.insert(".my input[_v-3422f928] {\n  margin-bottom: 10px;\n}\n.my li[_v-3422f928] {\n  margin-bottom: 10px;\n  background: #c7e0f2;\n  color: #0082d5;\n  border: 1px solid #0082d5;\n}\n")
'use strict';

Object.defineProperty(exports, "__esModule", {
    value: true
});

var _alert = require('../components/alert.vue');

var _alert2 = _interopRequireDefault(_alert);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

exports.default = {
    //        el() {
    //            return '#app'
    //        },
    el: '#app',
    //        data() {
    //            return ''
    //        },
    data: {
        message: '2',
        todos: [{ list: '1' }, { list: '2' }, { list: '3' }]
    },
    computed: {},
    ready: function ready() {},

    methods: {
        addTodos: function addTodos() {
            var newList = this.message.trim();
            if (newList) {
                this.todos.push({ list: newList });
                this.message = '';
            }
        },
        removeTodos: function removeTodos(index) {
            this.todos.splice(index, 1);
        }
    },
    events: {},
    components: {
        Alert: _alert2.default
    }
};
if (module.exports.__esModule) module.exports = module.exports.default
;(typeof module.exports === "function"? module.exports.options: module.exports).template = "<div class=\"wrapper\" _v-3422f928=\"\"><alert _v-3422f928=\"\">Hello Vue</alert><alert type=\"error\" _v-3422f928=\"\">Danger</alert><alert type=\"success\" _v-3422f928=\"\">Login Success</alert></div><div class=\"my\" _v-3422f928=\"\"><p _v-3422f928=\"\">{{ message }}</p><input v-model=\"message\" v-on:keyup.enter=\"addTodos\" _v-3422f928=\"\"><li v-for=\"todo in todos\" _v-3422f928=\"\"><span _v-3422f928=\"\">{{ todo.list }}</span><button v-on:click=\"removeTodos($index)\" _v-3422f928=\"\">x</button></li></div>"
if (module.hot) {(function () {  module.hot.accept()
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install((typeof window !== "undefined" ? window['Vue'] : typeof global !== "undefined" ? global['Vue'] : null), true)
  if (!hotAPI.compatible) return
  module.hot.dispose(function () {
    __vueify_insert__.cache[".my input[_v-3422f928] {\n  margin-bottom: 10px;\n}\n.my li[_v-3422f928] {\n  margin-bottom: 10px;\n  background: #c7e0f2;\n  color: #0082d5;\n  border: 1px solid #0082d5;\n}\n"] = false
    document.head.removeChild(__vueify_style__)
  })
  if (!module.hot.data) {
    hotAPI.createRecord("_v-3422f928", module.exports)
  } else {
    hotAPI.update("_v-3422f928", module.exports, (typeof module.exports === "function" ? module.exports.options : module.exports).template)
  }
})()}
}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{"../components/alert.vue":3,"vue-hot-reload-api":1,"vueify/lib/insert-css":2}]},{},[4]);

//# sourceMappingURL=hello.js.map
