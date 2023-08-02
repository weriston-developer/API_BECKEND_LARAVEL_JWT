<?php

namespace Database\Seeders;

use App\Models\Medico;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    public function run()
    {
        Medico::create(['nome' => 'Dr. João', 'especialidade' => 'Clínico Geral', 'cidade_id' => 1]);
        Medico::create(['nome' => 'Dra. Maria', 'especialidade' => 'Pediatra', 'cidade_id' => 2]);
        Medico::create(['nome' => 'Dr. Carlos', 'especialidade' => 'Cardiologista', 'cidade_id' => 3]);
        Medico::create(['nome' => 'Dra. Ana', 'especialidade' => 'Dermatologista', 'cidade_id' => 4]);
        Medico::create(['nome' => 'Dr. Roberto', 'especialidade' => 'Ortopedista', 'cidade_id' => 5]);
    }
}
