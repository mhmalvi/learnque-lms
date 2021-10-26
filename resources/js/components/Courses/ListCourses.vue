<template>
  <div>
    <div class="card">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th width="5%">#</th>
            <th width="40%">Course Title</th>
            <th width="20%">Category</th>
            <th width="10%">Thumbnail</th>
            <th width="10%">Status</th>
            <th width="15%">Created at</th>
          </tr>
        </thead>
        <tbody v-if="courses.length == 0">
          <tr>
            <td colspan="12" class="text-center">
              <b>No course found! </b>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr></tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";
import axios from "axios";

export default {
  setup() {
    const courses = ref([]);
    const itemsPerPage = ref(5);
    const search = ref("");

    // on mount
    (() => {
      getCourses();
    })();

    function getCourses() {
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
        });
    }

    return {
      courses,
    };
  },
};
</script>
