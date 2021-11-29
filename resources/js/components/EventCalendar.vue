<template>
  <div class="">
    <FullCalendar ref="fullCalendar" :options="calendarOptions" />
  </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import bootstrapTheme from "@fullcalendar/bootstrap";
import { reactive, ref, onMounted } from "vue";

export default {
  components: {
    FullCalendar,
  },
  setup() {
    const calendarOptions = reactive({
      plugins: [dayGridPlugin, bootstrapTheme],
      initialView: "dayGridMonth",
      themeSystem: "bootstrap",
      events: [
        {
          title: "test 1",
          date: "2021-12-04",
        },
      ],
      eventColor: "#26c920",
      expandRows: false,
    });

    const fullCalendar = ref(0);
    onMounted(() => {
      const calendarApi = fullCalendar.value.getApi();

      console.log("api", calendarApi);
      setTimeout(() => {
        calendarApi.updateSize();
      }, 100);
    });

    return {
      calendarOptions,
      fullCalendar,
    };
  },
};
</script>
