import VueRouter from 'vue-router';

import Home from '../../pages/Home.vue';
import About from '../../pages/About.vue';

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Home },
        { path: "/about", component: About }
    ]
});