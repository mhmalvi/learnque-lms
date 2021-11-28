import PostsTabComponent from "./components/Classrooms/ClassroomView/PostsTabComponent.vue";
import StudentsTabComponent from "./components/Classrooms/ClassroomView/StudentsTabComponent.vue";
import TeachersTabComponent from "./components/Classrooms/ClassroomView/TeacherTabComponent.vue";

const routes = [
    {
        path: "/classrooms/:classroom_id/posts",
        component: PostsTabComponent,
    },
    {
        path: "/classrooms/:classroom_id/students",
        component: StudentsTabComponent,
    },
    {
        path: "/classrooms/:classroom_id/teachers",
        component: TeachersTabComponent,
    },
    // same components and logics, different route path (for admin)
    {
        path: "/admin/classrooms/:classroom_id/posts",
        component: PostsTabComponent,
    },
    {
        path: "/admin/classrooms/:classroom_id/students",
        component: StudentsTabComponent,
    },
    {
        path: "/admin/classrooms/:classroom_id/teachers",
        component: TeachersTabComponent,
    },
];

export { routes };
