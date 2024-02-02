<template>
    <div>
        <button type="button" class="btn btn-outline-info me-2" data-bs-toggle="modal" data-bs-target="#modalIngresarCliente">
            Ingresar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalIngresarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ingresar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form autocomplete="off">
                            <div class="row">

                                <div class="col-12 my-3"
                                    v-if="errorMessage !== ''">
                                    <div class="alert alert-danger">
                                        {{ errorMessage }}
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input class="form-control" type="email" placeholder="Ingrese el email" autocomplete="off"
                                            v-model="email">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input class="form-control" type="password" placeholder="Ingrese el password" autocomplete="new-password"
                                            v-model="password">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success"
                            @click="ingresar"

                            :disabled="ingresando">Ingresar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

// Data
const email = ref("");
const password = ref("");
const errorMessage = ref("");
const ingresando = ref(false);

// Métodos
const ingresar = () => {

    ingresando.value = true;
    errorMessage.value = "";

    axios
        .post('/api/clientes/ingresar', {
            email: email.value,
            password: password.value,
        })
        .then( () => {

            window.location.href = "/compras";

        })
        .catch( (err) => {
            errorMessage.value = err.response.data.message;
        })
        .finally( () => {
            ingresando.value = false;
        });
}

// Eventos
onMounted( () => {

});

</script>

<style scoped>

</style>
