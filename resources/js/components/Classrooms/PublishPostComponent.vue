<template>
  <div>
    <form @submit.prevent="handleFormSubmit">
      <div class="form-group">
        <label class="form-label">Publish a post</label>
        <input
          type="text"
          class="form-control form-control-flush"
          placeholder="Type title here ..."
          v-model="form.title"
        />
      </div>

      <div class="form-group">
        <label for="description" class="form-label">Description</label>
        <quill-editor
          theme="snow"
          contentType="html"
          ref="description"
          v-model:content="form.description"
        />
      </div>

      <div class="form-group d-flex justify-content-end">
        <button
          class="btn btn-primary"
          :class="isSubmitting && 'is-loading'"
          type="submit"
          :disabled="!isValid || isSubmitting"
        >
          <span class="material-icons mr-2">send</span>
          Publish
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import axios from "axios";
import Swal from "sweetalert2";
import { reactive, computed, ref } from "vue";

export default {
  components: { QuillEditor },
  props: ["classroom_id"],
  setup({ classroom_id }, context) {
    const form = reactive({
      title: "",
      description: "",
    });
    const description = ref(null); // for binding with the quill editor with reference
    const isSubmitting = ref(false);

    const isValid = computed(() => {
      return form.title.trim().length > 0;
    });

    function handleFormSubmit() {
      isSubmitting.value = true;
      axios
        .post("/admin/classroom/" + classroom_id + "/posts", {
          ...form,
          classroom_id,
        })
        .then((res) => {
          resetForm();
          Swal.fire({
            icon: "success",
            title: res.data.message,
            timer: 2000,
          });
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            timer: 3000,
          });
          console.error(err);
        })
        .finally(() => (isSubmitting.value = false));
    }

    function resetForm() {
      form.title = "";
      description.value.setHTML("");
    }
    console.log("context", context);

    return {
      form,
      isValid,
      handleFormSubmit,
      isSubmitting,
      description,
    };
  },
};
</script>
