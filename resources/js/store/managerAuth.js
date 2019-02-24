const state = {
    manager: null
};

const getters = {
    getManager(state) {
        return state.manager;
    }
};
const mutations = {
    setManager(state, manager) {
        state.manager = manager;
    }
};
const actions = {
    async login(context, formData) {
        const res = await axios.post("/api/login", formData);
        context.commit("setManager", res.data);
    },
    async logout(context) {
        await axios.post("/api/logout");
        context.commit("setManager", null);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
