<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="market-container">
            <div class="new-campaign">
                <h2>Campaign</h2>
                <router-link to="/admin/new-campaign"><i class="fa-solid fa-plus"></i> New Campaign </router-link>
            </div>
            <div class="campaign">
                <table>
                    <thead>
                        <th style="width: 35%;">Image</th>
                        <th style="width: 15%;">Title</th>
                        <th style="width: 40%;">Detail</th>
                        <th style="width: 10%;"></th>
                    </thead>
                    <tr v-for="item in campaigns" :key="item.id">
                        <td><img :src="getImageUrl(item.image)" :alt="item.name"> </td>
                        <td>{{ item.title }}</td>
                        <td>{{ item.detail }}</td>
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
            campaigns: [{
                id: 0,
                image: "campaign.jpg",
                title: "Campaign",
                detail: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus aliquid molestiae qui at repellendus quos et ea. Dolorum fugiat amet cumque impedit vel modi sequi nostrum ipsum ullam ipsam officiis aspernatur dignissimos animi, tenetur autem atque? Sequi optio sapiente neque?",
                },
                {
                id: 1,
                image: "campaign.jpg",
                title: "Campaign",
                detail: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus aliquid molestiae qui at repellendus quos et ea. Dolorum fugiat amet cumque impedit vel modi sequi nostrum ipsum ullam ipsam officiis aspernatur dignissimos animi, tenetur autem atque? Sequi optio sapiente neque?",
                }
         ]
        }
    },
    methods: {
        getImageUrl(image) {
            return new URL(`../../assets/${image}`,
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

.new-campaign {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.new-campaign h2 {
    font-size: 1.9rem;
    font-weight: 500;
}

.new-campaign a {
    cursor: pointer;
    width: 20%;
    padding: .5% 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #FF1D35;
    border-radius: 10px;
    color: #FF1D35;
    transition: all .3s ease;
    text-decoration: none;
}

.new-campaign a i {
    margin-right: 7px;
}

.new-campaign a:hover {
    background: #FF1D35;
    color: #FFF;
}

.campaign {
    margin-top: 3%;
    width: 100%;
}

.campaign table {
    width: 100%;
}

.campaign table,
th, td {
    border-collapse: collapse;
    text-align: center;
}
.campaign table th{
    background: #9e9e9e;
    font-weight: 500;
    font-size: 1rem;
    padding: .8% 0;
}
.campaign table tr{
    font-size: .9rem;
    transition: background .3s ease;
}
.campaign table tr:hover{
    background: #e2e2e2;

}
.campaign table tr td img{
    width: 300px;
    height: 200px;
}
.campaign table tr :nth-child(4) i{
    cursor: pointer;
    font-size: 1.2rem;
    margin: 15%;
    color: #FF1D35;
    transition: color .3s ease;
}
.campaign table tr :nth-child(4) i:hover{
    margin: 15%;
    color: #000;
}
</style>