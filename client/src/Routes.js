import { createRouter, createWebHistory } from "vue-router";
import Welcome from "./layouts/Welcome.vue"
import Restaurant from "./layouts/Restaurant.vue";
import Market from "./layouts/Market.vue";
import LoReUser from "./layouts/LoReUser.vue";
import Cart from "./layouts/Cart.vue";
const Router = createRouter({
    history: createWebHistory(),
    routes:[
        { path: '/',               component: Welcome },
        { path: '/en/restaurant',  component: Restaurant },
        { path: '/en/supermarket', component: Market },
        { path: '/en/user',        component: LoReUser },
        { path: '/en/cart',        component: Cart}
    ]
});

export default Router
