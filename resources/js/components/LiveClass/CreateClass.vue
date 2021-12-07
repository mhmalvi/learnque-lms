<template>
  <div>
    <a-date-picker v-model:value="date" @change="dateCatch" />

    <a-time-picker v-model:value="value" @change="dateCatch" use12-hours />
  </div>
</template>
<script>
import { ref } from "vue";
import { DatePicker, TimePicker } from "ant-design-vue";
export default {
  components: [DatePicker, TimePicker],
  setup(props) {
    const date = ref("");
    const value = ref("");

    const dateCatch = () => {
      console.log(JSON.stringify(date.value));
      console.log(JSON.stringify(value.value));
    };

    return {
      date,
      dateCatch,
      value,
    };
  },
};
</script>
<style>
</style>