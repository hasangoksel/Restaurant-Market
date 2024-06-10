<template>
    <div>
        <yummy-nav></yummy-nav>
        <div class="container">
            <div class="forms">
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
                        <span class="registerBtn" @click="toRegister">Register</span>
                    </div>
                </form>
                <form v-if="isRegisterComponent" class="registerForm">
                    <div class="form__title">
                        <h2>Register</h2>
                        <img src="../assets/logo/icons.svg" alt="Yummykitchen Logo">
                    </div>
                    <div class="form__item">
                        <label for="name">Name</label>
                        <input type="text" id="name" v-model="registerUser.name">
                    </div>
                    <div class="form__item">
                        <label for="surname">Surname</label>
                        <input type="text" id="surname" v-model="registerUser.surname">
                    </div>
                    <div class="form__item">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" v-model="registerUser.email">
                    </div>
                    <div class="form__item">
                        <label for="tel">Telephone</label>
                        <input type="text" id="tel" v-model="registerUser.phone">
                    </div>
                    <div class="form__item">
                        <label for="password">Password</label>
                        <input type="password" id="password" v-model="registerUser.password">
                    </div>
                    <div class="form__item">
                        <label for="re-password">Re-Password</label>
                        <input type="password" id="re-password">
                    </div>
                    <div class="form__checkbox">
                        <input type="checkbox" id="privacyConfirm" name="privacyConfirm" v-model="registerUser.privacyConfirm">
                        <label for="privacyConfirm">I accept the confidentiality agreement.</label>
                    </div>
                    <div class="buttons">
                        <span class="registerBtn">Register</span>
                        <span class="loginBtn" @click="toLogin">Login</span>
                    </div>
                </form>
            </div>
            
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
                },
                registerUser: {
                    'name': null,
                    'surname': null,
                    'email': null,
                    'password': null,
                    'phone': null,
                    'privacyConfirm': false
                }
            }
        },
        methods:{
            toRegister(){
                this.isLoginComponent = false
                this.isRegisterComponent = true
            },
            toLogin(){
                this.isRegisterComponent = false
                this.isLoginComponent = true
            }
        }
    }
</script>

<style scoped>
    .container{
        width: 100%;
        min-height: 90vh;
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
    .form__item input:focus{
        outline: 1px solid #FF1D35;
    }
    .form__checkbox{
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    .form__checkbox input{
        height: 15px;
        width: 15px;
        margin-right: 3px;
        accent-color: #FF1D35;
    }
    .form__checkbox input[type='checkbox']{
        color: #000;
        background: #e2e2e2;
    }
    .form__checkbox label{
        font-size: .9rem;
        font-weight: 500;
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
        margin-left: 3%;
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
        margin-left: 3%;
        font-weight: 500;
        font-size: .9rem;
    }
    
</style>