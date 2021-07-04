<template>
  <div>
    <div
      class="px-12 text-base text-center mx-auto"
      v-if="sendSuccess"
    >Thank You, Message has been sent</div>
    <vue-dropzone
      ref="myVueDropzone"
      id="dropzone"
      :options="dropzoneOptions"
      @vdropzone-complete="afterUploadComplete"
      :useCustomSlot="true"
      @vdropzone-sending-multiple="sendMessage"
    >
      <div class="dropzone-custom-content">
        <h3 class="dropzone-custom-title">Arrastra y suelta para subir imágenes</h3>
        <div class="subtitle">...o haga clic para elegirlo desde la computadora</div>
      </div>
    </vue-dropzone>
    <div class="p-2 w-full">
      <button
        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
        @click="shootMessage"
      >Send Message</button>
    </div>
  </div>
</template>

<script>
var url = "{{ route('gallery.store') }}";
console.log(url);
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  data() {
    return {
      sendSuccess: false,
      name: "",
      email:"",
      dropzoneOptions: {
        type:"POST",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/sendMessage",
        addRemoveLinks: true,
        thumbnailWidth: 150,
        maxFilesize: 3,
        parallelUploads: 3,
        maxFiles: 3,
        uploadMultiple: true,
        acceptedFiles: "image/*",
        //autoProcessQueue:false,
      }
    };
  },

  methods: {
    afterUploadComplete: async function(response) {
      if (response.status == "success") {
        console.log("upload successful");
        this.sendSuccess = true;
      } else {
        console.log("upload failed");
      }
    },
    shootMessage: async function() {
      this.$refs.myVueDropzone.processQueue();
    },
    sendMessage: async function(files, xhr, formData){
      formData.append("name", $("name").val());
      formData.append("email", $("email").val());
    }
  }
};
</script>