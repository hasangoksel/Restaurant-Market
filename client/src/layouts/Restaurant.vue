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
            <div class="products__item">
                
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
        padding: 1% 5%;
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
</style>