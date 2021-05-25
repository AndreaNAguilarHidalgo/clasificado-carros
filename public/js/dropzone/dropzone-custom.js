Dropzone.options.dropzoneImg = {
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    url: "/images",
    dictDefaultMessage: "Agregar imagénes aquí",
    acceptedFiles: "image/*",
    maxFiles: 4,
};
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
