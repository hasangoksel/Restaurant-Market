<template>
    <div>
        <nav>
            <div class="navbar-title">
                <img src="../../assets/logo/logo.svg" alt="Yummykitchen Logo">
            </div>
            <div class="navbar-links">
                <router-link to="/admin/orders" class="navbar-links__item">
                    <i class="fa-solid fa-cart-shopping"></i>
                    Orders
                </router-link>
                <router-link to="/admin/campaign" class="navbar-links__item">
                    <i class="fa-solid fa-percent"></i>
                    Campaign
                </router-link>
                <router-link to="/admin/takeaway/products" class="navbar-links__item">
                    <i class="fa-solid fa-utensils"></i>
                    Takeaway Products
                </router-link>
                <router-link to="/admin/supermarket/products" class="navbar-links__item">
                    <i class="fa-solid fa-store"></i>
                    Market Products
                </router-link>
                <router-link to="/admin/messages" class="navbar-links__item">
                    <i class="fa-solid fa-message"></i>
                    Message
                </router-link>
                <router-link to="/admin/login" class="navbar-links__item" style="margin-top: 40%;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </router-link>
            </div>
            <div class="navbar-copyright">
                <span>Designed by | </span>
                <img src="../../assets/logo/logo-hematit.svg" alt="Hematit Agency Logo">
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>
nav{
    background: #0B1215;
    color: #FFF;
    width: 25%;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: flex-start;
}
.navbar-title{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.navbar-title img{
    width: 40%;
    height: 150px;
}
.navbar-copyright{
    opacity: .6;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: .8rem;
}
.navbar-copyright img{
    margin-left: 2%;
    width: 30%;
    height: 100px;
}

.navbar-links{
    padding-left: 20%;
    width: 100%;
    height: 60vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;    
}

.navbar-links__item{
    cursor: pointer;
    opacity: .8;
    margin: 4% 0;
    widows: 100%;
    font-size: 1.2rem;
    text-decoration: none;
    color: #FFF;
}
.navbar-links__item:hover{
    opacity: 1;
}
.navbar-links__item i{
    margin-right: 10px;
}
</style>