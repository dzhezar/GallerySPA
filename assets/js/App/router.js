import VueRouter from 'vue-router';
import Portfolio from "./views/portfolio-page";
import Index from "./views/index";

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index
        },
        {
            path: '/portfolio/:slug',
            name: 'portfolio',
            component: Portfolio
        },
    ]
});

export default router;
