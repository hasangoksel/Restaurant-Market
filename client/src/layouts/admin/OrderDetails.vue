<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="orders-container">
            <div class="orders-title">
                <h2>Order Details</h2>
            </div>
            <div class="orders">
                <div v-for="order in orders" :key="order.id" class="order-card">
                    <h3>Order - {{ order.id + 1 }}</h3>
                    <div class="user-address">
                        <div class="user-address__title">
                            <h4>Address: </h4>
                            <span>{{ order.userAddress.title }}</span>
                        </div>
                        <p>
                            {{ order.userAddress.detail }} <br>
                            {{ order.userAddress.district }} / {{ order.userAddress.city }} / {{ order.userAddress.country }}
                        </p>
                    </div>
                    <div class="element">
                        <h4>Total Price: </h4>
                        <span>€ {{ order.totalPrice }}</span>
                    </div>
                    <div class="element">
                        <h4>State: </h4>
                        <select v-model="order.state">
                            <option v-for="state in states" :key="state.id" :value="state.id">{{ state.name }}</option>
                        </select>
                    </div>  
                    <div class="element">
                        <h4>Delivery time: </h4>
                        <select v-model="order.minute">
                            <option v-for="minute in minutes" :key="minute.id" :value="minute">{{ minute }} Minute</option>
                        </select>
                    </div>
                    <div class="element">
                        <h4>Payment: </h4>
                        <span>{{ order.paymentMethod }}</span>
                    </div>
                    <div class="element">
                        <table>
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Product</th>
                                    <th style="width: 60%;">Detail</th>
                                    <th style="width: 10%;">Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="product in order.products" :key="product.id">
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.detail }}</td>
                                    <td>{{ product.count }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="see-details">
                        <a @click="saveOrder(order)"><i class="fa-solid fa-floppy-disk"></i> Save</a>
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
                        },
                        {
                            id: 2,
                            name: 'Product-2',
                            detail: 'Lorem ipsum dolor sit amet.',
                            count: 5,
                            price: 50
                        },
                    ],
                    totalPrice: 10,
                    state: 1,
                    minute: 30,
                    paymentMethod: 'Credit Card'
                }
            ],
            states: [
                { id: 0, name: 'Pending Approval' },
                { id: 1, name: 'Getting Ready' },
                { id: 2, name: 'On the Road for Delivery' },
                { id: 3, name: 'Completed' }
            ],
            minutes: [10, 20, 30, 40, 50, 60, 70, 80, 90]
        };
    },
    methods: {
        saveOrder(order) {
            // Save order logic here
            console.log('Order saved:', order);
        }
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
    flex-basis: 100%;
    padding: 1% 0%;
    border-radius: 10px;
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
    width: 100%;
    display: flex;
    justify-content: start;
    align-items: center;
}
.see-details{
    margin: 2% 0;
    width: 100%;
    display: flex;
    justify-content: end;
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

.element table{
    margin-top: 3%;
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: .9rem;
}
.element table thead{
    font-size: .9rem;
    background: #9e9e9e;
    height: 35px;
}
.element table thead :nth-child(1){
    padding-left: 10px;
}
.element table tbody tr td{
    height: 50px;
}
.element table tbody tr:hover{
    background: #e2e2e2;
}
.element table tbody tr :nth-child(1){
    padding-left: 10px;
}


select{
    padding: .2% 1%;
    font-size: .9rem;
}
</style>