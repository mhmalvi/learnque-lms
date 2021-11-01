<template>
  <div>
    <h4>Add Student</h4>

    <div class="form-group">
      <label for="select_student" class="form-label"></label>

      <input
        list="select_student"
        class="form-control"
        @change="newUserAdded"
        v-model="student_select"
      />
      <datalist id="select_student">
        <option
          v-for="(student, index) in students"
          :key="index"
          :value="student.username"
        >
          {{ student.username }} - {{ student.info.first_name }}
          {{ student.info.last_name }}
        </option>
      </datalist>
    </div>

    <div class="form-group">
      <button
        class="btn btn-sm btn-info mr-2"
        v-for="(student, index) in selected_students"
        :key="index"
        @click="removeStudent(index)"
      >
        {{ student }} <i class="fas fa-times ml-2"></i>
      </button>
    </div>

    <div class="form-group">
      <button class="btn btn-primary" @click="save">
        <span class="material-icons mr-2">save</span>
        Save
      </button>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, onMounted } from "vue";

export default {
  setup() {
    const students = ref([]);
    const student_select = ref("");
    const selected_students = ref([]);

    function getStudents() {
      axios
        .get("/admin/students/raw")
        .then((res) => {
          students.value = res.data.data;
        })
        .catch((error) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching students!",
          });
        });
    }

    function newUserAdded() {
      // check if there is a student who's username matches with user's input
      let found_student = students.value.filter((student) => {
        return student.username == student_select.value;
      });
      // if no matching student found, return and quit
      if (found_student.length == 0) return;

      // found a student who's username matches with user's input
      // now add the student in the added list
      if (
        student_select.value != "" &&
        selected_students.value.indexOf(student_select.value) == -1
      ) {
        selected_students.value.push(student_select.value);
      }
      student_select.value = "";
    }

    function removeStudent(index) {
      selected_students.value.splice(index, 1);
    }

    function save() {
      axios
        .post("/admin/classroom/add/students", {
          students: selected_students.value,
        })
        .then()
        .catch();
    }

    onMounted(() => {
      getStudents();
    });

    return {
      students,
      student_select,
      newUserAdded,
      selected_students,
      removeStudent,
      save,
    };
  },
};
</script>
