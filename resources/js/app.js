import { createApp } from 'vue';
import MainApp from './components/mainapp.vue';
import router from './router';

const app = createApp(MainApp);
app.use(router);
app.mount('#app');
