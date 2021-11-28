<template>
  <div>
    <p v-if="isLoading" class="text-center py-4">
      <i class="fas fa-circle-notch fa-spin"></i>
    </p>

    <h4 class="text-center py-3" v-else-if="teachers.length == 0">
      No teacher here
    </h4>

    <label class="form-label d-flex justify-content-between" v-else>
      <span>Teacher List</span>
      <button class="btn btn-outline-primary btn-sm" v-if="isAdmin()">
        <i class="fas fa-circle-notch mr-2 fa-spin" v-if="isUpdating"></i>
        <i class="fas fa-plus-circle mr-2" v-else></i>
        Update
      </button>
    </label>

    <ul class="list-group">
      <li
        class="list-group-item"
        v-for="(teacher, index) in teachers"
        :key="index"
      >
        <span>
          {{ teacher.user.username }}
        </span>
        <a
          href="javascript:void(0)"
          @click="removeTeacher(index)"
          v-if="isAdmin()"
        >
          <i class="fas fa-times ml-2"></i>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";
import { useStore } from "vuex";

export default {
  setup() {
    const store = useStore();

    const classroom_id = store.getters.getClassroomId;
    const user_mode = store.getters.getUserMode;

    const action = "/classrooms/" + classroom_id + "/teachers/list";
    const teachers = ref([]);
    const isLoading = ref(false);
    const isUpdating = ref(false);

    const getAddedTeachers = (action) => {
      isLoading.value = true;
      axios
        .get(action)
        .then((res) => {
          teachers.value = res.data.data;
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const isAdmin = () => {
      return user_mode == "admin";
    };

    onMounted(() => {
      getAddedTeachers(action);
    });

    return {
      teachers,
      isLoading,
      isUpdating,
      isAdmin,
    };
  },
};
</script>
