<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = Categoria::firstOrCreate([
            'nombre' => 'Jeans',
        ]);
        $categoria = Categoria::firstOrCreate([
            'nombre' => 'Buzos',
        ]);
        $categoria = Categoria::firstOrCreate([
            'nombre' => 'Hoodies',
        ]);
    }
}
