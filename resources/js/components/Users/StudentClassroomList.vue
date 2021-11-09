<template>
  <div>
    <div class="d-flex justify-content-center" v-if="isLoading">
      <h5>
        <i class="fas fa-circle-notch fa-spin"></i>
      </h5>
    </div>
    <div
      class="d-flex justify-content-center"
      v-else-if="classrooms.length == 0"
    >
      <h5>No classrooms here</h5>
    </div>
    <div v-else>
      <div v-for="(classroom, index) in classrooms" :key="index">
        <classroom-item :classroom="classroom" />
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { ref, onMounted } from "vue";
import ClassroomItem from "./StudentClassroomItemComponent.vue";

export default {
  components: { ClassroomItem },
  setup() {
    const classrooms = ref([]);
    const isLoading = ref(false);
    const itemsPerPage = ref(5);

    function getClassrooms() {
      isLoading.value = true;
      axios
        .get("/student/classrooms/list", {
          items: itemsPerPage.value,
        })
        .then((res) => {
          classrooms.value = res.data.data;
        })
        .catch((err) => {
          console.log(err);

          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetch classrooms!",
          });
        })
        .finally(() => (isLoading.value = false));
    }

    onMounted(() => {
      getClassrooms();
    });

    return {
      classrooms,
      isLoading,
    };
  },
};
</script>
