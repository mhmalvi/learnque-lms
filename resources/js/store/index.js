import { createStore } from "vuex";
import { category } from "./course/category";
import { post } from "./classroom/post.js";

export default createStore({
    modules: {
        courseCategories: category,
        classroomPosts: post,
    },
    state() {
        return {};
    },
    getters: {},
    actions: {},
    mutations: {},
});
