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
        <div class="card">
          <div class="card-body">
            <add-teacher-component :classroom_id="classroom.unique_id" />
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <add-student-component :classroom_id="classroom.unique_id" />
          </div>
        </div>

        <students-list-component :classroom_id="classroom.unique_id" />
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import AddStudentComponent from "./AddStudentComponent.vue";
import AddTeacherComponent from "./AddTeacherComponent.vue";
import StudentsListComponent from "./StudentsListComponent.vue";

export default {
  components: {
    AddStudentComponent,
    AddTeacherComponent,
    StudentsListComponent,
  },
  props: ["classroom_data"],
  setup(props) {
    const classroom = ref(JSON.parse(props.classroom_data));
    return {
      classroom,
    };
  },
};
</script>
