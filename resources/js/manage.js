/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

import Vue from "vue";

import VueCookies from "vue-cookies";
Vue.use(VueCookies);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component(
    "header-component",
    require("./components/ManageHeaderComponent.vue").default
);

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VueRouter from "vue-router";
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/manage/",
            component: require("./components/blog/CreateComponent.vue").default
        }
    ]
});

import Vuex from "vuex";
Vue.use(Vuex);

import managerAuth from "./store/managerAuth";

const store = new Vuex.Store({
    modules: {
        managerAuth
    }
});

const app = new Vue({
    router,
    store,
    el: "#manage"
});
