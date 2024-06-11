<template>
    <div>
        <yummy-nav></yummy-nav>
        <div class="user-information" v-for="user in user" :key="user.id">
            <div class="user-information__nav">
                <div class="user-information__nav-title">
                    <h2>{{ user.name }} {{ user.surname }}</h2>
                    <span>Member</span>
                </div>
                <div class="user-information__nav-links">
                    <span>
                        <i class="fa-solid fa-user"></i>
                        My Information
                    </span>
                    <span>
                        <i class="fa-solid fa-location-dot"></i> 
                        My Addresses
                    </span>
                    <delete>Delete My Account</delete>
                </div>
            </div>
            <div class="user-information__content">
                <form class="my-information" v-if="isMyInformation">
                    <div class="my-information__item">
                        <label>E-mail</label>
                        <span>{{ user.mail }}</span>
                    </div>
                    <div class="my-information__item">
                        <label for="phone">Telephone</label>
                        <input type="text" id="phone" v-model="user.phone">
                    </div>
                    <div class="my-information__item">
                        <label for="password">Password</label>
                        <input type="password" id="password" v-model="user.password">
                    </div> 
                    <div class="my-information__item">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" v-model="newPassword">
                    </div> 
                    <div class="my-information__item">
                        <label for="rePassword">Re-Password</label>
                        <input type="password" id="rePassword" v-model="rePassword">
                    </div>
                    <div class="my-information__button">
                        <span><i class="fa-solid fa-floppy-disk"></i> Save</span>
                    </div>
                </form>
            </div>
        </div>
        <yummy-footer></yummy-footer>
    </div>
</template>

<script>
import FooterVue from '../components/Footer.vue'
import NavbarVue from '../components/Navbar.vue'
    export default {
        components:{
            'yummy-nav'   : NavbarVue,
            'yummy-footer': FooterVue
        },
        data(){
            return{
                isMyInformation : true,
                isMyAddresses   : false,
                user: [      
                    {
                        id       : 1,
                        name     : "Hasan",
                        surname  : "Goksel",
                        mail     : "hasangoksel3@gmail.com",
                        phone    : "0 (541) 727 2001",
                        password : "12345",
                        address  : [
                            {
                                'id'      : 1,
                                'title'   : "Office",
                                'country' : "Turkey",
                                'city'    : "Denizli",
                                'district': "Merkezefendi",
                                'detail'  : "Altıntop Mah. 1591 Sk. No:27/4"
                            }
                        ]
                    }
                ],
                newPassword : null,
                rePassword  : null
            }
        }
    }
</script>

<style scoped>
.user-information{
    padding: 3% 10%;
    width: 100%;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
}
.user-information__nav{
    width: 40%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}
.user-information__nav-title{
    margin-bottom: 10%;
}
.user-information__nav-title h2{
    font-size: 1.8rem;
}
.user-information__nav-title span{
    font-size: .9rem;
    margin-top: -2%;
    opacity: .7;
}

.user-information__nav-links{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}
.user-information__nav-links span{
    cursor: pointer;
    margin: 4% 0;
    font-size: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: .8;
    transition: opacity .2s ease;
}
.user-information__nav-links span:hover{
    opacity: 1;
}
.user-information__nav-links span i{
    font-size: 1.2rem;
    margin-right: 10px;
    opacity: 1;
}
delete{
    margin: 8% 0;
    cursor: pointer;
    padding: 1% 5%;
    font-size: .9rem;
    font-weight: 500;
    color: #FF1D35;
    border: 2px solid #FF1D35;
    border-radius: 5px;
    transition: all .28s ease-in-out;
}
delete:hover{
    background: #FF1D35;
    color: #FFF;
}
.user-information__content{
    width: 60%;
}
.my-information{
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: space-evenly;
}
.my-information__item{
    width: 40%;
    margin: 1% 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}
.my-information__item label{
    font-weight: 600;
    font-size: .9rem;
}
.my-information__item span{
    margin-top: 2%;
    font-size: 1em;
}
.my-information__item input{
    width: 100%;
    height: 27px;
    padding: 4% 4%;
    border-radius: 7.5px;
    font-size: .9em;
    border: 1px solid gray;
}
.my-information__item input:focus{
    outline: 1px solid #FF1D35;
}
.my-information__button{
    width: 40%;
    margin-top: 2%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.my-information__button span{
    cursor: pointer;
    font-size: .9rem;
    font-weight: 400;
    border: 2px solid#FF1D35;
    border-radius: 5px;
    background: #FF1D35;
    color: #FFF;
    padding: 1% 5%;
    display: flex;
    justify-content: center;
    align-items: center;
}
.my-information__button span i{
    font-size: 1.2rem;
    margin-right: 10px;
}
</style>