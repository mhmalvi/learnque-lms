import { createStore } from "vuex";
import { category } from "./course/category";
import { post } from "./classroom/post.js";
import { student } from "./classroom/student";
import { teacher } from "./classroom/teacher";

export default createStore({
    modules: {
        courseCategories: category,
        classroomPosts: post,
        classroomStudents: student,
        classroomTeachers: teacher,
    },
    state() {
        return {
            user_mode: "", // 'teacher' | 'admin' | 'student'
            classroom_id: "", // classroom unique_id
        };
    },
    getters: {
        getClassroomId(state) {
            return state.classroom_id;
        },
        getUserMode(state) {
            return state.user_mode;
        },
    },
    mutations: {
        updateClassroomId(state, id) {
            state.classroom_id = id;
        },
        updateUserMode(state, mode) {
            state.user_mode = mode;
        },
    },
    actions: {},
});
