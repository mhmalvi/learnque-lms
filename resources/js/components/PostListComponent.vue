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

    <div
      class="d-flex justify-content-center mb-3"
      v-if="meta.current_page != meta.last_page"
    >
      <span v-if="loadingMore" disabled>
        <i class="fa fa-circle-notch fa-spin"></i>
      </span>
      <button class="btn btn-outline-primary btn-sm" @click="loadMore()" v-else>
        Load More
      </button>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, reactive } from "vue";
import { useStore } from "vuex";
import axios from "axios";
import PostComponent from "./ClassroomPostComponent.vue";
import Swal from "sweetalert2";

export default {
  components: { PostComponent },
  setup() {
    const store = useStore();

    const classroom_id = store.getters.getClassroomId;

    const posts = ref([]);
    const isLoading = ref(false);
    const loadingMore = ref(false);
    const meta = reactive({
      current_page: null,
      last_page: null,
    });
    const itemsPerPage = ref(2);

    onMounted(() => {
      getPosts();
    });

    function getPosts(page = null) {
      if (!page) {
        isLoading.value = true;
      }
      axios
        .get("/classrooms/" + classroom_id + "/posts/list", {
          params: {
            items: itemsPerPage.value,
            page: page,
          },
        })
        .then((res) => {
          res.data.data.forEach((item) => {
            posts.value.push(item);
          });
          meta.current_page = res.data.meta.current_page;
          meta.last_page = res.data.meta.last_page;
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
          loadingMore.value = false;
        });
    }

    const loadMore = () => {
      loadingMore.value = true;
      if (meta.current_page < meta.last_page) {
        getPosts(meta.current_page + 1);
      }
    };

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
      loadingMore,
      loadMore,
      meta,
    };
  },
};
</script>
