<template>
  <div class="row" v-if="state.isLoading">
    <div class="col-12 text-center">
      <h4>
        <i class="fas fa-circle-notch fa-spin"></i>
      </h4>
    </div>
  </div>
  <div
    class="row d-flex justify-content-center"
    v-else-if="state.liveClasses.length == 0"
  >
    <h5>No live class here</h5>
  </div>
</template>

<script>
import LiveClassGridItemComponent from "./LiveClassGridItemComponent.vue";
import { reactive, onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";

export default {
  components: {
    LiveClassGridItemComponent,
  },
  setup() {
    const state = reactive({
      isLoading: false,
      action_link: "/admin/liveclass/list",
      liveClasses: [],
      pagination: {
        links: [],
        options: {
          perPage: 8,
        },
      },
    });

    onMounted(() => {
      getLiveClasses(state.action_link);
    });

    const getLiveClasses = (action_link) => {
      state.isLoading = true;
      axios
        .get(action_link, state.pagination.options)
        .then((res) => {
          state.liveClasses = res.data.data;
          state.pagination.links = res.data.meta.links;
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
          console.error(err.response.data.error);
        })
        .finally(() => {
          state.isLoading = false;
        });
    };

    return {
      state,
    };
  },
};
</script>
