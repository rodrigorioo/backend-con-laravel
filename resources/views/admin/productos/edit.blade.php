@extends('_layouts.admin')

@section('contenido')

    <div class="card">
        <div class="card-header">
            <strong>Producto</strong>
        </div>
        <div class="card-body">

            @include('_includes.admin._modules.errores')

            <form method="post" action="{{ action([\App\Http\Controllers\Backend\ProductoController::class, 'update'], $producto) }}">

                @csrf

                <input type="hidden" name="_method" value="PATCH" />

                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Categoría</label>
                            <select class="form-control" name="categoria_id">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" @if($producto->categoria_id === $categoria->id) selected @endif>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" name="nombre" id="nombre" type="text" value="{{ $producto->nombre }}" placeholder="Ingrese un nombre" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Stock</label>
                            <input class="form-control" name="stock" id="stock" type="text" value="{{ $producto->stock }}" placeholder="Ingrese un stock" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Precio</label>
                            <input class="form-control" name="precio" id="precio" type="text" value="{{ $producto->precio }}" placeholder="Ingrese un precio" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Oferta?</label>
                            <select class="form-control" name="oferta">
                                <option value="0" @if(!$producto->oferta) selected @endif>
                                    No
                                </option>
                                <option value="1" @if($producto->oferta) selected @endif>
                                    Sí
                                </option>
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
