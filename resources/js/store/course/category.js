export const categoryModule = {
    namespaced: true,
    state() {
        return {
            newCategory: {}
        };
    },
    mutations: {
        addNewCategory(state, category)
        {
            state.newCategory = category
        },
        resetNewCategory(state)
        {
            state.newCategory = {}
        }
    }
};
