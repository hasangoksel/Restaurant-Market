import { createRouter, createWebHistory } from "vue-router";
import Welcome from "./layouts/Welcome.vue"
import Restaurant from "./layouts/Restaurant.vue";
import Market from "./layouts/Market.vue";
import LoReUser from "./layouts/LoReUser.vue";
const Router = createRouter({
    history: createWebHistory(),
    routes:[
        { path: '/',               component: Welcome },
        { path: '/en/restaurant',  component: Restaurant },
        { path: '/en/supermarket', component: Market },
        { path: '/en/user',        component: LoReUser },
    ]
});

export default Router
