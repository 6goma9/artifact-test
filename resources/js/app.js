/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
window.VueRouter = require("vue-router").default;
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component(
    "header-component",
    require("./components/HeaderComponent.vue").default
);
Vue.component(
    "footer-component",
    require("./components/FooterComponent.vue").default
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

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            component: require("./components/HomeComponent.vue").default
        },
        {
            path: "/distributions",
            component: require("./components/dota2/DistributionsComponent.vue")
                .default
        },
        {
            path: "/blog",
            component: require("./components/blog/HomeComponent.vue").default
        }
    ]
});

const app = new Vue({
    router,
    el: "#app"
});
