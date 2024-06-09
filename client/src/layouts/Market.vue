<template>
    <div>
        <yummy-nav></yummy-nav>
        <div class="campaign">
            <div class="slider-container">
                <div class="slider" :style="sliderStyle" @click="nextImage">
                    <button class="prev" @click="prevImage">&#10094;</button>
                    <button class="next" @click="nextImage">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="market">
            <div class="categories">
                <h3 class="categories-title">Categories</h3>
                <div class="categories__item" v-for="item in categories" :key="item.name">
                    <img :src="getImageUrl(item.image)" :alt="item.name">
                    <span>{{ item.name }}</span>
                </div>
            </div>
            <div class="products">
                <div class="products__item" v-for="item in products" :key="item.id">
                    <div class="products__item__image">
                        <img :src="getImageUrl(item.image)" :alt="item.name">
                    </div>
                    <div class="products__item__content">
                        <h3>{{ item.name }}</h3>
                    </div>
                    <div class="products__item__basket">
                        <div class="products__item__basket__content">
                            <div class="count">
                                <i class="fa-solid fa-minus" @click="countMinus(item)"></i>
                                <span>{{ item.count }}</span>
                                <i class="fa-solid fa-plus" @click="item.count++"></i>
                            </div>
                            <span> € {{ item.price * item.count }}</span>
                        </div>
                        <span class="basket-button"><i class="fa-solid fa-cart-shopping"></i> Add to Basket</span>
                    </div>
                </div>
            </div>
        </div>
        <yummy-footer></yummy-footer>
    </div>
</template>

<script>
import Footer from '../components/Footer.vue'
import Navbar from '../components/Navbar.vue'
export default {
    components: {
        'yummy-nav': Navbar,
        'yummy-footer': Footer
    },
    data() {
        return {
            currentImageIndex: 0,
            images: [
                'campaign.jpg',
            ],
            categories: [
                {
                    image: "category-drink.svg",
                    name: "Water & Drink"
                },
                {
                    image: "category-chocolate.png",
                    name: "Chocolate"
                },
                {
                    image: "category-pasta.png",
                    name: "Staple Food"
                }
            ],
            products: [
                {
                    id: 0,
                    image: "product-1.jpeg",
                    name: "Product",
                    count: 2,
                    price: 10,
                },
                {
                    id: 1,
                    image: "product-2.jpg",
                    name: "Product",
                    count: 1,
                    price: 18.25,
                },
                {
                    id: 2,
                    image: "product-3.png",
                    name: "Product",
                    count: 1,
                    price: 3,
                },
                {
                    id: 3,
                    image: "product-3.png",
                    name: "Product",
                    count: 1,
                    price: 3,
                }
            ]
        }
    },
    computed: {
        sliderStyle() {
            return {
                backgroundImage: `url(${this.getImageUrl(this.images[this.currentImageIndex])})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center'
            };
        }
    },
    methods: {
        getImageUrl(image) {
            return new URL(`../assets/market-page/${image}`, import.meta.url).href;
        },
        nextImage() {
            this.currentImageIndex =
                (this.currentImageIndex + 1) % this.images.length;
        },
        prevImage() {
            this.currentImageIndex =
                (this.currentImageIndex - 1 + this.images.length) % this.images.length;
        },
        countMinus(item){
            if (item.count > 1) {
                item.count--;
            }
        }
    }
}
</script>

<style scoped>
.slider-container {
    width: 80%;
    height: 400px;
    margin: 5% auto 2% auto;
    position: relative;
    overflow: hidden;
}
.slider {
    cursor: pointer;
    width: 100%;
    height: 400px;
    position: relative;
    background-size: cover;
    background-position: center;
    border-radius: 25px;
}
button {
    background: transparent;
    color: #FFF;
    border: none;
    font-size: 2rem;
    font-weight: 300;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
}
.prev {
    position: relative;
    top: 45%;
    left: 3%;
}
.next {
    position: relative;
    top: 45%;
    left: 92%;
}



.market {
    padding: 3% 10%;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}



.categories {
    flex-basis: 23%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}
.categories-title {
    padding: 1% 0;
    color: #FF1D35;
    font-size: 1.1rem;
    font-weight: 500;
    letter-spacing: .3px;
    margin-bottom: 2%;
}
.categories__item {
    margin-bottom: 4%;
    cursor: pointer;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    background: #FFF;
    box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
    border-radius: 10px;
    padding: 1% 10%;
    margin-right: 3%;
}
.categories__item img {
    width: 40px;
    height: 40px;
}
.categories__item span {
    margin-left: 6%;
}



.products { 
    flex-basis: 70%;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    flex-wrap: wrap;
}

.products__item {
    flex-basis: 17%;
    margin-left: 2%;
    margin-bottom: 4%;
    border-radius: 15px;
    background: #FFF;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    padding: 2% 3%;
}

.products__item__image img{
    width: 135px;
    height: 135px;
}
.products__item__content h3{
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: 3%;
    color: #FF1D35;
}
.products__item__basket{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
    font-size: .9rem;
}
.products__item__basket__content{
    width: 100%;
    margin-bottom: 3%;
    display: flex;
    flex-direction: row-reverse;
    justify-content: space-between;
    align-items: center;
}
.products__item__basket__content span{
    font-weight: 500;
}
.count .fa-minus{
    cursor: pointer;
    padding: 4px;
    border-radius: 3px;
    margin-right: 5px;
    color: #FF1D35;
}
.count span{
    font-weight: 400;
}
.count .fa-plus{
    cursor: pointer;
    padding: 4px;
    border-radius: 3px;
    margin-left: 5px;
    color: #FFF;
    background: #FF1D35;
}

.basket-button{
    margin-top: 5%;
    cursor: pointer;
    font-size: .8rem;
    font-weight: 500;
    color: #FF1D35;
    border: 2px solid#FF1D35;
    padding: 5px 5px;
    border-radius: 10px;
    transition: all .4s ease;
    display: flex;
    justify-content: center;
}
.basket-button:hover {
    background: #FF1D35;
    color: #FFF;
    border: 2px solid #FF1D35;
}

.basket-button i {
    font-size: .9rem;
    margin-right: 10px;
    margin-top: 2px;
    transition: color .4s ease;
}

.basket-button:hover i {
    color: #FFF;
}
</style>
