<template>
	<div>
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			Carrito
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<table class="table">
							<thead>
							<tr>
								<th>Nombre</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Subtotal</th>
							</tr>
							</thead>
							<tbody>
							<tr
								v-for="producto in productos">
								<td>{{ producto.nombre }}</td>
								<td>${{ producto.precio }}</td>
								<td>{{ producto.cantidad }}</td>
								<td>${{ producto.precio * producto.cantidad }}</td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script setup>
import {onMounted, ref} from "vue";

// Data
const productos = ref([]);

// Métodos
const obtenerProductos = () => {
	productos.value = JSON.parse(localStorage.getItem("productos")) || [];
}

// Eventos
onMounted( () => {
	obtenerProductos();
});

</script>

<style scoped>

</style>