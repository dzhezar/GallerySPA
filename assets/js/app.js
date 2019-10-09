import Vue from 'vue';
import VueRouter from "vue-router";
import router from "./App/router";
import App from "./App/App";
import 'axios';
Vue.use(VueRouter);

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
// const $ = require('jquery');

new Vue({
    el: '#app',
    render: h => h(App),
    router
});
