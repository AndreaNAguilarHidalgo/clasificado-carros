$(function () {
    /* ION SLIDER */
    $('#priceRange').ionRangeSlider({
        min: 0,
        max: 5000000,
        from: 100000,
        to: 400000,
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
