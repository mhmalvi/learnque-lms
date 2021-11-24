import PostsTabComponent from "./components/Classrooms/ClassroomView/PostsTabComponent.vue";
import StudentsTabComponent from "./components/Classrooms/ClassroomView/StudentsTabComponent.vue";
import TeachersTabComponent from "./components/Classrooms/ClassroomView/TeacherTabComponent.vue";

const routes = [
    {
        path: "/posts",
        component: PostsTabComponent,
    },
    {
        path: "/students",
        component: StudentsTabComponent,
    },
    {
        path: "/teachers",
        component: TeachersTabComponent,
    },
];

export { routes };
