<template>
  <div>
    <LiveClassFormComponent :data="state.liveClass" />
  </div>
</template>

<script>
import { reactive } from "vue";
import LiveClassFormComponent from "./LiveClassFormComponent.vue";

export default {
  props: ["data"],
  components: { LiveClassFormComponent },
  setup({ data }) {
    const state = reactive({
      liveClass: {},
    });

    state.liveClass = JSON.parse(data);

    return {
      state,
    };
  },
};
</script>
