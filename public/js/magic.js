(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

var _defaultData = {
    full_name: "",
    location: "usa",
    age: 29,
    marriage: "yes",
    hours_per_week: 30,
    when_to_start: "week_1",
    like: "no",
    hire_me: "yes"
};
var Survey = function () {
    var _step = JSON.parse(localStorage._survey_step || "null") || "step_1",
        _data = JSON.parse(localStorage._survey_data || "null") || _defaultData,
        goToStep = function goToStep(step) {
        localStorage._survey_step = JSON.stringify(step);
        $("div.content-block").hide();
        $("div#" + step).show();
    },
        valueChangeHandler = function valueChangeHandler(event) {
        var id = event.target.id,
            val = event.target.value;

        _data[id] = event.target.value;
        $("#output").text(JSON.stringify(_data, null, 2));
        localStorage._survey_data = JSON.stringify(_data);
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

        $(".panel input").change(valueChangeHandler);

        $(".panel select").change(valueChangeHandler);

        for (var p in _data) {
            $("#" + p).val(_data[p]);
        }
        $("#output").text(JSON.stringify(_data, null, 4));

        goToStep(_step);

        $(window).mouseleave(function (event) {
            if (event.toElement == null) {
                alert("Hey, don't leave me alone here.");
            }
        });
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
