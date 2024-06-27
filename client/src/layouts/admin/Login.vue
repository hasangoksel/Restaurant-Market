<template>
    <div class="container">
        <div class="login-admin">
            <div class="login-admin__logo">
                <img src="../../assets/logo/logo.svg" alt="Yummykitchen Logo">
            </div>
            <form class="login-admin__form">
                <div class="login-admin__form-item">
                    <label for="username">Username</label>
                    <input type="text" id="username" v-model="loginUser.username">
                </div>
                <div class="login-admin__form-item">
                    <label for="password">Password</label>
                    <input type="password" id="password" v-model="loginUser.password">
                </div>
                <div class="login-admin__form-button">
                    <router-link to="/admin/orders">Login</router-link>
                </div>
            </form>
        </div>
        <div class="copyright">
            <span>Designed By | </span>
            <img src="../../assets/logo/logo-hematit.svg" alt="Hematit Agency Logo">
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                loginUser:{
                    username: null,
                    password: null
                }
            }
        }
    }
</script>

<style scoped>
.container{
    background: #0B1215;
    color: #FFF;
    height: 100vh;
    width: 100%;
}
.login-admin{
    height: 80vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.login-admin__logo{
    width: 20%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-admin__logo img{
    width: 60%;
    height: 200px;
}
.login-admin__form{
    width: 20%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}
.login-admin__form-item{
    margin-top: 4%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}
.login-admin__form-item label{
    font-size: .9rem;
    font-weight: 500;
    margin-bottom: 1%;
}
.login-admin__form-item input{
    width: 100%;
    padding: 8px 12px;
    font-size: 1.2rem;
    border: none;
    border-radius: 10px;
}
.login-admin__form-item input:focus{
    outline: none;
    box-shadow: #FF1D35 0px 7px 12px 0px;
}
.login-admin__form-button{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 8%;
}
.login-admin__form-button a{
    text-decoration: none;
    cursor: pointer;
    padding: 5px 20px;
    border-radius: 10px;
    color: #FF1D35;
    border: 2px solid #FF1D35;
    transition: all .2s ease-in-out;
}
.login-admin__form-button a:hover{
    background: #FF1D35;
    color: #FFF;
}
.copyright{
    width: 100%;
    height: 20vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.copyright span{
    margin-right: 10px;
    font-size: .8rem;
}
.copyright img{
    width: 8%;
    height: 100px;
}
</style>