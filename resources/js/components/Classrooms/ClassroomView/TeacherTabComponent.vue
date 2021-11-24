<template>
  <div>
    <div class="card">
      <div class="card-body">
        <add-teacher-component />
      </div>
    </div>

    <teacher-list-component />
  </div>
</template>

<script>
import AddTeacherComponent from "../AddTeacherComponent.vue";
import TeacherListComponent from "../TeacherListComponent.vue";

export default {
  components: {
    AddTeacherComponent,
    TeacherListComponent,
  },
  setup() {
    return {};
  },
};
</script>
