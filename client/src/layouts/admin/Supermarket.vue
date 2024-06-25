<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="market-container">
            <div class="new-product">
                <h2>Market Products</h2>
                <router-link to="/admin/supermarket/new-product"><i class="fa-solid fa-plus"></i> New Product </router-link>
            </div>
            <div class="products">
                <table>
                    <thead>
                        <th style="width: 25%;">Image</th>
                        <th style="width: 15%;">Category</th>
                        <th style="width: 20%;">Name</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 10%;">Discount</th>
                        <th style="width: 10%;"></th>
                    </thead>
                    <tr v-for="item in products" :key="item.id">
                        <td> <img :src="getImageUrl(item.image)" :alt="item.name"> </td>
                        <td>{{ item.category }}</td>
                        <td>{{ item.name }}</td>
                        <td>€{{ item.price }}</td>
                        <td>%{{ item.discountRate }}</td>
                        <td>
                            <router-link to="/admin/supermarket/edit-product">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </router-link>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import NavbarPanelVue from '../../components/admin/NavbarPanel.vue'
export default {
    components: {
        'panel-nav': NavbarPanelVue
    },
    data() {
        return {
            products: [{
                id: 0,
                category: 'Water & Drink',
                image: "product-1.jpeg",
                name: "Product",
                price: 10,
                discountRate: 0
            },{
                id: 1,
                category: 'Water & Drink',
                image: "product-2.jpg",
                name: "Product",
                price: 20,
                discountRate: 0
            },{
                id: 2,
                category: 'Water & Drink',
                image: "product-2.jpg",
                name: "Product",
                price: 20,
                discountRate: 0
            },{
                id: 3,
                category: 'Water & Drink',
                image: "product-2.jpg",
                name: "Product",
                price: 20,
                discountRate: 0
            },{
                id: 4,
                category: 'Water & Drink',
                image: "product-2.jpg",
                name: "Product",
                price: 20,
                discountRate: 0
            },{
                id: 5,
                category: 'Water & Drink',
                image: "product-2.jpg",
                name: "Product",
                price: 20,
                discountRate: 0
            },
         ]
        }
    },
    methods: {
        getImageUrl(image) {
            return new URL(`../../assets/market-page/${image}`,
                import.meta.url).href;
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

.market-container {
    flex-basis: 75%;
    padding: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}

.new-product {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.new-product h2 {
    font-size: 1.9rem;
    font-weight: 500;
}

.new-product a {
    cursor: pointer;
    width: 20%;
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

.new-product a i {
    margin-right: 7px;
}

.new-product a:hover {
    background: #FF1D35;
    color: #FFF;
}

.products {
    margin-top: 3%;
    width: 100%;
}

.products table {
    width: 100%;
}

.products table,
th, td {
    border-collapse: collapse;
    text-align: center;
}
.products table th{
    background: #9e9e9e;
    font-weight: 500;
    font-size: 1rem;
    padding: .8% 0;
}
.products table tr{
    transition: background .3s ease;
}
.products table tr:hover{
    background: #e2e2e2;

}
.products table tr td img{
    width: 150px;
    height: 150px;
}
.products table tr :nth-child(6) i{
    cursor: pointer;
    font-size: 1.2rem;
    margin: 15%;
    color: #FF1D35;
    transition: color .3s ease;
}
.products table tr :nth-child(6) i:hover{
    margin: 15%;
    color: #000;
}
</style>