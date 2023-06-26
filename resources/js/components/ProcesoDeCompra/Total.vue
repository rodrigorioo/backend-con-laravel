<template>
	<div class="card">
		<h5 class="card-header">TOTAL</h5>
		<div class="card-body">
			<h6>${{ total }}</h6>
		</div>
	</div>
</template>

<script setup>
// Imports
import {ref, watch} from "vue";
import {useCarritoStore} from "@/stores/carrito";
import {storeToRefs} from "pinia";

// Store
const store = useCarritoStore();

// Data
const total = ref(0);
const { productos } = storeToRefs(store);

watch(productos, () => {

	axios
		.post('/api/carrito/calcular-total', {
			productos: store.productos,
		})
		.then( (responseTotal) => {

			total.value = responseTotal.data.total;

		}).catch( (err) => {
			console.error(err);
		});


}, {
	deep: true,
});

</script>

<style scoped>

</style>