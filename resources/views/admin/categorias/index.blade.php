@extends('_layouts.admin')

@section('contenido')

    <table class="table table-responsive-sm">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->nombre }}</td>
                <td>
                    <a href="{{ action([\App\Http\Controllers\Backend\CategoriaController::class, 'edit'], $categoria->id) }}">
                        <button class="btn btn-info" type="button">Editar</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection