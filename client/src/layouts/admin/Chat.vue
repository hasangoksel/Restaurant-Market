<template>
    <div class="container">
        <yummy-nav></yummy-nav>
        <div class="chat-container">
            <div class="new-product">
                <h2>Chat</h2>
                <a><i class="fa-solid fa-trash"></i> Delete Messages </a>
            </div>
            <div class="message-container" ref="messageContainer">
                <div
                    v-for="item in messages"
                    :key="item.id"
                    :class="{'message-right': item.sender === to, 'message': item.sender !== to}"
                >
                    <div :class="{'message-content-right': item.sender === to, 'message-content': item.sender !== to}">
                        <h5>{{ item.sender }}</h5>
                        <p>{{ item.message }}</p>
                    </div>
                </div>
            </div>
            <form class="message-submit-container">
                <div class="message-element">
                    <textarea type="text" placeholder="Write Message..." />
                </div>
                <div class="message-button">
                    <span @click="submitMessage">Submit</span>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import NavbarPanelVue from '../../components/admin/NavbarPanel.vue'
export default {
    components: {
        'yummy-nav': NavbarPanelVue
    },
    data() {
        return {
            to: 'admin-1',
            messages: [
                {
                    id: 0,
                    sender: 'admin-1',
                    message: 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.'
                },
                {
                    id: 1,
                    sender: 'admin-2',
                    message: 'Lorem ipsum dolor sit amet.'
                },
                {
                    id: 0,
                    sender: 'admin-1',
                    message: 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.'
                },
                {
                    id: 1,
                    sender: 'admin-2',
                    message: 'Lorem ipsum dolor sit amet.'
                },
                {
                    id: 0,
                    sender: 'admin-1',
                    message: 'Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.'
                },
                {
                    id: 1,
                    sender: 'admin-2',
                    message: 'Lorem ipsum dolor sit amet.'
                },
                {
                    id: 1,
                    sender: 'admin-2',
                    message: 'Lorem ipsum dolor sit amet.'
                }
            ]
        }
    },
    methods: {
        scrollToBottom() {
            this.$nextTick(() => {
                const container = this.$refs.messageContainer;
                container.scrollTop = container.scrollHeight;
            });
        },
        submitMessage() {
            // Yeni mesaj ekleme işlemleri
            this.messages.push({
                id: this.messages.length,
                sender: 'admin-1',
                message: 'Yeni mesaj içeriği'
            });
            this.scrollToBottom();
        }
    },
    watch: {
        messages() {
            this.scrollToBottom();
        }
    },
    mounted() {
        this.scrollToBottom();
    }
}
</script>

<style scoped>
.container {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: start;
}

.chat-container {
    height: 100vh;
    width: 75%;
    padding: 3% 5%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: start;
}

.message-container {
    height: 70vh;
    width: 100%;
    overflow-y: auto;
    scrollbar-width: none; /* Firefox */
}

.message-container::-webkit-scrollbar {
    display: none; /* Chrome, Safari and Opera */
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

.new-product a {
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

.new-product a i {
    margin-right: 7px;
}

.new-product a:hover {
    background: #FF1D35;
    color: #FFF;
}

.message {
    width: 100%;
    display: flex;
    justify-content: start;
    align-items: center;
}
.message-right{
    width: 100%;
    display: flex;
    justify-content: end;
    align-items: center;
}
.message-content{
    width: 40%;
    padding: 1% 2%;
    margin: 1% 0;
    border: 1px solid #FF1D35;
    border-radius: 10px;
    background: #FF1D35;
    color: #FFF;
}
.message-content-right{
    width: 40%;
    padding: 1% 2%;
    margin: 1% 0;
    border: 1px solid #d3d3d3;
    border-radius: 10px;
    background: #d3d3d3;
    color: #000;
}

.message-submit-container {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.message-element {
    width: 90%;
    height: 65px;
}

.message-button {
    width: 10%;
    display: flex;
    justify-content: center;
    align-items: start;
}

.message-element textarea {
    resize: none;
    font-family: "Poppins", sans-serif;
    padding: 1% 2%;
    width: 100%;
    height: 65px;
    border: 1.4px solid gray;
    border-radius: 10px;
    outline: none;
}

.message-button span {
    cursor: pointer;
    width: 80%;
    height: 65px;
    padding: .8% 1.4%;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 2px solid #FF1D35;
    border-radius: 10px;
    color: #FF1D35;
    transition: all .3s ease;
    text-decoration: none;
}

.message-button span:hover {
    background: #FF1D35;
    color: #FFF;
}
</style>
