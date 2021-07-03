<template>
  <vue-dropzone ref="myVueDropzone" 
                id="dropzone" 
                :options="dropzoneOptions"
                @vdropzone-complete="afterUploadComplete"></vue-dropzone>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
      dropzoneOptions: {
        url: "https://localhost/storedata",
        addRemoveLinks: true,
        thumbnailWidth: 150,
        maxFilesize: 3,
        parallelUploads: 3,
        maxFiles: 3,
        uploadMultiple: true
      }
    };
  },

  methods: {
    afterUploadComplete: async function(response){
      if(response.status == "success"){
        console.log("upload successful");
        this.sendSuccess = true;
      }
      else{
        console.log("upload failed");
      }
    }
  }
};
</script>