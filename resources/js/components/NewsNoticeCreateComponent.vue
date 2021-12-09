<template>
  <div>
    <form @submit.prevent="handleFormSubmit">
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Basic Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label class="form-label" for="title"
                >Title <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="title"
                placeholder="Enter title.."
                v-model="form.data.title"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="description"
                >Description <small class="text-danger">*</small></label
              >
              <QuillEditor
                theme="snow"
                contentType="html"
                ref="description_editor"
                v-model:content="form.data.description"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Featured Image</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8">
          <ImagePickerComponent
            ref="image_picker"
            label="news/notice"
            @requestForChange="handleImageChange"
            @requestForDelete="handleImageDelete"
          />

          <div class="form-group">
            <label class="form-label" for="post_type"
              >Post type <small class="text-danger">*</small></label
            >
            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                name="post_type"
                id="news"
                v-model="form.data.post_type"
                value="news"
              />
              <label class="form-check-label" for="news">News</label>
            </div>
            <div class="form-check">
              <input
                type="radio"
                class="form-check-input"
                name="post_type"
                id="notice"
                v-model="form.data.post_type"
                value="notice"
              />
              <label class="form-check-label" for="notice">Notice</label>
            </div>
          </div>

          <div class="mt-5">
            <button
              type="button"
              class="btn btn-sm btn-outline-secondary mr-1"
              :disabled="!formIsValid"
            >
              <span class="material-icons mr-2">save</span>
              save as draft
            </button>
            <button
              type="submit"
              class="btn btn-sm btn-outline-primary m-1"
              :disabled="!formIsValid"
            >
              <span class="material-icons mr-2">add_circle_outline</span>
              save &amp; publish
            </button>
            <button
              type="button"
              class="btn btn-sm btn-outline-light m-1"
              @click.prevent="formReset()"
            >
              <span class="material-icons mr-2">clear_all</span>
              clear
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { reactive, ref, computed, watch } from "vue";
import ImagePickerComponent from "./ImagePickerComponent.vue";
import axios from "axios";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import Swal from "sweetalert2";

export default {
  components: { ImagePickerComponent, QuillEditor },
  setup() {
    const form = reactive({
      data: {
        title: "",
        description: "",
        image: "",
        post_type: null,
      },
      isSubmitting: false,
    });
    const image_picker = ref(0);
    const description_editor = ref(0);

    const formIsValid = computed(() => {
      return (
        form.data.title.length > 0 &&
        form.data.description.length > 0 &&
        form.data.description.length > 0 &&
        form.data.image.length > 0 &&
        form.data.post_type &&
        description_editor.value.getText().trim().length > 0
      );
    });

    const handleImageChange = (data) => {
      form.data.image = data.image;
      setImage(data.image);
    };

    const handleImageDelete = () => {
      form.data.image = "";
      setImage("");
    };

    const handleFormSubmit = () => {
      axios
        .post("/admin/news_notices/store", form.data)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          formReset();
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            text: err.response.data.message,
          });
        });
    };

    const setImage = (image) => {
      image_picker.value.setImage(image);
    };

    const formReset = () => {
      form.data.title = "";
      form.data.description = "";
      form.data.image = "";
      form.data.post_type = "";

      description_editor.value.setHTML("");
      setImage("");
    };

    return {
      image_picker,
      form,
      description_editor,
      formIsValid,
      handleImageChange,
      handleImageDelete,
      handleFormSubmit,
      formReset,
    };
  },
};
</script>
