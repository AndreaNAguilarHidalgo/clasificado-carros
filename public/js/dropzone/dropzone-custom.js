let token = $('meta[name="csrf-token"]').attr('content');

Dropzone.options.myDropzoneArea = {
    url: "/",
    dictDefaultMessage: 'Arrastra o agrega aquí tus imágenes',
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    autoProcessQueue: false,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 3,
    maxFilesize: 3,
    params: {
        _token: token
    },
    init: function() {
        var myDropzone = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        $("#submit-all").on("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("name", jQuery("#name").val());
            formData.append("email", jQuery("#email").val());
        });
    }
};
