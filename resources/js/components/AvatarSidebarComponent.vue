<template>
  <a href="javascript:void(0)" class="sidebar-brand">
    <span class="avatar avatar-xl sidebar-brand-icon h-auto">
      <img
        class="sidebar-brand-icon rounded-circle"
        :src="user.avatar"
        :alt="user.avatar"
      />
    </span>
    <span>{{ user.name }}</span>
  </a>
</template>

<script>
import { reactive, onMounted, watch } from "vue";
import { useStore } from "vuex";

export default {
  props: ["user_data"],
  setup({ user_data }) {
    // /assets/images/256_rsz_nicolas-horn-689011-unsplash.jpg
    const data = JSON.parse(user_data);
    const store = useStore();

    const user = reactive({
      name: "",
      avatar: "",
    });

    onMounted(() => {
      user.name = data.info.first_name + " " + data.info.last_name;
      user.avatar = data.avatar;
    });

    watch(
      () => {
        return store.getters.getAvatar;
      },
      (newVal, oldVal) => {
        if (newVal != user.avatar) {
          console.log("changing avatar");
          user.avatar = newVal;
        }
      }
    );

    return {
      user,
    };
  },
};
</script>
