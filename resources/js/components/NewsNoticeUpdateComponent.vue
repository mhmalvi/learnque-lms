<template>
  <div>
    <NewsNoticeFormComponent ref="form_component" @formSubmit="handleUpdate" />
  </div>
</template>

<script>
import NewsNoticeFormComponent from "./NewsNoticeFormComponent.vue";
import { ref, onMounted } from "vue";
import Swal from "sweetalert2";

export default {
  components: { NewsNoticeFormComponent },
  props: ["data"],
  setup({ data }) {
    const form_component = ref(0);
    let news_notice = null;

    onMounted(() => {
      news_notice = JSON.parse(data);
      form_component.value.setData(news_notice);
    });

    const handleUpdate = (data) => {
      axios
        .post("/admin/news_notices/edit/" + news_notice.slug, {
          _method: "PATCH",
          ...data,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: err.response.data.message,
          });
        })
        .finally(() => {
          form_component.value.complete();
        });
    };

    return {
      form_component,
      handleUpdate,
    };
  },
};
</script>
