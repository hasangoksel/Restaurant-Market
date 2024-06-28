<template>
    <div class="welcome">
        <div class="logo">
            <router-link to="/">
                <img src="../assets/logo/logo.svg" alt="Yummykitchen Logo">
            </router-link>
        </div>
        <div class="welcome-nav">
            <div class="welcome-nav__section">
                <div class="content">
                    <h2>Restaurant</h2>
                    <router-link to="/de/restaurant">Produkte ansehen <i class="fa-solid fa-arrow-right"></i></router-link>
                </div>
                <div class="image">
                    <img src="../assets/welcome-page/burger-welcome.png" alt="Restaurant Produkte Bild">
                </div>
            </div>
            <div class="welcome-nav__section">
                <div class="content">
                    <h2>Supermarkt</h2>
                    <router-link to="/de/supermarket">Produkte ansehen <i class="fa-solid fa-arrow-right"></i></router-link>
                </div>
                <div class="image">
                    <img src="../assets/welcome-page/market-welcome.png" alt="Supermarkt Produkte Bild" >
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>
.welcome{
    background: #000;
    height: 100vh;
    margin: 0;
    padding: 2% 20%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
}
.logo{
    width: 100%;
    text-align: center;
}
.logo img{
    width: 30%;
    height: 175px;
}

.welcome-nav{
    width: 100%;
    margin-top: 5%;
    display: flex;
    justify-content: center;
    align-items: space-between;
}

.welcome-nav__section{
    color: #FFF;
    margin: 1% 5%;
    padding: 3%;
    flex-basis: 50%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    border-radius: 15px;
    box-shadow: 0px 10px 100px 25px #28283d;
}
.welcome-nav__section .image{
    width: 100%;
    margin-top: 5%;
    display: flex;
    justify-content: center;
    align-items: center ;
}
.welcome-nav__section .image img{
    width: 80%;
    height: 300px ;
}
.welcome-nav__section .content h2{
    font-size: 1.8rem;
    font-weight: 600;
    margin-bottom: 5%;
} 
.welcome-nav__section .content a{
    padding: 5px 10px;
    height: 60px !important;
    text-decoration: none;
    font-size: .9rem;
    font-weight: 500;
    color: #FF1D35;
    border: 2px solid #FF1D35;
    border-radius: 10px;
    transition: all .4s ease-in-out;
}
.welcome-nav__section .content a:hover{
    color: #FFF;
    background: #FF1D35;
}
</style>