<template>
  <div>
    <div class="row py-2">
      <div class="col-md-12">
        <img
          src="/assets/images/paths/typescript_892x286.png"
          class="img-fluid rounded"
          alt=""
        />
      </div>
    </div>
    <div class="row py-2">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body"></div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="mb-3">
          <publish-post-component :classroom_id="classroom.unique_id" />
        </div>

        <post-list-component :classroom_id="classroom.unique_id" />

        <student-list-component :classroom_id="classroom.unique_id" />
      </div>
    </div>
  </div>
</template>

<script>
import PostListComponent from "../PostListComponent.vue";
import PublishPostComponent from "../Classrooms/PublishPostComponent.vue";
import StudentListComponent from "../Classrooms/StudentListComponent.vue";

export default {
  components: { PostListComponent, PublishPostComponent, StudentListComponent },
  props: ["classroom_data"],
  setup({ classroom_data }) {
    const classroom = JSON.parse(classroom_data);

    return {
      classroom,
    };
  },
};
</script>
