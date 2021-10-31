import { createStore } from "vuex";
import { category } from "./course/category";

export default createStore({
    modules: {
        courseCategories: category,
    },
    state() {
        return {};
    },
    getters: {},
    actions: {},
    mutations: {},
});
