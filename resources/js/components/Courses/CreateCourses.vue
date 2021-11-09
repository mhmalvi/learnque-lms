<template>
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
              v-model="formData.code"
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
              v-model="formData.title"
            />
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
          <button type="reset" class="btn btn-sm btn-outline-light m-1">
            <span class="material-icons mr-2">clear_all</span>
            clear
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { ref, reactive, computed, onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";
import Validators from "../../modules/Validators";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import IsLoading from "../../modules/IsLoading";

export default {
  components: { QuillEditor },

  setup(props) {
    const isLoading = ref(false);
    const isValid = ref(false);
    const data = reactive({
      categories: {},
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

    const formIsValid = computed(() => {
      return formData.title && formData.code;
    });

    const resetForm = () => {
      isValid.value = false;
      formData.code = "";
      formData.title = "";
      formData.category = "uncategorized";
      formData.description = "";
      formData.thumbnail = "";
      formData.$refs.myEditor.setHTML("");
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
      axios
        .post("admin/courses", formData)
        .then((res) => {
          stop();
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
          resetForm();
        })
        .catch((err) => {
          stop();
          Swal.fire({
            title: "Server Error!",
            text: err.response.data.message,
            icon: "warning",
          });
        });
    };

    return {
      data,
      formData,
      formIsValid,
      onThumbnailUpload,
      onFormSubmitHandlar,
      onSaveAsDraft,
      isLoading,
    };
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
