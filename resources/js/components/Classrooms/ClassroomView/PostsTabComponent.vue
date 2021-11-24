<template>
  <div class="fadeIn">
    <publish-post-component />

    <div class="mt-4">
      <post-list-component />
    </div>
  </div>
</template>

<script>
import PublishPostComponent from "../PublishPostComponent.vue";
import PostListComponent from "../../PostListComponent.vue";

export default {
  components: { PublishPostComponent, PostListComponent },
  setup() {
    return {};
  },
};
</script>

