<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PruebaRequestController extends Controller
{
    public function vistaRequest() {

        // https://pokeapi.co/api/v2/pokemon
        // https://swapi.dev/api/people
        // https://rickandmortyapi.com/api/character

//        $response = Http::get('https://pokeapi.co/api/v2/pokemon');
//        $pokemons = $response->json();
//
//        $response = Http::get('https://swapi.dev/api/people');
//        $starWars = $response->json();

//        $response = Http::get('https://rickandmortyapi.com/api/character');
//        $rickAndMorty = $response->json();

        $responses = Http::pool(fn (Pool $pool) => [
            $pool->get('https://pokeapi.co/api/v2/pokemon'),
            $pool->get('https://swapi.dev/api/people'),
            $pool->get('https://rickandmortyapi.com/api/character'),
        ]);

        $pokemons = $responses[0];
        $starWars = $responses[1];
        $rickAndMorty = $responses[2];

        return view('vista_requests', [
            'pokemons' => $pokemons['results'],
            'starWars' => $starWars['results'],
            'rickAndMorty' => $rickAndMorty['results'],
        ]);
    }
}
