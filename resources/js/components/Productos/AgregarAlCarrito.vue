<template>
	<div class="row align-items-center justify-content-between">

		<div class="col-12 col-sm-6">
			<input type="number" class="form-control" placeholder="Ingrese cantidad"
				   :max="stock"
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

// Props
const props = defineProps({
	id: {
		type: Number,
		default: 0,
	},
	stock: {
		type: Number,
		default: 0,
	}
});

// Data
const cantidad = ref(0);

// Métodos
const agregarAlCarrito = () => {


	// Validamos stock
	if(props.stock < cantidad.value) {
		return;
	}

	const productos = JSON.parse(localStorage.getItem("productos")) || [];

	const indexExisteProducto = productos.findIndex( (el) => parseInt(el.id) === parseInt(props.id));

	// Si no existe el producto
	if(indexExisteProducto === -1) {
		productos.push({
			id: props.id,
			cantidad: cantidad.value,
		});
	} else { // Si existe el producto

		// Agregarle la cantidad
		productos[indexExisteProducto].cantidad += cantidad.value;
	}

	localStorage.setItem("productos", JSON.stringify(productos));
};

</script>

<style scoped>

</style>