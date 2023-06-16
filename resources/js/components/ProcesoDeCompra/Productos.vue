<template>
	<div class="row">
		<div class="col-12 col-sm-9">
			<table class="table">
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Subtotal</th>
				</tr>
				</thead>

				<tbody>
				<tr
					v-for="producto in store.productos">
					<td>{{ producto.nombre }}</td>
					<td>
						<input type="number" class="form-control"
							   @change="store.editarCantidad(producto.id, $event.target.value)"
							   :value="producto.cantidad" />
					</td>
					<td>${{ producto.precio }}</td>
					<td>${{ producto.precio * producto.cantidad }}</td>
				</tr>
				</tbody>
			</table>
		</div>

		<div class="col-12 col-sm-3">
			<div class="card">
				<h5 class="card-header">TOTAL</h5>
				<div class="card-body">
					<h6>$TOTAL DE LA COMPRA</h6>
				</div>
			</div>
		</div>
	</div>

</template>

<script setup>
// Imports
import {useCarritoStore} from "@/stores/carrito";

// Store
const store = useCarritoStore();

</script>

<style scoped>

</style>