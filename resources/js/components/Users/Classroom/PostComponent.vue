<template>
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">
        {{ post.user.username }}
      </h4>
      <p class="card-subtitle text-muted mb-2">{{ post.created_at }}</p>
      <div class="card-text post-description" v-html="post.description"></div>
      <div class="card-text" v-if="post.attachments.length > 0">
        <div
          class="
            file-attachment-item
            badge badge-info
            rounded-pill
            mr-1
            py-1
            px-2
          "
          v-for="(attachment, index) in post.attachments"
          :key="index"
        >
          <a :href="attachment.file_url" target="_blank" class="text-light">
            {{ attachment.title }}
          </a>
        </div>
      </div>
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
