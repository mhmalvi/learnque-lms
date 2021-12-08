<template>
  <div>
    <div class="d-flex align-items-center">
      <div class="form-group img-container">
        <label for="image_picker" class="img-container-lbl" v-if="!isUploading"
          >Click here to upload {{ state.label_text }}</label
        >
        <label for="" class="img-container-lbl" v-else> Uploading... </label>
        <div class="row w-100" v-if="state.image_dataUrl">
          <div class="col-12 img-wrapper">
            <a
              href="javascript:void(0)"
              @click.prevent="handleImageDelete()"
              class="text-danger d-block img-remove"
            >
              <i class="fas fa-times"></i>
            </a>
            <img :src="state.image_dataUrl" class="img-fluid" />
          </div>
        </div>
        <input
          type="file"
          id="image_picker"
          class="form-control d-none"
          @change="handleImageChange"
        />
      </div>
    </div>
    <p v-if="state.errors.length > 0">
      {{ state.errors[0] }}
    </p>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import ImageHandler from "../modules/ImageHandler";

export default {
  props: ["label"],
  setup({ label }, context) {
    const isUploading = ref(false);
    const state = reactive({
      label_text: "image",
      image_dataUrl: "",
      errors: [],
      previous_image_dataUrl: "",
    });

    if (label) state.label_text = label;

    const handleImageChange = (e) => {
      state.errors = [];
      if (e.target.files.length == 0) return;
      const file = e.target.files[0];

      ImageHandler.convertToDataUrl(file)
        .then((result) => {
          context.emit("requestForChange", {
            image: result,
          });
        })
        .catch((err) => {
          state.errors.push(err.message);
        });
    };

    const handleImageDelete = () => {
      context.emit("requestForDelete");
    };

    const deleteImage = () => {
      state.image_dataUrl = "";
    };

    const setImage = (imageData) => {
      state.errors = [];
      console.log(imageData);
      state.image_dataUrl = imageData;
    };

    const turnOnUploading = () => {
      isUploading.value = true;
    };

    const turnOffUploading = () => {
      isUploading.value = false;
    };

    return {
      state,
      handleImageChange,
      handleImageDelete,
      deleteImage,
      setImage,
      isUploading,
      turnOnUploading,
      turnOffUploading,
    };
  },
};
</script>
