import './bootstrap';
import {createApp} from "vue";
import VerProducto from "@/components/Productos/VerProducto.vue";

// Obtener elemento del DOM
const el = document.getElementById("ver_producto");

createApp(VerProducto, {
    id: parseInt(el.getAttribute('data-id')),
}).mount('#ver_producto');