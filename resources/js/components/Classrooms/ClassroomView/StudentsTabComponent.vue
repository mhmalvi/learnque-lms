<template>
  <div>
    <div class="card">
      <div class="card-body">
        <add-student-component />
      </div>
    </div>

    <student-list-component />
  </div>
</template>

<script>
import AddStudentComponent from "../AddStudentComponent.vue";
import StudentListComponent from "../StudentListComponent.vue";

export default {
  components: {
    AddStudentComponent,
    StudentListComponent,
  },
  setup() {},
};
</script>
