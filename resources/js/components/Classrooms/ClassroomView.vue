<template>
  <div>
    <div class="row py-2">
      <div class="col-md-12">
        <img
          src="/assets/images/paths/typescript_892x286.png"
          class="img-fluid rounded"
          alt=""
        />
      </div>
    </div>

    <div class="row py-2">
      <div class="col-md-3">
        <div class="card">
          <div class="list-group list-group-flush">
            <li class="list-group-item">
              <router-link to="/posts">Posts</router-link>
            </li>
            <li class="list-group-item">
              <router-link to="/students">Students</router-link>
            </li>
            <li class="list-group-item">
              <router-link to="/teachers">Teachers</router-link>
            </li>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";

export default {
  props: ["classroom_data"],
  setup(props) {
    const classroom = JSON.parse(props.classroom_data);
    const store = useStore();

    store.commit("updateClassroomId", classroom.unique_id);
    store.commit("updateUserMode", "admin");

    return {
      classroom,
    };
  },
};
</script>
