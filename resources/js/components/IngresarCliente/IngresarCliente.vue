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
                        <div class="row">
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
                                    <input class="form-control" type="password" placeholder="Ingrese el password"
                                        v-model="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success"
                            @click="ingresar">Ingresar</button>
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

// Métodos
const ingresar = () => {
    axios
        .post('/api/clientes/ingresar', {
            email: email.value,
            password: password.value,
        })
        .then( (responseIngresarCliente) => {

            // TODO:

        }).catch( (err) => {
            console.error(err);
        });
}

// Eventos
onMounted( () => {

});

</script>

<style scoped>

</style>
