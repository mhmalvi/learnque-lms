<template>
  <div>
    <transition name="fade">
      <alert-danger
        :message="errors.message"
        v-if="errors.message"
      ></alert-danger>
    </transition>
    <form @submit.prevent="formSubmitHandler">
      <div class="form-group">
        <label class="text-label" for="email_2">Email Address:</label>
        <div class="input-group input-group-merge">
          <input
            id="email_2"
            type="email"
            v-model="form.email"
            class="form-control form-control-prepended"
            :class="errors.validation.email.length > 0 && 'is-invalid'"
            placeholder="john@doe.com"
          />
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="far fa-envelope"></span>
            </div>
          </div>
        </div>
        <transition-group name="fade">
          <div v-if="errors.validation.email.length > 0">
            <div
              class="invalid-feedback d-block"
              v-for="(error, index) in errors.validation.email"
              :key="index"
            >
              {{ error }}
            </div>
          </div>
        </transition-group>
      </div>
      <div class="form-group">
        <label class="text-label" for="password_2">Password:</label>
        <div class="input-group input-group-merge">
          <input
            id="password_2"
            type="password"
            v-model="form.password"
            class="form-control form-control-prepended"
            :class="errors.validation.email.length > 0 && 'is-invalid'"
            placeholder="Enter your password"
          />
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-key"></span>
            </div>
          </div>
        </div>
        <transition-group name="fade">
          <div v-if="errors.validation.password.length > 0">
            <div
              class="invalid-feedback d-block"
              v-for="(error, index) in errors.validation.password"
              :key="index"
            >
              {{ error }}
            </div>
          </div>
        </transition-group>
      </div>
      <div class="form-group">
        <button
          class="btn btn-block btn-primary"
          :class="isLoading && 'is-loading'"
          type="submit"
          :disabled="!isValid"
        >
          Login
        </button>
      </div>
      <div class="form-group text-center">
        <a href="">Forgot password?</a> <br />
      </div>
    </form>
  </div>
</template>
<script>
import { ref, reactive, computed } from "vue";
import AlertDanger from "../../AlertDanger.vue";
export default {
  components: {
    AlertDanger,
  },
  setup() {
    const isLoading = ref(false);

    const form = reactive({
      email: "",
      password: "",
    });

    const errors = reactive({
      validation: {
        email: [],
        password: [],
      },
      message: "",
    });

    const formSubmitHandler = async () => {
      isLoading.value = true;
      await axios
        .post("login", form)
        .then((res) => {
          window.location.href = res.data.redirectTo;
          isLoading.value = false;
        })
        .catch((error) => {
          isLoading.value = false;

          if (error.response.data.errors) {
            errors.validation = error.response.data.errors;
          } else {
            errors.message = error.response.data.message;
          }
        });
    };

    const validEmail = () => {
      const re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

      return re.test(form.email) ? true : false;
    };

    const validPassword = () => {
      return form.password.length >= 6 && form.password.length < 20
        ? true
        : false;
    };

    const isValid = computed(() => {
      return form.email && form.password && validEmail() && validPassword()
        ? true
        : false;
    });

    return {
      form,
      isLoading,
      isValid,
      errors,
      formSubmitHandler,
    };
  },
};
</script>
<style>
.fade-enter-from {
  opacity: 0;
}
.fade-enter-active {
  transition: all 0.3s ease;
}
</style>