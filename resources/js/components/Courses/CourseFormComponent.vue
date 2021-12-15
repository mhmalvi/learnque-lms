<template>
  <div>
    <form @submit.prevent="onFormSubmitHandlar()">
      <div
        class="row mb-4"
        v-if="
          validation.message &&
          validation.message.length > 0 &&
          (validation.errors == null || validation.errors.length == 0)
        "
      >
        <div class="col-lg-8 offset-lg-4">
          <div class="alert alert-danger">
            {{ validation.message }}
          </div>
        </div>
      </div>
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
              <label class="form-label" for="code"
                >Course Code <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="code"
                placeholder="Enter course code .."
                v-model="formData.code"
              />
              <small
                class="text-danger"
                v-if="
                  validation.errors.code && validation.errors.code.length > 0
                "
              >
                {{ validation.errors.code[0] }}
              </small>
            </div>
            <div class="form-group">
              <label class="form-label" for="title"
                >Course Title <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="title"
                placeholder="Enter course title .."
                v-model="formData.title"
              />
              <small
                class="text-danger"
                v-if="
                  validation.errors.title && validation.errors.title.length > 0
                "
              >
                {{ validation.errors.title[0] }}
              </small>
            </div>
            <div class="form-group">
              <label class="form-label" for="category">Course Category</label>
              <select
                id="category"
                class="form-control custom-select"
                v-model="formData.category"
              >
                <option value="" selected>Uncategorized</option>
                <option
                  v-for="(category, index) in data.categories"
                  :value="category.uuid"
                  :key="index"
                >
                  {{ category.title }}
                </option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Course Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label class="form-label" for="description">Descriptions</label>
              <quill-editor
                theme="snow"
                v-model:content="formData.description"
                contentType="html"
                ref="myEditor"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Thumbnail Image</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8">
          <div class="d-flex align-items-center">
            <div class="form-group img-container">
              <label for="thumbnail" class="img-container-lbl"
                >Click here to Upload Thumbnail</label
              >
              <div class="row w-100" v-if="formData.thumbnail">
                <div class="col-12 img-wrapper">
                  <img :src="formData.thumbnail" class="img-fluid" />
                </div>
              </div>
              <input
                type="file"
                id="thumbnail"
                class="form-control d-none"
                @change="onThumbnailUpload"
              />
            </div>
          </div>

          <div class="mt-5">
            <button
              type="button"
              class="btn btn-sm btn-outline-secondary mr-1"
              @click="onSaveAsDraft"
              :disabled="!formIsValid || isLoading"
            >
              <span class="material-icons mr-2">save</span>
              save as draft
            </button>
            <button
              type="submit"
              class="btn btn-sm btn-outline-primary m-1"
              :disabled="!formIsValid || isLoading"
            >
              <span class="material-icons mr-2">add_circle_outline</span>
              save &amp; publish
            </button>
            <button
              type="reset"
              class="btn btn-sm btn-outline-light m-1"
              :disable="isLoading"
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
import { ref, reactive, computed, onMounted } from "vue";
import axios from "axios";
import Validators from "../../modules/Validators";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import IsLoading from "../../modules/IsLoading";

export default {
  components: { QuillEditor },

  setup(props, { emit }) {
    const isLoading = ref(false);
    const isValid = ref(false);
    const data = reactive({
      categories: {},
    });
    const validation = reactive({
      errors: [],
      message: "",
    });

    const { start, stop } = IsLoading();

    onMounted(() => {
      axios.get("admin/categories/all").then((res) => {
        data.categories = res.data.data;
      });
    });

    const formData = reactive({
      code: "",
      title: "",
      category: "",
      thumbnail: "",
      description: "",
      draft: false,
    });
    const myEditor = ref(0);

    const formIsValid = computed(() => {
      return formData.title && formData.code;
    });

    const setData = (course) => {
      formData.code = course.code;
      formData.title = course.title;
      formData.category = course.category;
      formData.description = course.description;
      formData.thumbnail = course.image_url;
      myEditor.value.setHTML(course.description);
    };

    const resetForm = () => {
      isValid.value = false;
      formData.code = "";
      formData.title = "";
      formData.category = "uncategorized";
      formData.description = "";
      formData.thumbnail = "";
      myEditor.value.setHTML("");
    };

    const onThumbnailUpload = (event) => {
      const { fileType } = Validators();
      let file = event.target.files[0];
      if (fileType(file.name)) {
        let reader = new FileReader();
        reader.onload = (e) => {
          formData.thumbnail = e.target.result;
        };
        reader.readAsDataURL(file);
      } else {
        // this.errors.push(`${file.name} is not a valid file type!`);
      }
    };

    const onSaveAsDraft = () => {
      formData.draft = true;
      onFormSubmitHandlar();
    };

    const onFormSubmitHandlar = () => {
      start();
      isLoading.value = true;
      validation.message = "";
      validation.errors = [];

      emit("formSubmit", formData);
    };

    const success = () => {
      stop();
      resetForm();
    };

    const fail = (error) => {
      stop();

      validation.errors = error.data.errors;
      validation.message = error.data.message;
    };

    const completed = () => {
      isLoading.value = false;
    };

    return {
      data,
      formData,
      formIsValid,
      validation,
      isLoading,
      myEditor,
      onThumbnailUpload,
      setData,
      onFormSubmitHandlar,
      onSaveAsDraft,
      success,
      fail,
      completed,
    };
  },
};
</script>
