import './assets/style.css'

import { createApp } from 'vue'
import App from './App.vue'
import Router from './Routes.js';

const app = createApp(App);
app.use(Router);
app.mount('#app');
