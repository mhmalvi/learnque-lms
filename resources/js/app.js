require("./bootstrap");
import { createApp } from "vue";
import store from "./store";
import axios from "axios";
import HelloWorld from "./components/HelloWorld.vue";

// Import the components here
import CourseCategoryList from './pages/Course/Category/List.vue';
import CreateCourseCategoryForm from './components/Course/CreateCategoryForm.vue';

const app = createApp({});

axios.defaults.baseURL = document.head.querySelector(
    'meta[name="api-base-url"]'
).content;

// Register all components here
app.component("hello-world", HelloWorld);
app.component("course-category-list", CourseCategoryList);
app.component("create-course-category-form", CreateCourseCategoryForm);

app.use(store).mount("#app");

require("alpinejs");
