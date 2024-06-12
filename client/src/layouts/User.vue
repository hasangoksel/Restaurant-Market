<template>
    <div>
        <yummy-nav></yummy-nav>
        <div class="user-information" v-for="user in users" :key="user.id">
            <div class="user-information__nav">
                <div class="user-information__nav-title">
                    <h2>{{ user.name }} {{ user.surname }}</h2>
                    <span>{{ user.phone }}</span>
                </div>
                <div class="user-information__nav-links">
                    <span @click="setActiveSection('myInformation')">
                        <i class="fa-solid fa-user"></i> My Information
                    </span>
                    <span @click="setActiveSection('myAddresses')">
                        <i class="fa-solid fa-location-dot"></i> My Addresses
                    </span>
                    <span @click="setActiveSection('newAddress')">
                        <i class="fa-solid fa-plus"></i> New Address
                    </span>
                    <p class="delete">Delete My Account</p>
                </div>
            </div>
            <div class="user-information__content">
                <form class="my-information" v-if="activeSection === 'myInformation'">
                    <div class="my-information__item">
                        <label>E-mail</label>
                        <span>{{ user.mail }}</span>
                    </div>
                    <div class="address-card__edit__item">
                        <label for="phone">Telephone</label>
                        <input type="text" id="phone" v-model="user.phone" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="password">Password</label>
                        <input type="password" id="password" v-model="user.password" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" v-model="newPassword" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="rePassword">Re-Password</label>
                        <input type="password" id="rePassword" v-model="rePassword" />
                    </div>
                    <div class="address-card__edit__item-buttons">
                        <span><i class="fa-solid fa-floppy-disk"></i> Save</span>
                    </div>
                </form>
                <div class="my-addresses" v-if="activeSection === 'myAddresses'">
                    <div class="address-card" v-for="item in user.address" :key="item.id">
                        <div class="address-card__view">
                            <div class="address-card__view-content">
                                <h4>{{ item.title }}</h4>
                                <span>{{ item.district }} / {{ item.city }} / {{ item.country }}</span>
                                <p>{{ item.detail }}</p>
                            </div>
                            <div class="address-card__view-buttons">
                                <i class="fa-regular fa-pen-to-square" @click="isEdit(item)"></i>
                            </div>
                        </div>
                        <hr style="width: 100%; margin-top: 3%;" />
                        <form class="address-card__edit" v-if="item.isEdit">
                            <div class="address-card__edit__item">
                                <label for="title">Title</label>
                                <input type="text" id="title" v-model="item.title" />
                            </div>
                            <div class="address-card__edit__item">
                                <label for="country">Country</label>
                                <input type="text" id="country" v-model="item.country" />
                            </div>
                            <div class="address-card__edit__item">
                                <label for="city">City</label>
                                <input type="text" id="city" v-model="item.city" />
                            </div>
                            <div class="address-card__edit__item">
                                <label for="district">District</label>
                                <input type="text" id="district" v-model="item.district" />
                            </div>
                            <div class="address-card__edit__item">
                                <label for="detail">Address</label>
                                <input type="text" id="detail" v-model="item.detail" />
                            </div>
                            <div class="address-card__edit__item-buttons">
                                <span><i class="fa-solid fa-floppy-disk"></i> Save</span>
                            </div>
                        </form>
                    </div>
                </div>
                <form class="new-address" v-if="activeSection === 'newAddress'">
                    <div class="address-card__edit__item">
                        <label for="title">Title</label>
                        <input type="text" id="title" v-model="newAddress.title" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="country">Country</label>
                        <input type="text" id="country" v-model="newAddress.country" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="city">City</label>
                        <input type="text" id="city" v-model="newAddress.city" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="district">District</label>
                        <input type="text" id="district" v-model="newAddress.district" />
                    </div>
                    <div class="address-card__edit__item">
                        <label for="detail">Address</label>
                        <input type="text" id="detail" v-model="newAddress.detail" />
                    </div>
                    <div class="address-card__edit__item-buttons">
                        <span><i class="fa-solid fa-floppy-disk"></i> Save</span>
                    </div>
                </form>
            </div>
        </div>
        <yummy-footer></yummy-footer>
    </div>
</template>

<script>
import FooterVue from '../components/Footer.vue';
import NavbarVue from '../components/Navbar.vue';

export default {
    components: {
        'yummy-nav': NavbarVue,
        'yummy-footer': FooterVue,
    },
    data() {
        return {
            activeSection: 'myInformation', // Başlangıçta aktif olan bölüm
            users: [
                {
                    id: 1,
                    name: 'Hasan',
                    surname: 'Goksel',
                    mail: 'hasangoksel3@gmail.com',
                    phone: '0 (541) 727 2001',
                    password: '12345',
                    isEdit: false,
                    address: [
                        {
                            id: 1,
                            title: 'Office',
                            country: 'Turkey',
                            city: 'Denizli',
                            district: 'Merkezefendi',
                            detail: 'Altıntop Mah. 1591 Sk. No:27 Daire:4 Global İş Merkezi',
                        },
                        {
                            id: 2,
                            title: 'Home',
                            country: 'Turkey',
                            city: 'Denizli',
                            district: 'Merkezefendi',
                            detail: 'Altıntop Mah. 1591 Sk. No:27 Daire:4 Global İş Merkezi',
                        },
                    ],
                },
            ],
            newAddress: {
                title: null,
                country: null,
                city: null,
                district: null,
                detail: null,
            },
            newPassword: null,
            rePassword: null,
        };
    },
    methods: {
        isEdit(item) {
            item.isEdit = !item.isEdit;
        },
        setActiveSection(section) {
            this.activeSection = section;
        },
    },
};
</script>


<style scoped>
.user-information {
    margin: 3% 20%;
    padding: 3% 5%;
    width: 50%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    background: #FFF;
    border-radius: 20px;
}

.user-information__nav {
    width: 40%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.user-information__nav-title {
    margin-bottom: 10%;
}

.user-information__nav-title h2 {
    font-size: 1.8rem;
}

.user-information__nav-title span {
    font-size: .9rem;
    margin-top: -2%;
    opacity: .7;
}

.user-information__nav-links {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}

.user-information__nav-links span {
    cursor: pointer;
    margin: 4% 0;
    font-size: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: .8;
    transition: opacity .2s ease;
}

.user-information__nav-links span:hover {
    opacity: 1;
}

.user-information__nav-links span i {
    font-size: 1.2rem;
    margin-right: 10px;
    opacity: 1;
}

.delete {
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

.delete:hover {
    background: #FF1D35;
    color: #FFF;
}

.user-information__content {
    width: 60%;
}

.my-information {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: space-evenly;
}

.my-information__item {
    width: 60%;
    margin: 1% 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.my-information__item label {
    font-weight: 600;
    font-size: .9rem;
}

.my-information__item span {
    margin-top: 2%;
    font-size: 1em;
}

.my-information__item input {
    width: 100%;
    height: 27px;
    padding: 4% 4%;
    border-radius: 7.5px;
    font-size: .9em;
    border: 1px solid gray;
}

.my-information__item input:focus {
    outline: 1px solid #FF1D35;
}

.my-information__button {
    width: 40%;
    margin-top: 2%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.my-information__button span {
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

.my-information__button span i {
    font-size: 1.2rem;
    margin-right: 10px;
}

.my-addresses {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.address-card {
    margin-bottom: 3%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
}

.address-card__view {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.address-card__view-buttons {
    width: 10%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.address-card__view-buttons i {
    cursor: pointer;
    color: #FF1D35;
    font-size: 1.28rem;
}

.address-card__view-content {
    width: 90%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.address-card__view-content h4 {
    font-weight: 600;
    font-size: 1.2rem;
}

.address-card__view-content span {
    font-weight: 500;
    font-size: .9rem;
    opacity: .8;
}

.address-card__view-content p {
    font-weight: 500;
    font-size: .9rem;
    opacity: .8;
}

.address-card__edit {
    margin-top: 3%;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.address-card__edit__item {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.address-card__edit__item label {
    font-weight: 600;
    font-size: .9rem;
}

.address-card__edit__item span {
    margin-top: 2%;
    font-size: 1em;
}

.address-card__edit__item input {
    width: 100%;
    height: 27px;
    padding: 4% 2%;
    border-radius: 7.5px;
    font-size: .9em;
    border: 1px solid gray;
    margin-bottom: 3%;
}

.address-card__edit__item input:focus {
    outline: 1px solid #FF1D35;
}

.address-card__edit__item-buttons {
    width: 100%;
    margin-top: 2%;
    display: flex;
    justify-content: end;
    align-items: center;
}

.address-card__edit__item-buttons span {
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

.address-card__edit__item-buttons span i {
    font-size: 1.2rem;
    margin-right: 10px;
}
</style>