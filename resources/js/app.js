import './bootstrap';
import router from "./router.js";
import { createApp } from 'vue';

import Index from "./components/Index.vue";

const app = createApp(Index);
app.use(router);
app.mount('#app');
