<template>
  <div class="py-5">
    <div class="card">
      <table class="table table-responsive">
        <thead class="text-center bg-light">
          <tr>
            <th width="10%">#</th>
            <th width="10%">Thumbnail</th>
            <th width="50%">Course Title</th>
            <th width="30%">Category</th>
          </tr>
        </thead>
        <tbody v-if="isLoading">
          <tr>
            <td colspan="12" class="text-center">
              <b>Loading...</b>
            </td>
          </tr>
        </tbody>
        <tbody v-else-if="courses.length == 0">
          <tr>
            <td colspan="12" class="text-center">
              <b>No course found! </b>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr v-for="(course, index) in courses" v-bind:key="index">
            <td>{{ index + 1 }}</td>
            <td>
              {{ course.title }}
              <div class="pt-1">
                <a class="btn text-primary pl-0">Edit</a>
                <a class="btn text-primary pl-0" @click="deleteCourse"
                  >Delete</a
                >
              </div>
            </td>
            <td>{{ course.category.title }}</td>
            <td>{{ course.thumbnail }}</td>
            <td>{{ course.publish_status }}</td>
            <td>{{ course.created_at }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  setup() {
    const courses = ref([]);
    const itemsPerPage = ref(5);
    const search = ref("");
    const isLoading = ref(false);

    // on mount
    (() => {
      getCourses();
    })();

    function getCourses() {
      isLoading.value = true;
      axios
        .get("admin/courses/all", {
          params: {
            items: itemsPerPage.value,
            search: search.value,
          },
        })
        .then((res) => {
          courses.value = res.data.data;
          console.log(courses.value);
        })
        .catch((error) => {
          console.log(error);
        })
        .finally(() => {
          isLoading.value = false;
        });
    }

    function deleteCourse(course) {
      Swal.fire({
        icon: "warning",
        title: "Are you sure you want to delete this course?",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it",
      }).then((res) => {
        if (res.isConfirmed) {
          axios
            .post("admin/courses/" + course.uuid, {
              _method: "DELETE",
            })
            .then((res) => {});
        }
      });
    }

    return {
      courses,
      isLoading,
      deleteCourse,
    };
  },
};
</script>
