<template>
    <div class="welcome">
        <div class="restaurant">
            <div class="content">
                <h2>Restaurant</h2>
                <span>See Products <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <div class="image">
                <img src="../assets/burger-welcome.png" alt="Burger">
            </div>
        </div>
        <div class="market">
            <div class="content">
                <h2>Market</h2>
                <span>See Products <i class="fa-solid fa-arrow-right"></i></span>
            </div>
            <div class="image">
                <img src="../assets/market-welcome.png" alt="Market Basket">
            </div>
        </div>
    </div>
</template>
<script>
</script>

<style scoped>
.welcome{
    margin: 0;
    padding: 0;
    width: 100vw;
    height: 100vh;
    background: rgb(255,11,11);
    background: linear-gradient(90deg, rgba(255,11,11,1) 0%, rgba(255,11,11,1) 35%, rgba(0,9,255,1) 100%);
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
.restaurant{
    margin: 0;
    padding: 0;
    width: 50%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}
.restaurant .content {
    margin-top: 12%;
}
.restaurant .content h2{
    font-size: 5rem;
    color: white;
    margin-left: 10%;
}
.restaurant .content span{
    cursor: pointer;
    font-size: 1.05rem;
    padding: 2% 4%;
    border-radius: 20px;
    color: black;
    background: white;
    margin-left: 10%;
}
.restaurant .image{
    height: 60%;
    margin-top: -8%;
    margin-left: 22%;
    margin-bottom: 10%;
}
.restaurant .image img{
    zoom: 1.2;
    width: 400px;
    height: 400px;
}
.market{
    margin: 0;
    padding: 0;
    width: 50%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}
.market .content{
    margin-top: 15%;
}
.market .content h2{
    font-size: 5rem;
    color: white;
    margin-left: 20%;
}
.market .content span{
    cursor: pointer;
    font-size: 1.05rem;
    padding: 3% 5%;
    border-radius: 20px;
    color: black;
    background: white;
    margin-left: 20%;
}
.market .image{
    height: 60%;
    margin-top: -8%;
    margin-left: 15%;
    margin-bottom: 10%;
}
.market .image img{
    zoom: 1.08;
    width: 500px;
    height: 400px;
}

.restaurant .content span i,
.market .content span i{
    margin-left: 2%;
}
</style>