<template>

	<div class="row">

		<div class="col-12 mt-3">
			<div class="card">
				<h5 class="card-header">Productos</h5>
				<div class="card-body">
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
							v-for="producto in storeCarrito.productos">
							<td>{{ producto.nombre }}</td>
							<td>{{ producto.cantidad }}</td>
							<td>${{ producto.precio }}</td>
							<td>${{ producto.precio * producto.cantidad }}</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-12 mt-3">
			<div class="card">
				<h5 class="card-header">Datos del comprador</h5>
				<div class="card-body">
					<ul>
						<li><strong>Nombre:</strong> {{ storeProcesoDeCompra.nombre }}</li>
						<li><strong>Apellido:</strong> {{ storeProcesoDeCompra.apellido }}</li>
						<li><strong>Email:</strong> {{ storeProcesoDeCompra.email }}</li>
						<li><strong>Teléfono:</strong> {{ storeProcesoDeCompra.telefono }}</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-12 mt-3">
			<div class="card">
				<h5 class="card-header">Método de entrega</h5>
				<div class="card-body">
					<ul>
						<li><strong>Método de entrega:</strong> {{ storeProcesoDeCompra.metodo_de_envio }}</li>
					</ul>

					<div
						v-if="storeProcesoDeCompra.metodo_de_envio === 'Envío a domicilio'">
						<h6>Dirección de envío</h6>
						<ul>
							<li><strong>Dirección:</strong> {{ storeProcesoDeCompra.direccion }}</li>
							<li><strong>Código postal:</strong> {{ storeProcesoDeCompra.codigo_postal }}</li>
							<li><strong>Localidad:</strong> {{ storeProcesoDeCompra.localidad }}</li>
							<li><strong>Provincia:</strong> {{ storeProcesoDeCompra.provincia }}</li>
							<li><strong>País:</strong> {{ storeProcesoDeCompra.pais }}</li>
						</ul>
					</div>
				</div>


			</div>
		</div>

	</div>
</template>

<script setup>
// Imports
import {useCarritoStore} from "@/stores/carrito";
import {useProcesoDeCompraStore} from "@/stores/proceso_de_compra";

// Stores
const storeCarrito = useCarritoStore();
const storeProcesoDeCompra = useProcesoDeCompraStore();

</script>

<style scoped>

</style>