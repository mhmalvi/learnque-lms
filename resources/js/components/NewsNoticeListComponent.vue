<template>
  <div>
    <div class="card table-responsive">
      <table class="table">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th width="120px">Image</th>
            <th>Title</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="isLoading">
            <td class="text-center" colspan="12">
              <i class="fas fa-circle-notch fa-spin"></i>
            </td>
          </tr>
          <tr v-else-if="data.news_notices.length == 0">
            <td class="text-center" colspan="12">No data found!</td>
          </tr>
          <tr
            v-else
            v-for="(news_notice, index) in data.news_notices"
            :key="index"
          >
            <td>{{ index + 1 }}</td>
            <td>
              <img
                class="thumbnail-image img-thumbnail"
                :src="news_notice.image"
                :alt="news_notice.title"
              />
            </td>
            <td>
              {{ news_notice.title }}
              <div>
                <a
                  :href="getEditLink(news_notice)"
                  class="btn text-primary pl-0"
                  >Edit</a
                >
                <a href="#" class="btn text-primary pl-0">Delete</a>
              </div>
            </td>
            <td v-html="news_notice.description"></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { reactive, ref, onMounted } from "vue";

export default {
  setup() {
    const data = reactive({
      news_notices: [],
    });
    const isLoading = ref(false);

    onMounted(() => {
      getNewsNotices();
    });

    const getNewsNotices = () => {
      isLoading.value = true;
      axios
        .get("/admin/news_notices/all")
        .then((res) => {
          data.news_notices = res.data.data;
          console.log(data);
        })
        .catch((err) => {
          console.error(err.response);
        })
        .finally(() => {
          isLoading.value = false;
        });
    };

    const getEditLink = (item) => {
      return "/admin/news_notices/edit/" + item.slug;
    };

    return {
      data,
      isLoading,
      getEditLink,
    };
  },
};
</script>

<style>
.thumbnail-image {
  width: 70px;
  height: auto;
}
</style>
