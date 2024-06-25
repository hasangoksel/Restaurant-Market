<template>
    <div class="container">
        <panel-nav></panel-nav>
        <div class="form-container">
            <div class="title">
                <h2>Takeaway | Edit Product</h2>
            </div>
            <form @submit.prevent="addProduct">
                <div class="form-element-file">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" @change="handleFileUpload">
                </div>
                <div class="form-element">
                    <label for="categoryEn">Category</label>
                    <select v-if="editProduct.lang == 'en'" name="categoryEn" id="categoryEn" v-model="editProduct.category">
                        <option v-for="item in categoryEn" :key="item.id" :value="item.id">{{ item.name }}</option>
                    </select>
                    <select v-if="editProduct.lang == 'de'" name="categoryEn" id="categoryEn" v-model="editProduct.category">
                        <option v-for="item in categoryDe" :key="item.id" :value="item.id">{{ item.name }}</option>
                    </select>
                </div>
                <div class="form-element">
                    <label for="nameEn">Name</label>
                    <input type="text" id="nameEn" name="nameEn" v-model="editProduct.name">
                </div>
                <div class="form-element">
                    <label for="detailEn">Detail</label>
                    <input type="text" id="detailEn" name="detailEn" v-model="editProduct.detail">
                </div>
                <div class="form-element">
                    <label for="priceEn">Price</label>
                    <input type="number" id="priceEn" name="priceEn" min="1" v-model="editProduct.price">
                </div>
                <div class="form-element">
                    <label for="discountEn">Discount Rate (%)</label>
                    <input type="number" id="discountEn" name="discountEn" min="0" v-model="editProduct.discountRate">
                </div>
                <div class="form-element-checkbox">
                    <input type="checkbox" id="isFavouriteEn" name="isFavouriteEn" v-model="editProduct.isFavourite">
                    <label for="isFavouriteEn">Is Favourite</label>
                </div>
                <div class="form-submit">
                    <span @click="addProduct"><i class="fa-solid fa-floppy-disk"></i> Update Product</span>
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
            categoryEn: [
                { id: 0, name: 'Water & Drink' },
                { id: 1, name: 'Chocolate' }
            ],
            categoryDe: [
                { id: 2, name: 'Wasser & Getränke' },
                { id: 3, name: 'Schokolade' }
            ],
            editProduct: {
                lang: 'en',
                image: '',
                category: 0,
                name: '',
                detail: '',
                price: 1,
                discountRate: 0,
                isFavourite: false
            }
        };
    },
    methods: {
        handleFileUpload(event) {
            const file = event.target.files[0];
            this.newProductEn.image = file;
            this.newProductDe.image = file;
        },
        addProduct() {
            // Submit both product versions to the server
            console.log('Product:', this.newProductEn);

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
    width: 60%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-submit span {
    cursor: pointer;
    width: 40%;
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
