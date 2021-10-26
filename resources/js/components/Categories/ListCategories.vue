<template>
  <div>
    <div class="card">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th width="10%">#</th>
            <th width="10%">Thumbnail</th>
            <th width="20%">Category</th>
            <th width="40%">Description</th>
            <th Width="20%">Created At</th>
          </tr>
        </thead>
        <tbody v-if="isLoading">
          <tr>
            <td>
              <i class="fas fa-circle-notch fa-spin"></i>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr v-for="(category, index) in categories" v-bind:key="index">
            <td>{{ index++ }}</td>
            <td></td>
            <td>
              {{ category.title }}
              <div class="pt-1">
                <a class="btn text-primary pl-0">Edit</a>
                <a class="btn text-primary pl-0">Delete</a>
              </div>
            </td>
            <td>{{ category.description }}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";
import { useStore } from "vuex";

export default {
  setup() {
    const isLoading = ref(false);
    const itemsPerPage = ref(5);
    const search = ref("");
    const categories = ref([]);

    const store = useStore();

    // fires on mount
    (() => {
      axios
        .get("admin/course/categories/all", {
          params: {
            items: itemsPerPage.value,
            search: search.value,
          },
        })
        .then((res) => {
          categories.value = res.data.data;
        });
    })();

    // watch for new category creation, and then add it to list
    store.watch(
      (state, _) => {
        return state.course_category.newCategory;
      },
      (newVal, oldVal) => {
        if (!_.isEmpty(newVal)) {
          categories.value.unshift(newVal);
          store.commit("course_category/resetNewCategory");
        }
      }
    );

    return {
      isLoading,
      itemsPerPage,
      search,
      categories,
    };
  },
};
</script>
