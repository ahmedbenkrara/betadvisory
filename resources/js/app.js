import './bootstrap';
import { createApp } from 'vue';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Etude from './components/Etude.vue'
import Formation from './components/Formation.vue'
import MesFormations from './components/Mesformations.vue'
import MesEtudes from './components/Mesetudes.vue'

const app = createApp()

app.component("etude", Etude)
app.component("formation", Formation)
app.component("mesformations", MesFormations)
app.component("mesetudes", MesEtudes)

app.mount('#app')