<template>
	<div class="row align-items-center justify-content-between">

		<div class="col-12 col-sm-6">
			<input type="number" class="form-control" placeholder="Ingrese cantidad"
				   :max="props.producto.stock"
				   v-model="cantidad" />
		</div>

		<div class="col-12 col-sm-6">
			<button type="button" class="btn btn-success"
					@click="agregarAlCarrito">AGREGAR AL CARRITO</button>
		</div>
	</div>
</template>

<script setup>
import {ref} from "vue";
import {useCarritoStore} from "@/stores/carrito";

// Props
const props = defineProps({
	producto: {
		type: Object,
		default: () => ({}),
	},
});

// Store
const store = useCarritoStore();

// Data
const cantidad = ref(0);

// Métodos
const agregarAlCarrito = () => {


	// Validamos stock
	if(props.producto.stock < cantidad.value) {
		return;
	}

	// Agregar producto al carrito
	store.agregarProducto(props.producto, cantidad.value);
};

</script>

<style scoped>

</style>