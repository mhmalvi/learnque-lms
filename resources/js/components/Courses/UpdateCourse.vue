<template>
  <div>
    <CourseFormComponent ref="form_component" @formSubmit="handleUpdate" />
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import CourseFormComponent from "./CourseFormComponent.vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  props: ["data"],
  components: { CourseFormComponent },
  setup({ data }) {
    const course_data = JSON.parse(data);
    const course = ref(course_data);
    const form_component = ref(0);

    onMounted(() => {
      form_component.value.setData(course.value);
    });

    const handleUpdate = (data) => {
      axios
        .post("/admin/courses/edit/" + course.value.id, {
          _method: "PATCH",
          ...data,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
          form_component.value.success(false);

          if (res.data.redirect_back) {
            location.replace(res.data.index_page);
          }
        })
        .catch((err) => {
          form_component.value.fail(err.response);
        })
        .finally(() => {
          form_component.value.completed();
        });
    };

    return {
      course,
      form_component,
      handleUpdate,
    };
  },
};
</script>
