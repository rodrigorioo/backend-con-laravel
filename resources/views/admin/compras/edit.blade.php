@extends('_layouts.admin')

@section('contenido')

    <div class="card">
        <div class="card-header">
            <strong>Compra</strong>
        </div>
        <div class="card-body">

            @include('_includes.admin._modules.errores')

            <form method="post" action="{{ action([\App\Http\Controllers\Backend\CompraController::class, 'update'], $compra) }}">

                @csrf

                <input type="hidden" name="_method" value="PATCH" />

                <div class="row">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Pagado</label>
                            <select class="form-control" name="pagado">
                                <option value="0" @if(!$compra->pagado) selected @endif>
                                    No
                                </option>
                                <option value="1" @if($compra->pagado) selected @endif>
                                    Si
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