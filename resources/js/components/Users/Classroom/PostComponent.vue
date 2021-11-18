<template>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">
        {{ post.user.username }}
      </h4>
      <p class="card-subtitle text-muted mb-2">{{ post.created_at }}</p>
      <div class="card-text post-description" v-html="post.description"></div>
    </div>
    <h6 class="card-footer mb-0">0 comment</h6>
  </div>
</template>

<script>
export default {
  props: ["post"],
  setup({ post }) {
    return {
      post,
    };
  },
};
</script>
