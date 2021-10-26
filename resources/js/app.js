require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";
import CopyWrite from "./components/CopyWrite.vue";
import UserLogin from "./components/Auth/Users/LoginComponent.vue";
import AdminLogin from "./components/Auth/Admin/LoginComponent.vue";

// Import the components here
import CreateCategories from "./components/Categories/CreateCategories.vue";
import ListCategories from "./components/Categories/ListCategories.vue";

import CourseList from "./components/Courses/ListCourses.vue";
import CreateCourses from "./components/Courses/CreateCourses.vue";

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
// End of Admin components
/**
 * Guest
 */
app.component("copy-write", CopyWrite);
app.component("login-component", UserLogin);

/**
 * Admin
 */
app.component("admin-login", AdminLogin);

app.use(store).mount("#app");

require("alpinejs");
