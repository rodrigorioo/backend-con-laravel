import { defineStore } from "pinia";
import state from "@/stores/carrito/state";
import actions from "@/stores/carrito/actions";

export const useCarritoStore = defineStore('carrito', {
    state,
    actions,
});