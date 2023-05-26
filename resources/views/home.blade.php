@extends('_layouts.layout')

@section('main')

    <h1>HOME</h1>

    <h3>CATEGORIAS</h3>

    <div class="container">
        <div class="row">
            @foreach($categorias as $categoria)

                <div class="col-12">
                    <h4>{{ $categoria->nombre }}</h4>
                </div>

                <div class="col-12">
                    <div class="row mt-5 mb-5">
                        @foreach($categoria->productos as $producto)
                            <div class="col-12 col-sm-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            @endforeach
        </div>
    </div>

@endsection