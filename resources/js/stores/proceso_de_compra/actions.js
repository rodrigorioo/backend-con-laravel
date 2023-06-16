export default {

    editarNombre(value) {
        this.nombre = value;
    },

    editarApellido(value) {
        this.apellido = value;
    },

    editarEmail(value) {
        this.email = value;
    },

    editarTelefono(value) {
        this.telefono = value;
    },

    editarMetodoDeEnvio(e) {
        if(e.target.checked) {
            this.metodo_de_envio = e.target.value;
        }
    },

    editarDireccion(value) {
        this.direccion = value;
    },

    editarCodigoPostal(value) {
        this.codigo_postal = value;
    },

    editarLocalidad(value) {
        this.localidad = value;
    },

    editarProvincia(value) {
        this.provincia = value;
    },

    editarPais(value) {
        this.pais = value;
    },
}