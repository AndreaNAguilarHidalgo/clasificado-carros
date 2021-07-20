$(function () {
    /* ION SLIDER */
    $('#priceRange').ionRangeSlider({
        grid: true,
        min: 50000,
        max: 1000000,
        from: 50000,
        to: 100000,
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
