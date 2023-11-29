<template>
    <table class="table table-responsive-sm table-striped mb-0">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nombre y apellido</th>
                <th>Email</th>
                <th>Método de envío</th>
                <th>Pagado</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <tr
            v-for="ultimaCompra in ultimasCompras">
            <td>{{ ultimaCompra.id }}</td>
            <td>{{ ultimaCompra.nombre }} {{ ultimaCompra.apellido }}</td>
            <td>{{ ultimaCompra.email }}</td>
            <td>{{ ultimaCompra.metodo_de_envio }}</td>
            <td>
                <span class="badge badge-success"
                    v-if="ultimaCompra.pagado">Pagado</span>
                <span class="badge badge-danger"
                    v-else>No pagado</span>
            </td>
            <td>${{ ultimaCompra.total }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
import {onMounted, ref} from "vue";

// Data
const ultimasCompras = ref([]);

// Eventos
onMounted( () => {

    // Traemos info del producto
    axios
        .get('/api/compras/ultimas-compras')
        .then( (responseUltimasCompras) => {
            ultimasCompras.value = responseUltimasCompras.data;
        });

});

</script>

<style scoped>

</style>
