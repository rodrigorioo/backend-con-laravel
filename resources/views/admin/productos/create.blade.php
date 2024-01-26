@extends('_layouts.admin')

@section('contenido')

    <div class="card">
        <div class="card-header">
            <strong>Producto</strong>
        </div>
        <div class="card-body">

            @include('_includes.admin._modules.errores')

            <form method="post" action="{{ action([\App\Http\Controllers\Backend\ProductoController::class, 'store']) }}">

                @csrf

                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Categoría</label>
                            <select class="form-control" name="categoria_id">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Ingrese un nombre" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Stock</label>
                            <input class="form-control" name="stock" id="stock" type="text" placeholder="Ingrese un stock" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Precio</label>
                            <input class="form-control" name="precio" id="precio" type="text" placeholder="Ingrese un precio" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Oferta?</label>
                            <select class="form-control" name="oferta">
                                <option value="0">No</option>
                                <option value="1">Sí</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <button class="btn btn-info" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
