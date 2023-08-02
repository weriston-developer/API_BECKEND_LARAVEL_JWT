<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    public function run()
    {
        Cidade::create(['nome' => 'São Paulo', 'estado' => 'SP']);
        Cidade::create(['nome' => 'Rio de Janeiro', 'estado' => 'RJ']);
        Cidade::create(['nome' => 'Belo Horizonte', 'estado' => 'MG']);
        Cidade::create(['nome' => 'Porto Alegre', 'estado' => 'RS']);
        Cidade::create(['nome' => 'Salvador', 'estado' => 'BA']);
    }
}
