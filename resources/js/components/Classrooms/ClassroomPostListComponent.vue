<template>
  <div>
    <div v-if="isLoading" class="d-flex justify-content-center">
      <h5>
        <i class="fas fa-circle-notch fa-spin"></i>
      </h5>
    </div>
    <div v-else-if="posts.length == 0" class="d-flex justify-content-center">
      <h5>No posts here</h5>
    </div>
    <div v-else>
      <div v-for="(post, index) in posts" :key="index">
        <post-component :post="post" />
      </div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, watch } from "vue";
import Swal from "sweetalert2";
import { useStore } from "vuex";
import PostComponent from "../ClassroomPostComponent.vue";

export default {
  props: ["classroom_id"],
  components: { PostComponent },
  setup({ classroom_id }) {
    const posts = ref([]);
    const isLoading = ref(false);
    const itemsPerPage = ref(5);

    const store = useStore();

    function getPosts() {
      isLoading.value = true;
      axios
        .get("/admin/classroom/" + classroom_id + "/posts", {
          params: {
            items: itemsPerPage.value,
          },
        })
        .then((res) => {
          posts.value = res.data.data;
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title:
              "Something went wrong while fetching this classroom's posts!",
          });
          console.error(err);
        })
        .finally(() => (isLoading.value = false));
    }

    onMounted(() => {
      getPosts();
    });

    store.watch(
      (state, _) => {
        return state.classroomPosts.newPosts;
      },
      (newVal, oldVal) => {
        getPosts();
      }
    );

    return {
      posts,
      isLoading,
    };
  },
};
</script>
