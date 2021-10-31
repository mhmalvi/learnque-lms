<template>
  <form @submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="title">Title</label>
      <input
        type="text"
        class="form-control"
        id="title"
        placeholder="The title is required"
        v-model="form.title"
      />
    </div>
    <div class="form-group">
      <label for="section">Section</label>
      <input
        type="text"
        class="form-control"
        id="section"
        placeholder="The section is required"
        v-model="form.section"
      />
    </div>
    <div class="form-group">
      <label for="course">Course</label>
      <select id="course" class="form-control" v-model="form.course">
        <option value="">Choose</option>
        <option
          v-for="(course, index) in courses"
          v-bind:key="index"
          :value="course.uuid"
        >
          {{ course.title }}
        </option>
      </select>
    </div>
    <div class="form-group">
      <label for="cover_photo">Cover Photo</label>
      <input type="file" id="cover_photo" class="form-control" />
    </div>

    <button
      type="submit"
      class="btn btn-sm btn-primary"
      :class="isSubmitting && 'is-loading'"
    >
      <i class="fas fa-plus-circle"></i>
      <span class="ml-2">Create</span>
    </button>
  </form>
</template>
<script>
import axios from "axios";
import Swal from "sweetalert2";
import { reactive, onMounted, ref } from "vue";
export default {
  setup() {
    const form = reactive({
      title: "",
      section: "",
      course: "",
    });
    const courses = ref([]);
    const isSubmitting = ref(false);

    function getCourses() {
      axios
        .get("/admin/courses/raw")
        .then((res) => {
          courses.value = res.data.data;
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching courses!",
          });
        });
    }

    function handleFormSubmit() {
      axios
        .post("/admin/classroom", {
          ...form,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          resetForm();
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            text: err.response.data.message,
          });
        });
    }

    function resetForm() {
      form.title = "";
      form.section = "";
      form.course = "";
    }

    onMounted(() => {
      getCourses();
    });

    return {
      form,
      courses,
      isSubmitting,
      handleFormSubmit,
    };
  },
};
</script>
<style lang="">
</style>
