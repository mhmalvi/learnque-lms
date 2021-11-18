<template>
  <div>
    <div v-if="isLoading" class="d-flex justify-content-center">
      <h3>
        <i class="fas fa-circle-notch fa-spin"></i>
      </h3>
    </div>
    <div v-for="(post, index) in posts" :key="index" v-else>
      <post-component :post="post" />
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";
import PostComponent from "./PostComponent.vue";
import Swal from "sweetalert2";

export default {
  components: { PostComponent },
  props: ["classroom_id"],
  setup({ classroom_id }) {
    const posts = ref([]);
    const isLoading = ref(false);

    onMounted(() => {
      getPosts();
    });

    function getPosts() {
      isLoading.value = true;
      axios
        .get("classrooms/" + classroom_id + "/posts/list")
        .then((res) => {
          posts.value = res.data.data;
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong while fetching the classroom posts",
          });
          console.error(err);
        })
        .finally(() => {
          isLoading.value = false;
        });
    }

    return {
      posts,
      isLoading,
    };
  },
};
</script>
