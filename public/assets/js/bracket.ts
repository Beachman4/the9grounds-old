

(function($) {



    function initGroupSingle(data: array, num: integer)
    {
        console.log(data);
    }

    function initGroupDouble(data: array, num: integer)
    {

    }


    function initSingleBrackets(data: array, num: integer)
    {

    }
    function initDoubleBrackets(data: array, num: integer)
    {

    }


    $.fn.brackets = function(data: array, options: array) {
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
            } else if (settings.group == 'double') {
                initGroupDouble(data['groups'], num);
            }
        }
        if (settings.type == 'single') {
            initSingleBrackets(data['data'], num);
        } else if (settings.type == 'double') {
            initDoubleBrackets(data['data'], num);
        }
    }
}(jQuery));