require('./bootstrap');

import { createVuetify } from 'vuetify'
import { createApp } from 'vue'
import Index from './Index';
import store from './store.js';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives,
})

const app = createApp(Index)
    .use(vuetify)
    .use(store)
    .mount('#app')
