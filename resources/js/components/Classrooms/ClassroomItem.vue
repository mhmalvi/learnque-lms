<template>
  <div class="col-md-3">
    <div class="card card-sm card--elevated p-relative card-group-row__card">
      <a
        :href="getClassroomLink()"
        class="card-img-top js-image"
        data-position="center"
        data-height="150"
        data-domfactory-upgraded="image"
        style="
          display: block;
          position: relative;
          overflow: hidden;
          background-image: url('/assets/images/paths/sketch_430x168.png');
          background-size: cover;
          background-position: center center;
          height: 140px;
        "
      >
      </a>

      <div class="card-body flex">
        <div class="d-flex">
          <div class="flex">
            <a class="card-title" :href="getClassroomLink()">
              {{ classroom.title }}
            </a>
            <small class="text-50 font-weight-bold mb-4pt"></small>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <div class="row justify-content-between">
          <div class="col-auto d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt">room</span>
            <p class="flex text-50 lh-1 mb-0">
              <small>{{ classroom.section }}</small>
            </p>
          </div>
          <div class="col-auto d-flex align-items-center">
            <span class="material-icons icon-16pt text-50 mr-4pt">people</span>
            <p class="flex text-50 lh-1 mb-0">
              <small>{{ classroom.students_count }} Students</small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["classroom"],
  setup(props) {
    const classroom = props.classroom;

    const getClassroomLink = () => {
      return "/admin/classrooms/" + classroom.unique_id;
    };

    return {
      classroom,
      getClassroomLink,
    };
  },
};
</script>
