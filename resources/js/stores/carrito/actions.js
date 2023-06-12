export default {

    obtenerProductos() {
        this.productos = JSON.parse(localStorage.getItem("productos")) || [];
    },

    agregarProducto(producto, cantidad) {
        const indexExisteProducto = this.productos.findIndex( (el) => parseInt(el.id) === parseInt(producto.id));

        // Si no existe el producto
        if(indexExisteProducto === -1) {
            this.productos.push({
                id: producto.id,
                nombre: producto.nombre,
                precio: producto.precio,
                cantidad: cantidad,
            });
        } else { // Si existe el producto

            // Agregarle la cantidad
            this.productos[indexExisteProducto].cantidad += cantidad;
        }

        // Guardar productos en local storage
        localStorage.setItem("productos", JSON.stringify(this.productos));
    }
}