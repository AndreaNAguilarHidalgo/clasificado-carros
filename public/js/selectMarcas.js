$(function() {

    $('#marca').on('change', onselectionchange);
});

function onselectionchange() {
    
    var brand_id = $(this).val();
    console.log(brand_id);

    if(! brand_id)
        $('#modelo').html('<option value="">-- Selecciona un modelo --</option>');
    

    // AJAX
    $.get('/api/create/'+brand_id+'/brands', function(data) {

        var html_select = '<option value="">-- Selecciona un modelo --</option>';
        
        for( var i = 0; i<data.length; ++i){
            html_select += '<option value="'+data[i].id+'">'+data[i].modelo+'</option>';

            $('#modelo').html(html_select);
        }
    });
}