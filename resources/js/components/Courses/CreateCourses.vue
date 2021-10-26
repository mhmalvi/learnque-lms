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
                <option value="uncategorized" selected>Uncategorized</option>
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
              <label class="form-label" for="details">Descriptions</label>
              <!-- <quill-editor /> -->
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
export default {
  data() {
    return {
      isValid: false,
      code: "",
      title: "",
      category: "uncategorized",
      lessons: "",
      thumbnail: "",
      details: "",
      imgTitle: "",
      imgAlt: "",
      draft: "",
      isLoading: false,
    };
  },
  methods: {
    onImageUpload(image) {},
    onFormSubmitHandlar() {
      this.isLoading = true;
      axios
        .post("admin/course/store", this.formDataHandler)
        .then((res) => {
          this.isLoading = false;
          Swal.fire({
            title: "Success",
            text: "Data saved successfully!",
            icon: "success",
            showCancelButton: true,
            confirmButtonText: `View course list`,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "/admin/course/all-courses";
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
      this.details = "";
      this.imgTitle = "";
      this.imgAlt = "";
      this.draft = "";
      this.isLoading = false;
      this.$refs.myEditor.setHTML("");
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
      fd.append("category", this.category);
      fd.append("lessons", this.lessons);
      fd.append("descriptions", this.details);
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
