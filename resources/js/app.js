import App from '../js/vue/App.vue'
import router from './vue/router'

import { createApp } from 'vue'
import '@mdi/font/css/materialdesignicons.css'

import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'
// import axios from 'axios'
// axios.defaults.baseURL = "http://127.0.0.1:8000/api/"
// axios.defaults.withCredentials = true;
// axios.defaults.withXSRFToken = true;
const vuetify = createVuetify({
  components,
  directives,
  icons: {
    defaultSet: 'mdi', 
  },
})
const app = createApp(App)
app.use(router)
app.use(vuetify)
app.mount('#app')
