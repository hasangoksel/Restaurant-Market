<template>
    <div>
        <yummy-nav></yummy-nav>
        <div class="container">
            <form v-if="isLoginComponent" class="loginForm">
                <div class="form__title">
                    <h2>Login</h2>
                    <img src="../assets/logo/icons.svg" alt="Yummykitchen Logo">
                </div>
                <div class="form__item">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" v-model="loginUser.email">
                </div>
                <div class="form__item">
                    <label for="password">Password</label>
                    <input type="password" id="password" v-model="loginUser.password">
                </div>
                <div class="buttons">
                    <span class="loginBtn">Login</span>
                    <span class="registerBtn">Register</span>
                </div>
            </form>
            <div class="register"></div>
        </div>
        <yummy-footer></yummy-footer>
    </div>
</template>

<script>
import Footer from '../components/Footer.vue'
import Navbar from '../components/Navbar.vue'
    export default {
        components:{
            'yummy-nav': Navbar,
            'yummy-footer': Footer
        },
        data(){
            return{
                isLoginComponent: true,
                isRegisterComponent: false,
                loginUser: {
                    'email': null,
                    'password': null
                }
            }
        }
    }
</script>

<style scoped>
    .container{
        width: 100%;
        height: 70vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loginForm{
        padding: 3%;
        flex-basis: 10%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .form__title{
        width: 100%;
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        align-items: center;
        margin-bottom: 5%;
    }
    .form__title h2{
        margin-left: 5%;
        margin-bottom: 5%;
        font-size: 1.5rem;
        font-weight: 500;
    }
    .form__title img{
        width: 50px;
        height: 50px;
    }
    .form__item{
        margin-bottom: 3%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .form__item label{
        font-size: .9rem;
        font-weight: 500;
        margin-bottom: 1%;
    }
    .form__item input{
        height: 35px;
        width: 20rem;
        padding: 5px 10px;
        border-radius: 10px;
        border: 1px solid gray;
        box-shadow: none;
    }

    .buttons{
        width: 100%;
        margin-top: 4%;
        padding-right: 3%;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .loginBtn{
        cursor: pointer;
        padding: 1% 5%;
        border: 2px solid #FF1D35;
        border-radius: 5px;
        color: #FF1D35;
        font-weight: 500;
        font-size: .9rem;
        margin-right: 3%;
        transition: all .4s ease-in-out;
    }
    .loginBtn:hover{
        background: #FF1D35;
        color: #FFF;
        border: 2px solid #FF1D35;
    }
    .registerBtn{
        cursor: pointer;
        padding: 1% 5%;
        background: #FF1D35;
        border: 2px solid #FF1D35;
        border-radius: 5px;
        color: #FFF;
        font-weight: 500;
        font-size: .9rem;
    }
    
</style>