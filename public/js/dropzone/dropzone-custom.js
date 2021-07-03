window.Dropzone;

Dropzone.autoDiscover = false;

Dropzone.options.myDropzoneArea = {
    /*url: "/storedata",
    dictDefaultMessage: 'Arrastra o agrega aquí tus imágenes',
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    parallelUploads: 1,
    //autoProcessQueue: false,
    uploadMultiple: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 3,
    maxFilesize: 3,*/
    url: "/",
    maxFiles: 3,
    accept: function(file, done) {
        if (file.name == "justinbieber.jpg") {
          done("Naha, you don't.");
        }
        else { done(); }
      }
}


/*Dropzone.autoDiscover = false;

let token = $('meta[name="csrf-token"]').attr('content');

Dropzone.options.myDropzoneArea = {
    url: "/storedata",
    dictDefaultMessage: 'Arrastra o agrega aquí tus imágenes',
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    parallelUploads: 1,
    //autoProcessQueue: false,
    uploadMultiple: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 3,
    maxFilesize: 3,
    params: {
        _token: token
    },
    init: function () {
        var submitButton = document.querySelector("submit-all");
        var wrapperThis = this;

        submitButton.addEventListener("click", function () {
            wrapperThis.processQueue();
        });

        this.on("addedfile", function () {
            var removeButton = Dropzone.createElement(
                "<button class='btn btn-lg"
                + "dark'>Remove File</button>");

            removeButton.addEventListener("click", function (e) {
                e.preventDefault();
                e.stopPropagation();

                wrapperThis.dictRemoveFile(file);
            });

            file.previewElement.appendChild(removeButton);
        });

        this.on('sendindmultiple', function (data, xhr, formData) {
            formData.append("name", $("name").val());
            formData.append("email", $("email").val());
        });
    }
    /*init: function() {
        var dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("submit-all").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("name", jQuery("#name").val());
            formData.append("email", jQuery("#email").val());
        });
    }
};*/
