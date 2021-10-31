<template>
  <div>
    <form @submit.prevent="onFormSubmitHandlar()">
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Basic Informations</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8 d-flex align-items-center">
          <div class="flex" style="max-width: 100%">
            <div class="form-group">
              <label class="form-label" for="code">Username</label>
              <input
                type="text"
                class="form-control"
                id="code"
                v-model="form.username"
                disabled
              />
            </div>
            <div class="form-group">
              <label for="email" class="form-label"> Email </label>
              <input
                type="text"
                class="form-control"
                id="email"
                v-model="form.email"
                disabled
              />
            </div>

            <div class="form-group">
              <label for="first_name" class="form-label"> First Name </label>
              <input
                type="text"
                class="form-control"
                id="first_name"
                v-model="form.first_name"
              />
            </div>

            <div class="form-group">
              <label for="last_name" class="form-label">Last Name</label>
              <input
                type="text"
                class="form-control"
                id="last_name"
                v-model="form.last_name"
              />
            </div>

            <div class="form-group">
              <button
                class="btn btn-primary"
                :class="isSubmitting && 'is-loading'"
                :disabled="isSubmitting"
              >
                <span class="material-icons mr-2">save</span>
                Save Now
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import { ref, reactive } from "vue";

export default {
  props: ["user_data"],
  setup(props) {
    const user = JSON.parse(props.user_data);
    const isSubmitting = ref(false);

    const form = reactive({
      username: user.name,
      email: user.email,
      first_name: user.info.first_name,
      last_name: user.info.last_name,
    });

    function onFormSubmitHandlar() {
      isSubmitting.value = true;

      axios
        .post("/profile", {
          ...form,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: res.data.message,
          });
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            title: "Something went wrong!",
            text: err.response.data.message,
          });
        })
        .finally(() => {
          isSubmitting.value = false;
        });
    }

    return {
      form,
      isSubmitting,
      onFormSubmitHandlar,
    };
  },
};
</script>
