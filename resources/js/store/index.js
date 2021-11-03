import { createStore } from "vuex";
import { category } from "./course/category";
import { post } from "./classroom/post.js";
import { student } from './classroom/student';

export default createStore({
    modules: {
        courseCategories: category,
        classroomPosts: post,
        classroomStudents: student,
    },
    state() {
        return {};
    },
    getters: {},
    actions: {},
    mutations: {},
});
