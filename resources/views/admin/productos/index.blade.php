@extends('_layouts.admin')

@section('contenido')

    @include('_includes.admin._modules.success')

    <table class="table table-responsive-sm">
        <thead>
        <tr>
            <th>ID</th>
            <th>Categoría</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>

                    <div class="d-flex align-items-center">
                        <a href="{{ action([\App\Http\Controllers\Backend\ProductoController::class, 'edit'], $producto->id) }}" class="mr-3">
                            <button class="btn btn-info" type="button">Editar</button>
                        </a>

                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\ProductoController::class, 'destroy'], $producto) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">

                            @csrf

                            <input type="hidden" name="_method" value="delete" />

                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection