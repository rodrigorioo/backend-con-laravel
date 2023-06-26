<template>

	<div class="container my-3">

		<div class="row">

			<Productos
				v-show="paso === 1" />

			<DatosDelComprador
				v-show="paso === 2" />

			<MetodoDeEntrega
				v-show="paso === 3" />

			<ResumenDeCompra
				v-show="paso === 4" />

		</div>

		<div class="d-flex justify-content-between mt-3">

			<button type="button" class="btn btn-danger"
					:disabled="paso === 1"
					@click="pasoAnterior">ANTERIOR</button>
			<button type="button" class="btn btn-primary"
					v-if="paso !== 4"
					@click="pasoSiguiente">SIGUIENTE</button>
			<button type="button" class="btn btn-success"
					v-if="paso === 4"
					@click="finalizarCompra">FINALIZAR COMPRA</button>

		</div>


	</div>

</template>

<script setup>
// Imports
import {onMounted, ref} from "vue";
import {useCarritoStore} from "@/stores/carrito";
import Productos from "@/components/ProcesoDeCompra/Productos.vue";
import DatosDelComprador from "@/components/ProcesoDeCompra/DatosDelComprador.vue";
import MetodoDeEntrega from "@/components/ProcesoDeCompra/MetodoDeEntrega.vue";
import ResumenDeCompra from "@/components/ProcesoDeCompra/ResumenDeCompra.vue";
import {useProcesoDeCompraStore} from "@/stores/proceso_de_compra/index.js";

// Store
const storeCarrito = useCarritoStore();
const storeProcesoDeCompra = useProcesoDeCompraStore();

// Data
const paso = ref(1);

// Métodos
const pasoAnterior = () => {
	paso.value--;
};

const pasoSiguiente = () => {
	paso.value++;
};

const finalizarCompra = () => {

	/*
	'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|string',

            'metodo_de_envio' => ['required', Rule::in(['Envío a domicilio', 'Retiro en sucursal'])],
            'direccion' => 'required_if:metodo_de_envio,Envío a domicilio|nullable|string',
            'codigo_postal' => 'required_if:metodo_de_envio,Envío a domicilio|nullable|string',
            'localidad' => 'required_if:metodo_de_envio,Envío a domicilio|nullable|string',
            'provincia' => 'required_if:metodo_de_envio,Envío a domicilio|nullable|string',
            'pais' => 'required_if:metodo_de_envio,Envío a domicilio|nullable|string',
	 */

	axios
		.post('/api/carrito/finalizar-compra', {
			productos: storeCarrito.productos,

			nombre: storeProcesoDeCompra.nombre,
			apellido: storeProcesoDeCompra.apellido,
			email: storeProcesoDeCompra.email,
			telefono: storeProcesoDeCompra.telefono,

			metodo_de_envio: storeProcesoDeCompra.metodo_de_envio,
			direccion: storeProcesoDeCompra.direccion,
			codigo_postal: storeProcesoDeCompra.codigo_postal,
			localidad: storeProcesoDeCompra.localidad,
			provincia: storeProcesoDeCompra.provincia,
			pais: storeProcesoDeCompra.pais,
		})
		.then( (responseFinalizarCompra) => {
			console.log("se finalizó la compra");
		}).catch( (err) => {
			console.error(err);
		});
};

// Eventos
onMounted( () => {

	storeCarrito.obtenerProductos();

});

</script>

<style scoped>

</style>