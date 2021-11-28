require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";
import { createRouter, createWebHashHistory } from "vue-router";

import CopyWrite from "./components/CopyWrite.vue";
import UserLogin from "./components/Auth/Users/LoginComponent.vue";
import AdminLogin from "./components/Auth/Admin/LoginComponent.vue";

// Import the components here
import CreateCategories from "./components/Categories/CreateCategories.vue";
import ListCategories from "./components/Categories/ListCategories.vue";

import CourseList from "./components/Courses/ListCourses.vue";
import CreateCourses from "./components/Courses/CreateCourses.vue";

import EnrollUserForm from "./components/Users/EnrollUserForm.vue";
import StudentsList from "./components/Users/StudentsList.vue";
import StudentEditForm from "./components/Users/StudentEditForm.vue";

import TeachersList from "./components/Users/TeachersList.vue";
import TeachersEditForm from "./components/Users/TeacherEditForm.vue";
import CreateClassroom from "./components/Classrooms/CreateClassroom.vue";

import UserEditProfile from "./components/Users/EditProfile.vue";

import ClassroomItemsGridList from "./components/Classrooms/ClassroomItemsGridList.vue";
import ClassroomView from "./components/Classrooms/ClassroomView.vue";

import HomeCourseListComponent from "./components/Home/CourseListComponent.vue";

/**
 * importing students components
 */
import ClassroomList from "./components/Users/ClassroomList.vue";
import StudentClassroomView from "./components/Users/ClassroomView.vue";

const app = createApp({});

axios.defaults.baseURL = document.head.querySelector(
    'meta[name="api-base-url"]'
).content;

// Register all components here

// Admin components
app.component("create-categories", CreateCategories);
app.component("list-categories", ListCategories);

app.component("course-list", CourseList);
app.component("create-courses", CreateCourses);

app.component("enrole-user-form", EnrollUserForm);
app.component("students-list", StudentsList);
app.component("student-edit-form", StudentEditForm);

app.component("teachers-list", TeachersList);
app.component("teacher-edit-form", TeachersEditForm);
app.component("create-classroom", CreateClassroom);
app.component("user-edit-profile", UserEditProfile);

app.component("classroom-items-grid-list", ClassroomItemsGridList);
app.component("classroom-view", ClassroomView);
// End of Admin components

// Students components
app.component("student-classroom-list", ClassroomList);
app.component("student-classroom-view", StudentClassroomView);
// End of students components

/**
 * Guest
 */
app.component("copy-write", CopyWrite);
app.component("login-component", UserLogin);

app.component("home-course-list-component", HomeCourseListComponent);

/**
 * Admin
 */
app.component("admin-login", AdminLogin);

/**
 * Vue Router
 */
import { routes } from "./routes";
const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

app.use(router).use(store).mount("#app");

require("alpinejs");
