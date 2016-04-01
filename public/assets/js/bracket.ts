

(function($) {






    function initSingleBrackets(data: array, num: integer)
    {

    }
    function initDoubleBrackets(data: array, num: integer)
    {

    }


    $.fn.brackets = function(data: array, options: array) {
        var settings = $.extend({
            type: "single",
            number: '128'
        }, options);
        var num = settings.number;
        if (settings.type == 'single') {
            initSingleBrackets(data, num);
        } else if (settings.type == 'double') {
            initDoubleBrackets(data, num);
        }
    }
}(jQuery));