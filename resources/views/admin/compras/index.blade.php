@extends('_layouts.admin')

@section('contenido')

    @include('_includes.admin._modules.success')

    <table class="table table-responsive-sm">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre y apellido</th>
            <th>Email</th>
            <th>Método de envío</th>
            <th>Pagado</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($compras as $compra)
            <tr>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->nombre }} {{ $compra->apellido }}</td>
                <td>{{ $compra->email }}</td>
                <td>{{ $compra->metodo_de_envio }}</td>
                <td>
                    @if($compra->pagado)
                        <span class="badge badge-success">Pagado</span>
                    @else
                        <span class="badge badge-danger">No pagado</span>
                    @endif
                </td>
                <td>${{ $compra->total }}</td>
                <td>

                    <div class="d-flex align-items-center">
                        <a href="{{ action([\App\Http\Controllers\Backend\CompraController::class, 'edit'], $compra->id) }}" class="mr-3">
                            <button class="btn btn-info" type="button">Editar</button>
                        </a>

                        <form method="post" action="{{ action([\App\Http\Controllers\Backend\CompraController::class, 'destroy'], $compra) }}" onclick="return confirm('Está seguro que desea eliminar este elemento?')">

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