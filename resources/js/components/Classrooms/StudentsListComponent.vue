<template>
  <div>
    <p v-if="isLoading" class="text-center py-4">
      <i class="fas fa-circle-notch fa-spin"></i>
    </p>
    <h4 class="text-center py-4" v-else-if="students.length == 0">
      No students here
    </h4>
    <label class="form-label d-flex justify-content-between" v-else>
      <span>Students List</span>
      <button class="btn btn-outline-primary btn-sm">
        <i class="fas fa-circle-notch mr-2 fa-spin" v-if="isUpdating"></i>
        <i class="fas fa-plus-circle mr-2" v-else></i>
        Update
      </button>
    </label>

    <ul class="list-group">
      <li
        class="list-group-item"
        v-for="(student, index) in students"
        :key="index"
      >
        <span>
          {{ student }}
        </span>
        <a href="javascript:void(0)" @click="removeStudent(index)">
          <i class="fas fa-times ml-2"></i>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import { useStore } from "vuex";

export default {
  props: ["classroom_id"],
  setup({ classroom_id }) {
    const students = ref([]);
    const isLoading = ref(false);
    const isUpdating = ref(false);

    const store = useStore();

    function getAddedStudents() {
      students.value = [];
      isLoading.value = true;
      axios
        .get("/admin/classroom/" + classroom_id + "/students")
        .then((res) => {
          for (let key in res.data.data) {
            students.value.push(res.data.data[key].user.username);
          }
        })
        .catch((error) => {
          console.log(error);
          Swal.fire({
            icon: "error",
            title:
              "Something went wrong while fetching classroom's student list!",
            text: error.response.data.message,
          });
        })
        .finally(() => {
          isLoading.value = false;
        });
    }

    onMounted(() => {
      getAddedStudents();
    });

    store.watch(
      (state, _) => {
        return state.classroomStudents.newStudents;
      },
      (newVal, oldVal) => {
        console.log("new student added");
        getAddedStudents();
      }
    );

    return {
      isLoading,
      students,
      isUpdating,
    };
  },
};
</script>
