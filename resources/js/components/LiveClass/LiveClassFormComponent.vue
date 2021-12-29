<template>
  <form @submit.prevent="handleFormSubmit">
    <div class="form-group">
      <label for="topic" class="form-label"> Topic </label>
      <input
        type="text"
        name="topic"
        class="form-control"
        v-model="state.form.topic"
      />
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.topic"
      >
        {{ validation.errors.topic[0] }}
      </small>
    </div>

    <div class="form-group">
      <label for="start_time" class="form-label">Start time</label>
      <input
        type="datetime-local"
        name="start_time"
        class="form-control"
        v-model="state.form.start_time"
      />
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.start_time"
      >
        {{ validation.errors.start_time[0] }}
      </small>
    </div>

    <div class="form-group">
      <label for="duration" class="form-label">Duration</label>
      <div class="input-group">
        <input
          type="number"
          for="duration"
          class="form-control"
          min="1"
          v-model="state.form.duration"
        />
        <div class="input-group-append">
          <span class="input-group-text">minutes</span>
        </div>
      </div>
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.duration"
      >
        {{ validation.errors.duration[0] }}
      </small>
    </div>

    <div class="form-group">
      <label for="password" class="form-label">Meeting password</label>
      <input
        type="text"
        name="password"
        class="form-control"
        v-model="state.form.password"
      />
      <small
        class="text-danger"
        v-if="validation.errors && validation.errors.password"
      >
        {{ validation.errors.password[0] }}
      </small>
    </div>

    <div class="form-group">
      <button class="btn btn-primary" :disabled="state.isSubmitting">
        <i class="fas fa-circle-notch fa-spin" v-if="state.isSubmitting"></i>
        <i class="fas fa-plus-circle" v-else></i>
        <span class="ml-2"> Save </span>
      </button>
    </div>
  </form>
</template>

<script>
import { reactive, onMounted } from "vue";

export default {
  props: ["data"],
  setup({ data }, { emit }) {
    const state = reactive({
      form: {
        topic: "",
        start_time: "",
        duration: 3,
        password: "",
      },
      isSubmitting: false,
    });
    const validation = reactive({
      errors: [],
      message: "",
    });

    onMounted(() => {
      if (data) {
        state.form.topic = data.topic;
        state.form.start_time = "";
        state.form.duration = data.duration_minutes;
        state.form.password = data.password;
      }
    });

    const handleFormSubmit = () => {
      state.isSubmitting = true;
      emit("formSubmit", state.form);
    };

    const success = (reset = true) => {
      if (reset) {
        formReset();
      }
      validation.errors = [];
      validation.message = "";
    };
    const fail = (error) => {
      validation.errors = error.errors;
      validation.message = error.message;
    };
    const completed = () => {
      state.isSubmitting = false;
    };

    const formReset = () => {
      state.form.topic = "";
      state.form.start_time = "";
      state.form.duration = "";
      state.form.password = "";
    };

    return {
      state,
      validation,
      handleFormSubmit,
      success,
      fail,
      completed,
    };
  },
};
</script>
