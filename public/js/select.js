$(function() {
    
    $('#estado').on('change', onSelectStateChange);
});

function onSelectStateChange() {
    
    var state_id = $(this).val();

    if(! state_id)
        $('#municipio').html('<option value="">-- Selecciona un municipio --</option>');
    

    // AJAX
    $.get('/api/create/'+state_id+'/towns', function(data) {

        var html_select = '<option value="">-- Selecciona un municipio --</option>';
        
        for( var i = 0; i<data.length; ++i){
            html_select += '<option value="'+data[i].id+'">'+data[i].municipio+'</option>';

            $('#municipio').html(html_select);
        }
    });
}