@extends('_layouts.admin')

@section('librerias')
    @vite('resources/js/ultimas_compras.js')
@endsection

@section('contenido')

    <div class="card">
        <div class="card-header">Últimas compras</div>
        <div class="card-body p-0">
            <div id="ultimas_compras">

            </div>
        </div>
    </div>

@endsection
