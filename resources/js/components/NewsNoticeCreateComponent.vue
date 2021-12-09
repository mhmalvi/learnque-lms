<template>
  <div>
    <form action="">
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
              <label class="form-label" for="title"
                >Title <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="title"
                placeholder="Enter title.."
                v-model="form.data.title"
              />
            </div>
            <div class="form-group">
              <label class="form-label" for="description"
                >Description <small class="text-danger">*</small></label
              >
              <input
                type="text"
                class="form-control"
                id="description"
                placeholder="Enter description.."
                v-model="form.data.description"
              />
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-32pt">
        <div class="col-lg-4">
          <div class="page-separator">
            <div class="page-separator__text">Featured Image</div>
          </div>
          <p class="card-subtitle text-70 mb-16pt mb-lg-0"></p>
        </div>
        <div class="col-lg-8">
          <div class="d-flex align-items-center">
            <div class="form-group img-container">
              <label for="thumbnail" class="img-container-lbl"
                >Click here to Upload Thumbnail</label
              >
              <div class="row w-100" v-if="form.data.image">
                <div class="col-12 img-wrapper">
                  <img :src="form.data.image" class="img-fluid" />
                </div>
              </div>
              <input type="file" id="thumbnail" class="form-control d-none" />
            </div>
          </div>

          <div class="mt-5">
            <button type="button" class="btn btn-sm btn-outline-secondary mr-1">
              <span class="material-icons mr-2">save</span>
              save as draft
            </button>
            <button
              type="submit"
              class="btn btn-sm btn-outline-primary m-1"
              :disabled="!formIsValid"
            >
              <span class="material-icons mr-2">add_circle_outline</span>
              save &amp; publish
            </button>
            <button type="reset" class="btn btn-sm btn-outline-light m-1">
              <span class="material-icons mr-2">clear_all</span>
              clear
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { reactive } from "vue";

export default {
  setup() {
    const form = reactive({
      data: {
        title: "",
        description: "",
        image: "",
      },
      isSubmitting: false,
    });

    return {
      form,
    };
  },
};
</script>
