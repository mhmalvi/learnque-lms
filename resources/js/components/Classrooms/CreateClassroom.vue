<template>
  <form>
    <div class="form-group">
      <label for="title">Title</label>
      <input
        type="text"
        class="form-control"
        id="title"
        placeholder="The title is required"
      />
    </div>
    <div class="form-group">
      <label for="section">Section</label>
      <input
        type="text"
        class="form-control"
        id="section"
        placeholder="The section is required"
      />
    </div>
    <div class="form-group">
      <label for="cover_photo">Cover Photo</label>
      <input type="file" id="cover_photo" class="form-control" />
    </div>

    <button type="submit" class="btn btn-sm btn-primary">
      <i class="fas fa-plus-circle"></i>
      <span class="ml-2">Create</span>
    </button>
  </form>
</template>
<script>
import { reactive } from "vue";
export default {
  setup(props) {},
};
</script>
<style lang="">
</style>