require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";
import CopyWrite from "./components/CopyWrite.vue";
import LoginComponent from "./components/Auth/Users/LoginComponent.vue";

// Import the components here
import CourseCategoryList from './components/Course/Category/List.vue';
import CreateCourseCategoryForm from './components/Course/Category/CreateForm.vue';
import CourseList from './components/Course/List.vue';
import CourseCreateComponent from './components/Course/CreateComponent.vue';

import { QuillEditor } from "@vueup/vue-quill";
// import "@vueup/vue-quill/dist/vue-quill.snow.css";

const app = createApp({});

axios.defaults.baseURL = document.head.querySelector(
    'meta[name="api-base-url"]'
).content;

// Register all components here
app.component('quill-editor', QuillEditor);

// Admin components
app.component("course-category-list", CourseCategoryList);
app.component("create-course-category-form", CreateCourseCategoryForm);
app.component("course-list", CourseList);
app.component('course-create-component', CourseCreateComponent);
// End of Admin components
/**
 * Guest
 */
app.component("copy-write", CopyWrite);
app.component("login-component", LoginComponent);

app.use(store).mount("#app");

require("alpinejs");
