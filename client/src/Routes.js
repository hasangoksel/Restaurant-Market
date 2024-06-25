import { createRouter, createWebHistory } from "vue-router";

// User Pages
import Welcome      from "./layouts/Welcome.vue"
import Restaurant   from "./layouts/Restaurant.vue";
import Market       from "./layouts/Market.vue";
import LoReUser     from "./layouts/LoReUser.vue";
import Cart         from "./layouts/Cart.vue";
import User         from "./layouts/User.vue";
import DeCart       from "./layouts/De-Cart.vue";
import DeLoReUser   from "./layouts/De-LoReUser.vue";
import DeUser       from "./layouts/De-User.vue";
import DeMarket     from "./layouts/De-Market.vue";
import DeRestaurant from "./layouts/De-Restaurant.vue";

// Panel Pages
import SupermarketPanel       from "./layouts/admin/Supermarket.vue";
import SupermarketNewProduct  from "./layouts/admin/SupermarketNewProduct.vue";
import SupermarketEditProduct from "./layouts/admin/SupermarketEditProduct.vue";
import LoginPanel             from "./layouts/admin/Login.vue";
import TakeawayPanel          from "./layouts/admin/Takeaway.vue";
import TakeawayNewProduct     from "./layouts/admin/TakeawayNewProduct.vue";
import TakeawayEditProduct    from "./layouts/admin/TakeawayEditProduct.vue";
import Messages               from "./layouts/admin/Messages.vue";
import Campaign               from "./layouts/admin/Campaign.vue";
import NewCampaign            from "./layouts/admin/CampaignNew.vue";
import Orders                 from "./layouts/admin/Orders.vue";
import OrderDetails           from "./layouts/admin/OrderDetails.vue";
import Chat                   from "./layouts/admin/Chat.vue";


const Router = createRouter({
    history: createWebHistory(),
    routes:[
        // Kullanıcı Arayüzü Linkleri
        { path: '/',                     component: Welcome },
        { path: '/en/restaurant',        component: Restaurant },
        { path: '/de/restaurant',        component: DeRestaurant },
        { path: '/en/supermarket',       component: Market },
        { path: '/de/supermarket',       component: DeMarket },
        { path: '/en/user',              component: LoReUser },
        { path: '/de/user',              component: DeLoReUser },
        { path: '/en/cart',              component: Cart},
        { path: '/de/cart',              component: DeCart},
        { path: '/en/user-information',  component: User},
        { path: '/de/user-information',  component: DeUser},





        // Admin Arayüzü Linkleri
        { path: '/admin/supermarket/products'     , component: SupermarketPanel },
        { path: '/admin/supermarket/new-product'  , component: SupermarketNewProduct },
        { path: '/admin/supermarket/edit-product' , component: SupermarketEditProduct },
        { path: '/admin/takeaway/products'        , component: TakeawayPanel },
        { path: '/admin/takeaway/new-product'     , component: TakeawayNewProduct },
        { path: '/admin/takeaway/edit-product'    , component: TakeawayEditProduct },
        { path: '/admin/login'                    , component: LoginPanel },
        { path: '/admin/messages'                 , component: Messages },
        { path: '/admin/campaign'                 , component: Campaign },
        { path: '/admin/new-campaign'             , component: NewCampaign },
        { path: '/admin/orders'                   , component: Orders },
        { path: '/admin/order-details'            , component: OrderDetails },
        { path: '/admin/chat'                     , component: Chat }
    ]
});

export default Router
