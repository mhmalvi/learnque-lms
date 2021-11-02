<template>
  <div>
    <div class="row card-group-row">
      <course-item-component
        v-for="(course, index) in courses"
        :key="index"
        :course="course"
      />
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CourseItemComponent from "./CourseItemComponent.vue";
import { ref } from "vue";

export default {
  components: { CourseItemComponent },
  setup() {
    const courses = ref([]);
    axios
      .get("/api/courses", {
        params: {
          items: 8,
        },
      })
      .then((res) => {
        courses.value = res.data.data;
      });

    return {
      courses,
    };
  },
};
</script>
