(function ($) {
    function initGroupSingle(data, num) {
        console.log(data);
    }
    function initGroupDouble(data, num) {
    }
    function initSingleBrackets(data, num) {
    }
    function initDoubleBrackets(data, num) {
    }
    $.fn.brackets = function (data, options) {
        var settings = $.extend({
            type: "single",
            group: "false",
            number: 128
        }, options);
        var num = settings.number;
        console.log(data);
        if (settings.group != 'false') {
            if (settings.group == 'single') {
                initGroupSingle(data['groups'], num);
            }
            else if (settings.group == 'double') {
                initGroupDouble(data['groups'], num);
            }
        }
        if (settings.type == 'single') {
            initSingleBrackets(data['data'], num);
        }
        else if (settings.type == 'double') {
            initDoubleBrackets(data['data'], num);
        }
    };
}(jQuery));
//# sourceMappingURL=bracket.js.map