<template>
  <div>
    <form action="">
      <div class="form-group">
        <label for="title">Title</label>
        <input
          type="text"
          class="form-control"
          id="title"
          v-model="form.title"
        />
        <p v-if="message.errors.title" class="text-danger">
          {{ message.errors.title[0] }}
        </p>
      </div>

      <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" v-model="form.slug" />
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea
          cols="30"
          rows="5"
          class="form-control"
          style="resize: none"
          v-model="form.description"
        ></textarea>
      </div>

      <div class="d-flex align-items-center">
        <div class="form-group img-container">
          <label for="thumbnail" class="img-container-lbl"
            >Click here to Upload Thumbnail</label
          >
          <div class="row w-100" v-if="form.thumbnail">
            <div class="col-12 img-wrapper">
              <img :src="form.thumbnail" class="img-fluid" />
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

      <div class="form-group">
        <button
          class="btn btn-sm btn-outline-primary font-weight-light px-3"
          @click.prevent="submit"
          :disabled="!formIsValid"
        >
          <i class="fas fa-circle-notch fa-spin" v-if="isSubmitting"></i>
          <i class="fas fa-plus-circle" v-else></i>
          <span class="ml-2">Save</span>
        </button>
      </div>
      <div class="form-group">
        <div class="alert alert-success" v-if="message.success">
          {{ message.success }}
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { ref, reactive, computed } from "vue";
import axios from "axios";
import { useStore } from "vuex";
import Validators from "../../modules/Validators";

export default {
  setup() {
    const isSubmitting = ref(false);

    const form = reactive({
      title: "",
      slug: "",
      description: "",
      thumbnail: "",
    });

    const message = reactive({
      validation: {},
      errors: {},
      success: "",
    });

    const store = useStore();

    const onThumbnailUpload = (event) => {
      const { fileType } = Validators();
      let file = event.target.files[0];
      if (fileType(file.name)) {
        let reader = new FileReader();
        reader.onload = (e) => {
          form.thumbnail = e.target.result;
        };
        reader.readAsDataURL(file);
      } else {
        // this.errors.push(`${file.name} is not a valid file type!`);
      }
    };

    const formIsValid = computed(() => {
      return form.title;
    });

    function submit() {
      isSubmitting.value = true;
      axios
        .post("admin/categories", form)
        .then((res) => {
          store.commit("courseCategories/addNewCategory", {
            title: form.title,
            slug: form.slug,
            description: form.description,
          });

          message.success = res.data.message;

          reset();
        })
        .catch((err) => {
          message.errors = err.response.data.errors;
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    }

    const reset = () => {
      form.title = "";
      form.slug = "";
      form.description = "";
    };

    return {
      isSubmitting,
      form,
      submit,
      message,
      onThumbnailUpload,
      formIsValid,
    };
  },
};
</script>
