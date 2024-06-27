<template>
    <div class="nav-container">
        <div class="language">
            <img src="../assets/eng-flag.svg" alt="England Flag" @click="changeLanguage('en')">
            <img src="../assets/de-flag.svg" alt="Deutschland Flag" @click="changeLanguage('de')">
        </div>

        <!-- İngilizce açılır menü -->
        <div v-if="isOpen && currentLanguage === 'en'" class="open-menu" :class="{ 'fadeOutRight': fadeOut }" @animationend="handleAnimationEnd">
            <span @click="closeMenu"><i class="fa-solid fa-xmark"></i></span>
            <ul>
                <li><router-link :to="`/${language}/user-information`" @click.native="closeMenu"><i class="fa-solid fa-user"></i> My Information</router-link></li>
                <li><router-link :to="`/${language}/restaurant`" @click.native="closeMenu"><i class="fa-solid fa-utensils"></i> Restaurant</router-link></li>
                <li><router-link :to="`/${language}/supermarket`" @click.native="closeMenu"><i class="fa-solid fa-store"></i> Market</router-link></li>
                <li><router-link :to="`/${language}/user`" @click.native="logout"><i class="fa-solid fa-right-from-bracket" style="margin-right: 5%;"></i> Logout</router-link></li>
            </ul>
        </div>

        <!-- Almanca açılır menü -->
        <div v-if="isOpen && currentLanguage === 'de'" class="open-menu" :class="{ 'fadeOutRight': fadeOut }" @animationend="handleAnimationEnd">
            <span @click="closeMenu"><i class="fa-solid fa-xmark"></i></span>
            <ul>
                <li><router-link :to="`/${language}/user-information`" @click.native="closeMenu"><i class="fa-solid fa-user"></i> Meine Informationen</router-link></li>
                <li><router-link :to="`/${language}/restaurant`" @click.native="closeMenu"><i class="fa-solid fa-utensils"></i> Restaurant</router-link></li>
                <li><router-link :to="`/${language}/supermarket`" @click.native="closeMenu"><i class="fa-solid fa-store"></i> Markt</router-link></li>
                <li><router-link :to="`/${language}/user`" @click.native="logout"><i class="fa-solid fa-right-from-bracket" style="margin-right: 5%;"></i> Ausloggen</router-link></li>
            </ul>
        </div>

        <nav>
            <div class="nav__logo">
                <router-link to="/">
                    <img src="../assets/logo/logosiyah.svg" alt="Yummykitchen Logo">
                </router-link>
            </div>
            <div class="nav__links">
                <router-link :to="`/${currentLanguage}/user`"><i class="fa-solid fa-user"></i></router-link>
                <router-link :to="`/${currentLanguage}/cart`"><i class="fa-solid fa-cart-shopping"></i></router-link>
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
            language: 'en', // Varsayılan dil
            currentLanguage: '', // Şu anki dil
        };
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen;
        },
        closeMenu() {
            this.fadeOut = true;
        },
        handleAnimationEnd() {
            if (this.fadeOut) {
                this.isOpen = false;
                this.fadeOut = false;
            }
        },
        changeLanguage(lang) {
            this.currentLanguage = lang;
            const currentPath = this.$route.path;
            const newPath = currentPath.replace(/^\/[a-z]{2}/, `/${lang}`);
            this.$router.push({ path: newPath });
        },
        logout() {
            // Burada logout işlemleri yapılabilir
            // Örneğin session temizleme, vb.
            console.log('Logged out');
        }
    },
    watch: {
        '$route'() {
            // Route değiştiğinde menüyü kapatın
            this.isOpen = false;
            this.fadeOut = false;
        }
    },
    mounted() {
        // Başlangıçta route diline göre currentLanguage'i ayarla
        const langRegex = /^\/([a-z]{2})\//;
        const match = this.$route.path.match(langRegex);
        if (match && match.length > 1) {
            this.currentLanguage = match[1];
        }
    }
};
</script>

<style scoped>
.nav-container{
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    position: sticky;
    top: 0;
    z-index: 1000;
}
.language{
    padding-right:2%;
    width: 100%;
    background: #FFF;
    display:flex;
    justify-content: end;
    align-items: center;
}
.language img{
    margin-right: .5%;
    width: 35px;
    height: 35px;
    cursor: pointer;
}
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
    font-size: 1.12rem;
    color: #000;
}
.open-menu ul li a i{
    margin-right: 10px;
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
