(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var Survey = function () {
    var _step = JSON.parse(localStorage._survey_step || "null") || "step_1",
        _data = JSON.parse(localStorage._survey_data || "{}"),
        goToStep = function goToStep(step) {
        localStorage._survey_step = JSON.stringify(step);
        $("div.content-block").hide();
        $("div#" + step).show();
    },
        init = function init() {
        $("button.step_control").click(function () {
            var target = event.target.getAttribute("data-target");

            if (target) {
                goToStep(target);
            } else {
                window.location.href = "https://www.upwork.com/fl/alexisr16";
            }
        });

        goToStep(_step);
    };

    return {
        init: init
    };
}();

(function (window, jQuery) {
    Survey.init();
})(window, $);

},{}]},{},[1]);

//# sourceMappingURL=magic.js.map
