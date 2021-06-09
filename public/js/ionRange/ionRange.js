$(function () {
    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
        min: 0,
        max: 5000,
        from: 1000,
        to: 4000,
        type: 'double',
        step: 1,
        prefix: '$',
        prettify: false,
        hasGrid: true,
        onChange: function (obj){
            var t = ''

            for (var prop in obj){
                t += prop + ':' + obj[prop] + '\r\n'
            }
            $('result').html(t)
        },
        onLoad : function (obj){
            
        }
    });
});
