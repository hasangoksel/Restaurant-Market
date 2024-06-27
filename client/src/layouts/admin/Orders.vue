<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="orders-container">
            <div class="orders-title">
                <h2>Orders</h2>
            </div>
            <div class="orders">
                <div v-for="item in orders" :key="item.id" class="order-card">
                    <h3>Order - {{ item.id + 1 }}</h3>
                    <div class="user-address">
                        <div class="user-address__title">
                            <h4>Address: </h4>
                        <span>{{ item.userAddress.title }}</span>
                        </div>
                        <p>
                            {{ item.userAddress.detail }} <br>
                            {{ item.userAddress.district }} / {{ item.userAddress.city }} / {{ item.userAddress.country }}
                        </p>
                    </div>
                    <div class="element">
                        <h4>Products Count:</h4>
                        <span class="product-count">{{ item.products.length }}</span><span></span>
                    </div>
                    <div class="element">
                        <h4>Total Price: </h4>
                        <span>€ {{ item.totalPrice }}</span>
                    </div>
                    <div class="element">
                        <h4>State: </h4>
                        <span>{{ states[item.state] }}</span>
                    </div>
                    <div class="element">
                        <h4>Payment: </h4>
                        <span>{{ item.paymentMethod }}</span>
                    </div>
                    <div class="see-details">
                        <router-link to="/admin/order-details"><i class="fa-solid fa-magnifying-glass"></i> See Details</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NavbarPanelVue from '../../components/admin/NavbarPanel.vue';

export default {
    components: {
        'panel-nav': NavbarPanelVue
    },
    data() {
        return {
            orders: [
                {
                    id: 0,
                    userAddress: {
                        id: 1,
                        title: 'Office',
                        country: 'Turkey',
                        city: 'Denizli',
                        district: 'Merkezefendi',
                        detail: 'Altıntop Mah. 1591 Sk. No:27 Daire:4 Global İş Merkezi'
                    },
                    products: [
                        {
                            id: 1,
                            name: 'Product-1',
                            detail: 'Lorem ipsum dolor sit amet.',
                            count: 2,
                            price: 10
                        }
                    ],
                    totalPrice: 10,
                    state: 1,
                    paymentMethod: 'Credit Card'
                },{
                    id: 1,
                    userAddress: {
                        id: 1,
                        title: 'Office',
                        country: 'Turkey',
                        city: 'Denizli',
                        district: 'Merkezefendi',
                        detail: 'Altıntop Mah. 1591 Sk. No:27 Daire:4 Global İş Merkezi'
                    },
                    products: [
                        {
                            id: 1,
                            name: 'Product-1',
                            detail: 'Lorem ipsum dolor sit amet.',
                            count: 2,
                            price: 10
                        }
                    ],
                    totalPrice: 10,
                    state: 1,
                    paymentMethod: 'Credit Card'
                }
            ],
            states: {
                0: 'Pending Approval',
                1: 'Getting Ready',
                2: 'On the Road for Delivery',
                3: 'Completed'
            }
        };
    }
}
</script>
<style scoped>
.container {
    display: flex;
    justify-content: space-between;
    align-items: start;
}
h4{
    font-size: .9rem;
    font-size: 600;
    margin-right: 7px;
}
span, p {
    font-size: 1rem;
}
.orders-container {
    flex-basis: 75%;
    padding: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}
.orders-title {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.orders-title h2 {
    font-size: 1.9rem;
    font-weight: 500;
}

.orders{
    margin-top: 2%;
    width: 100%;
    display: flex;
    justify-content: start;
    align-items: center;
}

.order-card{
    flex-basis: 40%;
    padding: 1% 2%;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    border-radius: 10px;
    margin: 0 4%;
}
.user-address{
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}
.user-address__title{
    display: flex;
    justify-content: start;
    align-items: center;
}
.element{
    margin: 1% 0;
    display: flex;
    justify-content: start;
    align-items: center;
}
.see-details{
    margin: 2% 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.see-details a {
    cursor: pointer;
    font-size: .9rem;
    width: 100%;
    padding: .5% 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #FF1D35;
    border-radius: 10px;
    color: #FF1D35;
    transition: all .3s ease;
    text-decoration: none;
}

.see-details a i {
    margin-right: 7px;
}

.see-details a:hover {
    background: #FF1D35;
    color: #FFF;
}
</style>