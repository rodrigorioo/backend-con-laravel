<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 my-3"
                 v-if="errorMessage !== ''">
                <div class="alert alert-danger">
                    {{ errorMessage }}
                </div>
            </div>

            <div class="col-12 col-sm-4"
                v-for="compra in compras">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">#{{ compra.id }}</h5>
                        <ul>
                            <li><strong>Total:</strong> ${{ compra.total }}</li>
                            <li><strong>Fecha:</strong> {{ compra.created_at }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

// Data
const errorMessage = ref("");
const compras = ref([]);

// Métodos
const obtenerCompras = () => {

    axios
        .get('/api/clientes/compras')
        .then( (responseCompras) => {

            compras.value = responseCompras.data;

        })
        .catch( (err) => {
            errorMessage.value = err.response.data.message;
        });
}

// Eventos
onMounted( () => {
    obtenerCompras();
});

</script>

<style scoped>

</style>
