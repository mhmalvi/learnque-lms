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
    const data = JSON.parse(user_data);
    const store = useStore();

    const user = reactive({
      name: "",
      avatar: "",
    });

    onMounted(() => {
      user.name = data.info.first_name + " " + data.info.last_name;
      user.avatar = data.avatar_url;
    });

    watch(
      () => {
        return store.getters.getAvatar;
      },
      (newVal, oldVal) => {
        if (newVal != user.avatar) {
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
