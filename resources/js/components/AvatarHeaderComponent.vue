<template>
  <img :src="avatar" alt="logo" class="img-fluid" />
</template>

<script>
import { ref, onMounted, watch } from "vue";
import { useStore } from "vuex";

export default {
  props: ["avatar_url"],
  setup({ avatar_url }) {
    // /assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg
    const avatar = ref("");
    const store = useStore();

    onMounted(() => {
      avatar.value = avatar_url;
      console.log(avatar.value);
    });

    watch(
      () => {
        return store.getters.getAvatar;
      },
      (newVal, oldVal) => {
        if (newVal != avatar.value) {
          avatar.value = newVal;
        }
      }
    );

    return {
      avatar,
    };
  },
};
</script>
