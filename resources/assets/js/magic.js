'use strict';

let _defaultData = {
    full_name: "",
    location: "usa",
    age: 29,
    marriage: "yes",
    hours_per_week: 30,
    when_to_start: "week_1",
    like: "no",
    hire_me: "yes"
};
let Survey = (function() {
    let _step = JSON.parse(localStorage._survey_step || "null") || "step_1",
        _data = JSON.parse(localStorage._survey_data || "null") || _defaultData,

        goToStep = (step) => {
            localStorage._survey_step = JSON.stringify(step);
            $("div.content-block").hide();
            $("div#" + step).show();
        },

        valueChangeHandler = (event) => {
            let id = event.target.id,
                val = event.target.value;

            _data[id] = event.target.value;
            $("#output").text(JSON.stringify(_data, null, 2));
            localStorage._survey_data = JSON.stringify(_data);
        },

        init = () => {
            $("button.step_control").click(() => {
                let target = event.target.getAttribute("data-target");

                if (target) {
                    goToStep(target);
                } else {
                    window.location.href = "https://www.upwork.com/fl/alexisr16";
                }
            });

            $(".panel input").change(valueChangeHandler);

            $(".panel select").change(valueChangeHandler);

            for (let p in _data) {
                $("#" + p).val(_data[p]);
            }
            $("#output").text(JSON.stringify(_data, null, 4));

            goToStep(_step);

            // $(window).mouseleave(function(event) {
            //     if (event.toElement == null) {
            //         alert("Hey, don't leave me alone here.");
            //     }
            // })
        };

    return {
        init: init
    };
})();

(function(window, jQuery) {
    Survey.init();
})(window, $);