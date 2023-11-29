import './bootstrap';
import {createApp} from "vue";
import UltimasCompras from "@/components/UltimasCompras/TablaCompras.vue";

// Obtener elemento del DOM
const app = createApp(UltimasCompras);

app.mount('#ultimas_compras');

