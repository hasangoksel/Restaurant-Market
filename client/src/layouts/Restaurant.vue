<template>
    <div>
        <div class="campaign">

        </div>
        <div class="popular">

        </div>
        <!-- <h3 class="categories-title">Categories</h3> -->
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
                    <span class="basket-button">Add to Basket</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
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
                ]
            }
        },
        methods: {
            getImageUrl(image) {
                return new URL(`../assets/${image}`, import.meta.url).href;
            }
        }
    }
</script>

<style scoped>
    .categories-title{
        padding: 1% 6%;
        font-size: 1.5rem;
        font-weight: 400;
        letter-spacing: .3px;
    }
    .categories{
        width: 100%;
        padding: 1% 10%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    .categories__item{
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
    .categories__item img{
        width: 60px;
        height: 60px;
    }
    .categories__item span{
        margin-top: 5%;
    }


    .products{
        width: 100%;
        padding: 3% 10%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .products__item{
        width: 100%;
        margin-bottom: 3%;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
        border-radius: 20px;
    }
    .products__item__image{
        flex-basis: 20%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .products__item__image img{
        width: 100%;
        height: 180px;
        border-radius: 20px 0 0 20px;

    }

    .products__item__content{
        flex-basis: 65%;
        margin-left: 3%;
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center !important;
        align-items: flex-start;
    }
    .products__item__content h3{
        color: #FF1D35;
        font-size: 1.4rem;
        font-weight: 600;
    }
    .products__item__content p{
        margin-top: 1.8%;
        font-size: .95rem;
        font-weight: 400;
        opacity: .8;
    }
    .products__item__basket{
        flex-basis: 15%;
        margin-left: 3%;
        margin-right: 5%;
        height: 150px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }
    .products__item__basket :nth-child(1){
        font-size: 1.4rem;
        font-weight: 600;
        color: #FF1D35;
        margin-top: 3%;
    }
    .products__item__basket :nth-child(2){
        cursor: pointer;
        color: #FF1D35;
        border: 1.2px solid#FF1D35;
        padding: 3% 10%;
        border-radius: 10px;
        margin-top: 10%;
        transition: all .4s ease;
    }
    .products__item__basket :nth-child(2):hover{
        background: #FF1D35;
        color: #FFF;
        border: 1px solid #FF1D35;
    }
</style>