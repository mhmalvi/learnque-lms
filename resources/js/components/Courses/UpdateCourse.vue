<template>
  <div>
    <CourseFormComponent ref="form_component" @formSubmit="handleUpdate" />
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import CourseFormComponent from "./CourseFormComponent.vue";

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

    const handleUpdate = () => {};

    return {
      course,
      form_component,
      handleUpdate,
    };
  },
};
</script>
