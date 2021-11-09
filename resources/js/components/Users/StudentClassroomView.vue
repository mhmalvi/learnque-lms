<template>
  <div>
    <div class="col-md-6 offset-md-3">
      <post-list-component :classroom_id="classroom.unique_id" />
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import PostListComponent from "./Classroom/PostListComponent.vue";

export default {
  components: { PostListComponent },
  props: ["classroom_data"],
  setup({ classroom_data }) {
    const classroom = JSON.parse(classroom_data);

    return {
      classroom,
    };
  },
};
</script>
