/*Dropzone.options.myDropzone = {
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    url: "/images",
    dictDefaultMessage: "Agregar imágenes",
    acceptedFiles: "image/*"
}*/
/*Dropzone.autoDiscover = false;

var myAwesomeDropzone = new Dropzone('#dropzoneImg', {
    url: "/public/anuncios",
    dictDefaultMessage: "Agregar imagénes aquí",
    acceptedFiles: "image/*",
    maxFiles: 4,
});*/
// "myAwesomeDropzone" is the camelized version of the HTML element's ID
/*Dropzone.autoDiscover = false;
Dropzone.options.myAwesomeDropzone = {
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    dictDefaultMessage: "Agregar imagénes aquí",
    acceptedFiles: "image/*",
    maxFiles: 4,
};*/
/*Dropzone.autoDiscover = false;

document.addEventListener('DOMContentLoaded', () =>
{

    const myAwesomeDropzone = new Dropzone('#my-awesome-dropzone', {
        
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        url: "/anuncios/imagen",
        dictDefaultMessage: 'Sube aquí tus imágenes',
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictRemoveFile: 'Borrar Archivo',
        maxFiles: 4,
        
        /*init: function() {
            if(document.querySelector('#imagen').value.trim() ) {
               let imagenPublicada = {};
               imagenPublicada.size = 1234;
               imagenPublicada.name = document.querySelector('#imagen').value;
               
               this.options.addedfile.call(this, imagenPublicada);
               this.options.thumbnail.call(this, imagenPublicada, `/storage/anuncios/${imagenPublicada.name}`);

               imagenPublicada.previewElement.classList.add('dz-sucess');
               imagenPublicada.previewElement.classList.add('dz-complete');
            } 
        },
        success: function(file, response) {
            // console.log(file);
            // console.log(response);
            console.log(response.correcto);
            document.querySelector('#error').textContent = '';

            // Coloca la respuesta del servidor en el input hidden
            document.querySelector('#imagen').value = response.correcto;

            // Añadir al objeto de archivo el nombre del servidor
            file.nombreServidor = response.correcto;
        },
        maxfilesexceeded: function(file) {
            if( this.files[1] != null ) {
                this.removeFile(this.files[0]); // eliminar el archivo anterior
                this.addFile(file); // Agregar el nuevo archivo 
            }
        }, 
        removedfile: function(file, response) {
            file.previewElement.parentNode.removeChild(file.previewElement);

            params = {
                imagen: file.nombreServidor ?? document.querySelector('#imagen').value
            }

            axios.post('/anuncios/borrarimagen', params )
                .then(respuesta => console.log(respuesta))
        }
    });
});*/

/*Dropzone.autoDiscover = false;
//Dropzone.options.demoform = false;	
let token = $('meta[name="csrf-token"]').attr('content');

$(function() {
    var myDropzone = new Dropzone("div#myDropzoneArea", {
        paramName: "file",
        url: "{{ url('/storeimages') }}",
        previewsContainer: 'div.dropzone-previews',
        addRemoveLinks: true,
        autoProcessQueue: true,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 2,
        params: {
            _token: token
        },
        accept(file, done) {
            return done();
          },
        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            $("form[name='demoform']").submit(function(event) {
                // Para asegurarse que el formulario no se envía realmente
                event.preventDefault();

                URL = $("#demoform").attr('action');
                formData = $('#demoform').serialize();

                $.ajax({
                    url: URL,
                    type: 'POST',
                    
                    data: formData,
                    success: function(result) {
                        if (result.status == "success") {
                            myDropzone.processQueue();
                        } else {
                            console.log("error", result.status);
                        }
                    }
                });
            });

            //Gets triggered when we submit the image.
            this.on('sending', function(file, xhr, formData) {
                //fetch the user id from hidden input field and send that userid with our image
                //formData.append();
            });

            this.on("success", function(file, response) {
                // Reset the form+
                $('#demoform')[0].reset();

                // Reset dropzone
                $('.dropzone-previews').empty();
            });

            this.on("queuecomplete", function() {

            });

            // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
            // of the sending event because uploadMultiple is set to true.
            this.on("sendingmultiple", function() {
                // Gets triggered when the form is actually being sent.
                // Hide the success button or the complete form.
            });

            this.on("successmultiple", function(files, response) {
                // Gets triggered when the files have successfully been sent.
                // Redirect user or notify of success.
            });

            this.on("errormultiple", function(files, response) {
                // Gets triggered when there was an error sending the files.
                // Maybe show form again, and notify user of error
            });
        }
    });
});*/
Dropzone.options.myDropzoneArea = {
    paramName: "file",
    maxFilesize: 2,
    accept: function(file, done){
        if(file.name == "justinbieber.jpg"){
            done("naha, you don't");
        }
        else{
            done();
        }
    }
};