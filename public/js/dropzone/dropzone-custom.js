Dropzone.autoDiscover = false;

document.addEventListener('DOMContentLoaded', () => {

    const dropzoneImg = new Dropzone('#dropzoneImg', {
        url: "/anuncios/imagen",
        dictDefaultMessage: 'Sube aquí tu archivo',
        acceptedFiles: ".png,.jpg,.jpeg,.gif,.bmp",
        addRemoveLinks: true,
        dictRemoveFile: 'Borrar Archivo',
        maxFiles: 1,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        },
        init: function () {
            var myDropzone = this;

            if (document.querySelector('#imagen').value.trim()) {
                let imagenPublicada = {};
                imagenPublicada.size = 1234;
                imagenPublicada.name = document.querySelector('#imagen').value;

                myDropzone.options.addedfile.call(myDropzone, imagenPublicada);
                myDropzone.options.thumbnail.call(myDropzone, imagenPublicada, `/storage/anuncios/${imagenPublicada.name}`);
                myDropzone.emit("complete", imagenPublicada);

                imagenPublicada.previewElement.classList.add('dz-sucess');
                imagenPublicada.previewElement.classList.add('dz-complete');
            }
        },
        success: function (file, response) {
            // console.log(file);
            // console.log(response);
            console.log(response.correcto);
            document.querySelector('#error').textContent = '';

            // Coloca la respuesta del servidor en el input hidden
            document.querySelector('#imagen').value = response.correcto;

            // Añadir al objeto de archivo el nombre del servidor
            file.nombreServidor = response.correcto;
        },
        maxfilesexceeded: function (file) {
            if (this.files[1] != null) {
                this.removeFile(this.files[0]); // eliminar el archivo anterior
                this.addFile(file); // Agregar el nuevo archivo 
            }
        },
        removedfile: function (file, response) {
            file.previewElement.parentNode.removeChild(file.previewElement);

            params = {
                imagen: file.nombreServidor ?? document.querySelector('#imagen').value
            }

            axios.post('/anuncios/borrarimagen', params)
                .then(respuesta => console.log(respuesta))
        }
    });
})