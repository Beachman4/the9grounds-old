(function ($) {
    function initSingleBrackets(data, num) {
    }
    function initDoubleBrackets(data, num) {
    }
    $.fn.brackets = function (data, options) {
        var settings = $.extend({
            type: "single",
            number: '128'
        }, options);
        var num = settings.number;
        if (settings.type == 'single') {
            initSingleBrackets(data, num);
        }
        else if (settings.type == 'double') {
            initDoubleBrackets(data, num);
        }
    };
}(jQuery));
//# sourceMappingURL=bracket.js.map