import VueRouter from 'vue-router';

import Home from '../../pages/Home.vue';
import About from '../../pages/About.vue';
import Currency from '../../pages/Currency.vue';
import Profile from '../../pages/Profile.vue';

export default new VueRouter({
    mode: "history",
    routes: [
        { path: "/", component: Home },
        { path: "/about", component: About },
        { path: "/currencies", component: Currency },
        { path: "/profile", component: Profile }
    ]
});