import { defineStore } from "pinia";
import state from "@/stores/proceso_de_compra/state";
import actions from "@/stores/proceso_de_compra/actions";

export const useProcesoDeCompraStore = defineStore('proceso_de_compra', {
    state,
    actions,
});