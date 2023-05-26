<h1>PRODUCTOS</h1>

<div class="container">
    <div class="row">
        @foreach($productos as $producto)
            <div class="col-12 col-sm-3 mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <h6>{{ $producto->categoria->nombre }}</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="{{ action([\App\Http\Controllers\ProductoController::class, 'verProducto'], $producto) }}" class="btn btn-primary">IR AL PRODUCTO</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>