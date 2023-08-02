<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    public function run()
    {
        Paciente::create(['nome' => 'Lucas', 'cpf' => '12345678901', 'celular' => '11999999999']);
        Paciente::create(['nome' => 'Julia', 'cpf' => '98765432109', 'celular' => '11999999999']);
        Paciente::create(['nome' => 'Pedro', 'cpf' => '45678912304', 'celular' => '11999999999']);
        Paciente::create(['nome' => 'Mariana', 'cpf' => '90817263545', 'celular' => '11999999999']);
        Paciente::create(['nome' => 'Rafael', 'cpf' => '21354687945', 'celular' => '11999999999']);
    }
}
