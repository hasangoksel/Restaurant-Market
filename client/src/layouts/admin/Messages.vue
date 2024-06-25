<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="market-container">
            <div class="new-product">
                <h2>Messages</h2>
            </div>
            <div class="products">
                <table>
                    <thead>
                        <th style="width: 20%;">Name & Surname</th>
                        <th style="width: 20%;">E-mail</th>
                        <th style="width: 10%;">Subject</th>
                        <th style="width: 40%;">Messages</th>
                        <th style="width: 10%;"></th>
                    </thead>
                    <tr v-for="item in messages" :key="item.id">
                        <td>{{ item.nameSurname }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.subject }}</td>
                        <td>{{ item.message }}</td>
                        <td>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import NavbarPanelVue from '../../components/admin/NavbarPanel.vue'
export default {
    components: {
        'panel-nav': NavbarPanelVue
    },
    data() {
        return {
            messages: [
                {
                    id: 0,
                    nameSurname: 'Lorem Ipsum',
                    email: 'loremipsum@mail.com',
                    subject: 'Lorem',
                    message: 'Lorem ipsum dolor sit amet'
                }
            ]
        }
    },
    methods: {
        getImageUrl(image) {
            return new URL(`../../assets/restaurant-page/${image}`,
                import.meta.url).href;
        }
    }
}
</script>

<style scoped>
.container {
    display: flex;
    justify-content: space-between;
    align-items: start;
}

.market-container {
    flex-basis: 75%;
    padding: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}


.new-product {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.new-product h2 {
    font-size: 1.9rem;
    font-weight: 500;
}

.products {
    margin-top: 3%;
    width: 100%;
}

.products table {
    width: 100%;
}

.products table,
th, td {
    border-collapse: collapse;
    text-align: center;
}
.products table th{
    background: #9e9e9e;
    font-weight: 500;
    font-size: 1rem;
    padding: .8% 0;
}
.products table tr{
    font-size: .9rem;
    transition: background .3s ease;
}

.products table tr:hover{
    background: #e2e2e2;

}
.products table tr td img{
    width: 150px;
    height: 150px;
}
.products table tr td {
    height: 100px;
}
.products table tr :nth-child(5) i{
    cursor: pointer;
    font-size: 1.2rem;
    margin: 15%;
    color: #FF1D35;
    transition: color .3s ease;
}
.products table tr :nth-child(5) i:hover{
    margin: 15%;
    color: #000;
}
</style>