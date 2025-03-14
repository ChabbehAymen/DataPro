import 'bootstrap/dist/css/bootstrap.min.css';

import { createApp } from 'vue';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faBell } from "@fortawesome/free-solid-svg-icons";
import { faCircleUser } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import App from './App.vue';
import router from './router.js';

// 🔹 Add faBell to the library before using it
library.add(faBell ,faCircleUser );

createApp(App)
    .component("font-awesome-icon", FontAwesomeIcon)
    .use(router)
    .mount('#app');
