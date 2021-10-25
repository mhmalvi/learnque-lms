<template>
  <div>
    <form action="">
      <div class="form-group">
        <label for="title">Category Title</label>
        <input type="text" class="form-control" id="title" v-model="title" />
        <p v-if="errors.title" class="text-danger">{{ errors.title[0] }}</p>
      </div>

      <div class="form-group">
        <label>Category Slug</label>
        <input type="text" class="form-control" v-model="slug" />
      </div>

      <div class="form-group">
        <label>Category Description</label>
        <textarea
          cols="30"
          rows="5"
          class="form-control"
          style="resize: none"
          v-model="description"
        ></textarea>
      </div>

      <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" class="form-control" />
      </div>

      <div class="form-group">
        <button
          class="btn btn-sm btn-primary font-weight-light px-3"
          @click.prevent="submit"
        >
          <i class="fas fa-circle-notch fa-spin" v-if="isSubmitting"></i>
          <i class="fas fa-plus-circle" v-else></i>
          <span class="ml-2">Save</span>
        </button>
      </div>
      <div class="form-group">
        <div class="alert alert-success" v-if="success_message">
          {{ success_message }}
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";
import { useStore } from "vuex";

export default {
  setup() {
    const isSubmitting = ref(false);
    const title = ref("");
    const slug = ref("");
    const description = ref("");
    const errors = ref({});
    const success_message = ref("");

    const store = useStore();

    console.log("store info", store.state);

    function submit() {
      isSubmitting.value = true;
      errors.value = {};
      success_message.value = "";

      axios
        .post("admin/course/categories", {
          title: title.value,
          slug: slug.value,
          description: description.value,
        })
        .then((res) => {
          console.log(res);
          success_message.value = res.data.message;

          store.commit("course_category/addNewCategory", {
            title: title.value,
            slug: slug.value,
            description: description.value,
          });

          resetForm();
        })
        .catch((error) => {
          errors.value = error.response.data.errors;
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    }

    function resetForm() {
      title.value = "";
      slug.value = "";
      description.value = "";
    }

    return {
      isSubmitting,
      title,
      slug,
      description,
      submit,
      errors,
      success_message,
    };
  },

  methods: {},
};
</script>
