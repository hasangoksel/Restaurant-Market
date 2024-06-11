<template>
    <div>
        <div v-if="isOpen" class="open-menu" :class="{ 'fadeOutRight': fadeOut }" @animationend="handleAnimationEnd">
            <span @click="closeMenu"><i class="fa-solid fa-xmark"></i></span>
            <ul>
                <li><router-link to="/en/restaurant" @click="closeMenu">Restaurant</router-link></li>
                <li><router-link to="/en/supermarket" @click="closeMenu">Market</router-link></li>
            </ul>
        </div>
        <nav>
            <div class="nav__logo">
                <router-link to="/">
                    <img src="../assets/logo/logosiyah.svg" alt="Yummykitchen Logo">
                </router-link>
            </div>
            <div class="nav__links">
                <router-link to="/en/user"><i class="fa-solid fa-user"></i></router-link>
                <router-link to="/en/cart"><i class="fa-solid fa-cart-shopping"></i></router-link>
                <p @click="toggleMenu"><i class="fa-solid fa-bars"></i></p>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false,
            fadeOut: false,
        };
    },
    methods: {
        toggleMenu() {
            if (this.isOpen) {
                this.fadeOut = true; // Menüyü kapatmak için fadeOut durumunu true yapın
            } else {
                this.isOpen = true; // Menüyü açmak için isOpen durumunu true yapın
            }
        },

        closeMenu() {
            this.fadeOut = true;
            this.isOpen = !this.isOpen;
        },
        handleAnimationEnd() {
            if (this.fadeOut) {
                this.isOpen = false;
                this.fadeOut = false;
            }
        },
    },
};
</script>

<style scoped>
@keyframes fadeInRight {
    0% {
        opacity: 0;
        right: -300px;
    }

    100% {
        opacity: 1;
        right: 0;
    }
}

@keyframes fadeOutRight {
    0% {
        opacity: 1;
        right: 0;
    }

    100% {
        opacity: 0;
        right: -300px;
    }
}


.open-menu {
    width: 20%;
    height: 100vh;
    background-color: #f8f9fa;
    position: fixed;
    top: 0;
    right: 0;
    left: auto;
    z-index: 105;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    animation: fadeInRight .6s ease 1;
}

.fadeOutRight {
    animation: fadeOutRight .6s ease 1;
    right: -300px;
}

.open-menu span {
    width: 100%;
    text-align: right;
    padding: 7%;
    margin-top: 7%;
    cursor: pointer;
}

.open-menu span i {
    font-size: 2rem;
}

.open-menu ul {
    margin-top: 50%;
    list-style: none;
}

.open-menu ul li {
    margin-bottom: 14%;
}

.open-menu ul li a {
    text-decoration: none;
    font-size: 1.2rem;
    color: #000;
}

nav {
    position: sticky;
    top: 0;
    padding: 1% 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #FFF;
    color: #000;
    font-size: 1.4rem;
    z-index: 99;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}

.nav__logo img {
    flex-basis: 40%;
    height: 50px;
}

.nav__links {
    flex-basis: 15%;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.nav__links a i {
    color: #000;
    text-decoration: none;
    transition: color .3s ease-in-out;
}

.nav__links a i:hover {
    color: #FF1D35;
}

.nav__links p i {
    font-size: 1.6rem;
    cursor: pointer;
    color: #000;
    transition: all .5s ease-in-out;
}

.nav__links p i:hover {
    color: #FF1D35;
    transform: rotate(180deg);
}
</style>
