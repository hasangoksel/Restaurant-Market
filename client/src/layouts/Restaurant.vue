<template>
    <div>
        <div class="campaign">
            <div class="slider-container">
                <div class="slider" :style="sliderStyle" @click="nextImage">
                    <button class="prev" @click="prevImage">&#10094;</button>
                    <button class="next" @click="nextImage">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="popular">

        </div>
        <h3 class="categories-title"> Categories</h3>
        <div class="categories">
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
                    <p>{{ item.detail }}</p>
                </div>
                <div class="products__item__basket">
                    <span> € {{ item.price }}</span>
                    <span class="basket-button"><i class="fa-solid fa-cart-shopping"></i> Add to Basket</span>
                </div>
            </div>
        </div>
        <yummy-footer></yummy-footer>
    </div>
</template>

<script>
import Footer from '../components/Footer.vue'
export default {
    components:{
            'yummy-footer': Footer
    },
    data() {
        return {
            categories: [
                {
                    image: "category-burger.svg",
                    name: "Burger"
                },
                {
                    image: "category-pizza.svg",
                    name: "Pizza"
                },
                {
                    image: "category-drink.svg",
                    name: "Drink"
                }
            ],
            products: [
                {
                    id: 0,
                    image: "products-burger.jpg",
                    name: "Hot Burger",
                    detail: "Lorem ipsum dolor, sit amet consectetur adipisicingamet consectetur adipisicing adipisicing. ",
                    price: 10,
                },
                {
                    id: 1,
                    image: "products-burger.jpg",
                    name: "Hot Burger",
                    detail: "Lorem ipsum dolor, sit amet consectetur adipisicingamet consectetur adipisicing adipisicing. ",
                    price: 18.25,
                }
            ],
            currentImageIndex: 0,
            images: [
                'campaign.jpg',
                'campaign-2.jpg',
                'campaign.jpg'
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
            return new URL(`../assets/${image}`, import.meta.url).href;
        },
        nextImage() {
            this.currentImageIndex =
                (this.currentImageIndex + 1) % this.images.length;
        },
        prevImage() {
            this.currentImageIndex =
                (this.currentImageIndex - 1 + this.images.length) % this.images.length;
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

.categories-title {
    padding: 1% 12%;
    color: #FF1D35;
    font-size: 1.5rem;
    font-weight: 600;
    letter-spacing: .3px;
}

.categories {
    width: 100%;
    padding: 1% 10%;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.categories__item {
    cursor: pointer;
    width: 155px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
    border-radius: 10px;
    padding: 1% 1%;
    margin-right: 3%;
}

.categories__item img {
    width: 60px;
    height: 60px;
}

.categories__item span {
    margin-top: 5%;
}

.products {
    width: 100%;
    padding: 3% 10%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.products__item {
    width: 100%;
    margin-bottom: 3%;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
    border-radius: 20px;
}

.products__item__image {
    flex-basis: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.products__item__image img {
    width: 100%;
    height: 180px;
    border-radius: 20px 0 0 20px;

}

.products__item__content {
    flex-basis: 60%;
    margin-left: 3%;
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: center !important;
    align-items: flex-start;
}

.products__item__content h3 {
    color: #FF1D35;
    font-size: 1.4rem;
    font-weight: 600;
}

.products__item__content p {
    margin-top: 1.8%;
    font-size: .95rem;
    font-weight: 400;
    opacity: .8;
}

.products__item__basket {
    flex-basis: 20%;
    margin-left: 3%;
    margin-right: 5%;
    height: 150px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.products__item__basket :nth-child(1) {
    font-size: 1.4rem;
    font-weight: 600;
    color: #FF1D35;
    margin-top: 3%;
}

.products__item__basket :nth-child(2) {
    cursor: pointer;
    font-size: .9rem;
    color: #FF1D35;
    border: 1.2px solid#FF1D35;
    padding: 3% 10%;
    border-radius: 10px;
    margin-top: 10%;
    transition: all .4s ease;
    display: flex;
    justify-content: center;
}

.products__item__basket :nth-child(2):hover {
    background: #FF1D35;
    color: #FFF;
    border: 1px solid #FF1D35;
}

.products__item__basket :nth-child(2) i {
    font-size: .86rem;
    margin-right: 10px;
    transition: color .4s ease;
}

.products__item__basket :nth-child(2):hover i {
    color: #FFF;
}
</style>
