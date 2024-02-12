@extends('_layouts.layout')

@section('main')

    <h3>POKEMONS</h3>

    <div class="container">
        <div class="row mt-5 mb-5">
            @foreach($pokemons as $pokemon)
                <div class="col-12 col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pokemon['name'] }}</h5>
                            <a href="{{ $pokemon['url'] }}" class="btn btn-primary" target="_blank">IR AL POKEMON</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    <h3>STAR WARS</h3>

    <div class="container">
        <div class="row mt-5 mb-5">
            @foreach($starWars as $personaje)
                <div class="col-12 col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $personaje['name'] }}</h5>
                            <a href="{{ $personaje['url'] }}" class="btn btn-primary" target="_blank">IR AL PERSONAJE</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    <h3>RICK AND MORTY</h3>

    <div class="container">
        <div class="row mt-5 mb-5">
            @foreach($rickAndMorty as $personaje)
                <div class="col-12 col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <img src="{{ $personaje['image'] }}" class="img-fluid" />
                            <h5 class="card-title">{{ $personaje['name'] }}</h5>
                            <a href="{{ $personaje['url'] }}" class="btn btn-primary" target="_blank">IR AL PERSONAJE</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
