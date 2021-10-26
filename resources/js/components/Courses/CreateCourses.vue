<template>
  <div>
    <form @submit.prevent="onFormSubmitHandlar()">
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
                v-model="code"
              />
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
                v-model="title"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="category">Course Category</label>
              <select
                id="category"
                class="form-control custom-select"
                v-model="category"
              >
                <option value="" selected>Uncategorized</option>
                <option
                  :value="category.uuid"
                  v-for="(category, index) in categories"
                  v-bind:key="index"
                >
                  {{ category.title }}
                </option>
              </select>
            </div>
            <div class="form-group">
              <label class="form-label" for="lessons"
                >Number of lessons <small class="text-danger">*</small></label
              >
              <input
                type="number"
                class="form-control"
                id="lessons"
                placeholder="Enter total number of lessons .."
                v-model="lessons"
              />
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
                v-model:content="description"
                contentType="html"
                ref="myEditor"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <input type="hidden" v-model="thumbnail" />
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="form-group">
            <div class="custom-control custom-checkbox">
              <input
                class="custom-control-input"
                type="checkbox"
                value=""
                id="draft"
                v-model="draft"
              />
              <label class="custom-control-label" for="draft">
                Save as draft
              </label>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <button
            type="submit"
            class="btn btn-primary"
            :class="isLoading && 'is-loading'"
            :disabled="!formIsValid"
          >
            <span class="material-icons mr-2">save</span>
            Save Now
          </button>

          <button type="reset" class="btn btn-light ml-2">
            <span class="material-icons mr-2">clear_all</span>
            Clear all
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
<<<<<<< HEAD

export default {
  components: { QuillEditor },
=======
export default {
  components: {
    QuillEditor,
  },
>>>>>>> ec0b80f109c7de792b11065580a21c6937997244
  data() {
    return {
      isValid: false,
      code: "",
      title: "",
      categor: "uncategorized",
      lessons: "",
      thumbnail: "",
      description: "",
      imgTitle: "",
      imgAlt: "",
      draft: "",
      isLoading: false,
      categories: [],
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    onImageUpload(image) {},
    onFormSubmitHandlar() {
      this.isLoading = true;
      axios
        .post("admin/courses", this.formDataHandler)
        .then((res) => {
          this.isLoading = false;
          Swal.fire({
            title: "Success",
            text: res.data.message,
            icon: "success",
            showCancelButton: true,
            confirmButtonText: `View course list`,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/courses";
            }
          });
          this.resetForm();
        })
        .catch((err) => {
          this.isLoading = false;
          Swal.fire({
            title: "Server Error!",
            text: err.response.data.message,
            icon: "warning",
          });
        });
    },
    resetForm() {
      this.isValid = false;
      this.code = "";
      this.title = "";
      this.category = "uncategorized";
      this.lessons = "";
      this.description = "";
      this.imgTitle = "";
      this.imgAlt = "";
      this.draft = "";
      this.isLoading = false;
      this.$refs.myEditor.setHTML("");
    },
    getCategories() {
      axios.get("admin/course/categories/all/raw").then((res) => {
        this.categories = res.data.data;
      });
    },
  },
  computed: {
    formIsValid() {
      return this.title && this.code && this.lessons;
    },
    formDataHandler() {
      let fd = new FormData();
      fd.append("code", this.code);
      fd.append("title", this.title);
      fd.append("category_id", this.category);
      fd.append("lessons", this.lessons);
      fd.append("description", this.description);
      fd.append("imgTitle", this.imgTitle);
      fd.append("alt", this.imgAlt);
      fd.append("draft", this.draft);
      return fd;
    },
  },
};
</script>
<style>
.ql-container {
  height: 300px !important;
}
.swal2-styled.swal2-confirm {
  margin-right: 10px !important;
}
</style>
