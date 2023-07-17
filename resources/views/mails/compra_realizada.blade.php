<h1>Gracias por tu compra</h1>

<h2>Datos de la compra</h2>
<ul>
    <li><strong>Nombre:</strong> {{ $compra->nombre }}</li>
    <li><strong>Apellido:</strong> {{ $compra->apellido }}</li>
    <li><strong>Email:</strong> {{ $compra->email }}</li>
    <li><strong>Teléfono:</strong> {{ $compra->telefono }}</li>
    <li><strong>Método de envío:</strong> {{ $compra->metodo_de_envio }}</li>

    @if($compra->metodo_de_envio === \App\Enums\MetodoDeEnvio::ENVIO_A_DOMICILIO)
        <li><strong>Dirección:</strong> {{ $compra->direccion }}</li>
        <li><strong>Código postal:</strong> {{ $compra->codigo_postal }}</li>
        <li><strong>Localidad:</strong> {{ $compra->localidad }}</li>
        <li><strong>Provincia:</strong> {{ $compra->provincia }}</li>
        <li><strong>País:</strong> {{ $compra->pais }}</li>
    @endif
</ul>

<h2>Productos</h2>
<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>Subtotal</th>
    </tr>
    </thead>

    <tbody>
    @foreach($compra->productos as $producto)
        <tr>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->pivot->cantidad }}</td>
            <td>${{ $producto->pivot->precio }}</td>
            <td>${{ $producto->pivot->precio * $producto->pivot->cantidad }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<h2>Link para pagar: {{ $linkDeMercadoPago }}</h2>