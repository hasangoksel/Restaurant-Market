<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="form-container">
            <div class="title"><h2>New Campaign</h2></div>
            <form @submit.prevent="addCampaign">
                <div class="form-element-file">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" @change="handleFileUpload">
                </div>
                <div class="lang-container">
                    <div class="en">
                        <div class="form-element">
                            <label for="titleEn">Title</label>
                            <input type="text" id="titleEn" name="titleEn" v-model="newCampaignEn.name">
                        </div>
                        <div class="form-element">
                            <label for="detailEn">Detail</label>
                            <textarea id="detailEn" cols="33" rows="6" name="detailEn" v-model="newCampaignEn.detail" />
                        </div>
                    </div> 
                    <div class="de">
                        <div class="form-element">
                            <label for="titleDe">Titel</label>
                            <input type="text" id="titleDe" name="titleDe" v-model="newCampaignDe.name">
                        </div>
                        <div class="form-element">
                            <label for="detailDe">Detail</label>
                            <textarea id="detailEn" cols="33" rows="6" name="detailDe" v-model="newCampaignDe.detail" />
                        </div>
                    </div>
                    
                </div>
                <div class="form-submit">
                    <span @click="addCampaign"><i class="fa-solid fa-plus"></i> Add Campaign</span>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import NavbarPanelVue from '../../components/admin/NavbarPanel.vue';

export default {
    components: {
        'panel-nav': NavbarPanelVue
    },
    data() {
        return {
            newCampaignEn: {
                image: '',
                title: '',
                detail: ''
            }
            ,
            newCampaignDe: {
                image: '',
                title: '',
                detail: ''
            }
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            this.newProductEn.image = file;
            this.newProductDe.image = file;
        },
        addCampaign() {
            // Submit both product versions to the server
            console.log('English Product:', this.newProductEn);
            console.log('German Product:', this.newProductDe);

            // Here you can use an API call to save the products
            // For example:
            // axios.post('/api/products', { en: this.newProductEn, de: this.newProductDe })
            //      .then(response => console.log(response))
            //      .catch(error => console.error(error));
        }
    }
};
</script>

<style scoped>
.lang-container{
    width: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.en, .de{
    width: 50%;
}
.container {
    display: flex;
    justify-content: space-between;
    align-items: start;
}

.form-container {
    flex-basis: 75%;
    padding: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}

.title h2 {
    font-size: 1.9rem;
    font-weight: 500;
}

form {
    margin: 10% 0;
    width: 100%;
}

.form-element {
    width: 60%;
    margin: 1% 0;
    display: flex;
    flex-direction: column;
    justify-content: start;
    align-items: start;
}

.form-element-file,
.form-element label {
    font-size: 0.9rem;
    font-weight: 500;
}

.form-element input {
    width: 100%;
    height: 29px;
    border-radius: 7px;
    outline: none;
    border: 1.2px solid gray;
    padding: 1% 3%;
    font-size: 1rem;
}

.form-element select {
    width: 100%;
    height: 29px;
    border-radius: 7px;
    outline: none;
    border: 1.2px solid gray;
    padding: 1% 3%;
    font-size: 1rem;
}
.form-element textarea{
    resize: none;
    width: 100%;
    height: 200px;
    border-radius: 7px;
    outline: none;
    border: 1.2px solid gray;
    padding: 2% 3%;
    font-size: 1rem;
}
.form-element-checkbox {
    margin: 1% 0;
    display: flex;
    justify-content: start;
    align-items: center;
}

.form-element-checkbox label {
    font-size: 1rem;
    margin-left: 7px;
}

.form-element-checkbox input {
    accent-color: #FF1D35;
    height: 15px;
    width: 15px;
}

.form-submit {
    margin: 1% 0;
    width: 80%;
    display: flex;
    justify-content: end;
    align-items: center;
}

.form-submit span {
    cursor: pointer;
    width: 20%;
    padding: 0.8% 1%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #FF1D35;
    border-radius: 10px;
    color: #FF1D35;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.form-submit span i {
    margin-right: 7px;
}

.form-submit span:hover {
    background: #FF1D35;
    color: #FFF;
}

.form-element-file {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: start;
}

.form-element-file input {
    margin-top: 0.3%;
}
</style>
