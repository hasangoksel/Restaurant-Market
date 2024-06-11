<template>
    <div>
        <yummy-nav></yummy-nav>
        <div class="basket-container">
            <div class="basket-content">
                <h2>Products in Cart</h2>
                <div class="basket-content__item" v-for="item in basket" :key="item.id">
                    <img :src="getImageUrl(item.image)" :alt="item.name">
                    <div class="basket-content__item-title">
                        <h3>{{ item.name }}</h3>
                        <span>{{ item.detail }}</span>
                    </div>
                    <div class="basket-content__item-count">
                        <i class="fa-solid fa-minus" @click="countMinus(item)"></i>
                        <span>{{ item.count }}</span>
                        <i class="fa-solid fa-plus" @click="item.count++"></i>
                    </div>
                    <div class="basket-content__item-delete">
                        <i class="fa-solid fa-trash-can"></i>
                    </div>
                </div>
            </div>
            <div class="basket-preview">
                <div class="basket-preview__content">
                    <h3>Total Price</h3>
                    <p>{{ totalPrice }} €</p>
                    <hr style="margin-top: 5%;">
                    <div class="button-basket">
                        <span>Give Order</span>
                    </div>
                </div>
    
            </div>
        </div>
        <yummy-footer></yummy-footer>
    </div>
</template>

<script>
import FooterVue from '../components/Footer.vue'
import NavbarVue from '../components/Navbar.vue'

export default {
    components: {
        'yummy-nav': NavbarVue,
        'yummy-footer': FooterVue
    },
    data() {
        return {
            basket: [{
                    id: 0,
                    image: "product-1.jpeg",
                    name: "Product",
                    detail: "Lorem ipsum dolor sit amet consectetur adipisicing.",
                    count: 2,
                    price: 10,
                },
                {
                    id: 1,
                    image: "product-2.jpg",
                    name: "Product",
                    detail: "Lorem ipsum dolor sit amet consectetur adipisicing.",
                    count: 1,
                    price: 18.25,
                },
            ]
        }
    },
    methods: {
        getImageUrl(image) {
            return new URL(`../assets/market-page/${image}`,
                import.meta.url).href;
        },
        countMinus(item) {
            if (item.count > 1) {
                item.count--;
            }
        }
    },
    computed: {
        totalPrice() {
            let totalPrice = 0;
            for (let item of this.basket) {
                totalPrice += item.price * item.count;
            }
            return totalPrice.toFixed(2); // toplam fiyatı iki ondalık basamağa yuvarla
        }
    }
}
</script>

<style scoped>
.basket-container {
    padding: 3% 10%;
    width: 100%;
    display: flex;
    justify-content: space-evenly;
    align-items: flex-start;
    flex-wrap: nowrap;
}

.basket-content {
    width: 75%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    background: #FFF;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    padding: 0% 3%;
    border-radius: 10px;
}

.basket-content h2 {
    font-weight: 500;
    font-size: 1.4rem;
    margin-top: 3%;
}

.basket-content__item {
    width: 100%;
    margin-bottom: 1.4%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.basket-content__item img {
    flex-basis: 20%;
    width: 100%;
    height: 175px;
    border-radius: 15px 0 0 15px;
}

.basket-content__item-title {
    flex-basis: 60%;
}

.basket-content__item-title h3 {
    font-weight: 500;
    font-size: 1.3rem;
}

.basket-content__item-title span {
    font-size: .95rem;
}

.basket-content__item-count {
    flex-basis: 10%;
}

.basket-content__item-delete {
    flex-basis: 5%;
}

.basket-content__item-delete i {
    cursor: pointer;
    color: #FF1D35;
    font-size: 1.2rem;
}

.basket-content__item-count .fa-minus {
    cursor: pointer;
    padding: 4px;
    border-radius: 3px;
    margin-right: 10px;
    color: #FF1D35;
}

.basket-content__item-count span {
    font-weight: 400;
}

.basket-content__item-count .fa-plus {
    cursor: pointer;
    padding: 4px;
    border-radius: 3px;
    margin-left: 10px;
    color: #FFF;
    background: #FF1D35;
}

.basket-preview {
    width: 20%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: flex-start;
}

.basket-preview__content {
    background: #FFF;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    width: 100%;
    padding: 7% 10%;
    border-radius: 15px;
}

.basket-preview__content h3 {
    font-weight: 600;
    font-size: 1.2rem;
}

.basket-preview__content p {
    text-align: right;
    margin-top: 3%;
    font-size: .9rem;
    font-weight: 600;
}

.button-basket {
    margin-top: 5%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.basket-preview__content span {
    cursor: pointer;
    color: #FF1D35;
    border: 2px solid #FF1D35;
    font-weight: 500;
    padding: 1% 5%;
    border-radius: 10px;
    transition: all .4s ease-in-out;
}

.basket-preview__content span:hover {
    color: #FFF;
    background: #FF1D35;
}
</style>
