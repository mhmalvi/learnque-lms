import { createStore } from "vuex";
import { categoryModule } from './course/category';

export default createStore({
    modules: {
        course_category: categoryModule
    },
    state() {
        return {
        }
    },
    getters: {},
    actions: {},
    mutations: {},
});
