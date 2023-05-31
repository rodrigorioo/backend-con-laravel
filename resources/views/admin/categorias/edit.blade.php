@extends('_layouts.admin')

@section('contenido')

    <div class="card">
        <div class="card-header">
            <strong>Categoría</strong>
        </div>
        <div class="card-body">
            <form method="post" action="{{ action([\App\Http\Controllers\Backend\CategoriaController::class, 'update'], $categoria) }}">

                @csrf

                <input type="hidden" name="_method" value="patch" />

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" name="nombre" id="nombre" type="text" placeholder="Ingrese un nombre" autocomplete="off" value="{{ $categoria->nombre }}">
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